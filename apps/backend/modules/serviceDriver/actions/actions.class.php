<?php

/**
 * serviceDriver actions.
 *
 * @package    transfer
 * @subpackage serviceDriver
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class serviceDriverActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->form = new ServiceDriverForm();
      $this->driverServices = array();
  }


    /**
     * set the current session arrival date.
     */
    public function executeChangeDate(sfWebRequest $request){
        $date =$request->getParameter('day_change');
        $day = date('Y-m-d',strtotime($date));

        $this->getUser()->setCurrentArrivalDate($day);
        $this->getUser()->setCurrentDepartureDate($day);
        $this->getUser()->setCurrentDriversDate($day);
        $this->form = new ServiceDriverForm(array('day_change'=>$date));
        $this->services = array();
        $this->setTemplate('index');
    }

    public function executeServicesDriversPdf(sfWebRequest $request){

        $day = $this->getUser()->getCurrentDriversDate();

        $services = Driver::getDriversServices($day);
        try{

            $pdf = new CustomPdf("L","mm","A4");
        foreach($services as $service){
            $data = date('d-m-Y',strtotime($day));
            $giorno =  explode('-',$day);
            $giorno = Driver::translateToItaDayOfWeek(date('D',mktime(0, 0, 0, $giorno[1], $giorno[2], $giorno[0])));

            $rows = Driver::getDriverServicesDay($day,$service['DRIVER_ID']);

            $title = 'Autista: '.$service["driver"].' numero servizi:  ('.count($rows).') - '.$giorno.' '.$data;
                $pdf->setHeaderTitle($title);
                $pdf->AddPage();
                $pdf->SetAutoPageBreak(1,0.5);

                if($rows){
                    $header = array(
                        'N.',
                        'PRA',
                        'Servizio',
                        'Orario',
                        'Vettore',
                        'Cliente',
                        'Referente',
                        'Pax',
                        'Tragitto',
                        'Mezzo',
                        'Tipo',
                        'Nota');

                    $w = array (
                        5,
                        9,
                        21,
                        15,
                        18,
                        40,
                        40,
                        10,
                        50,
                        25,
                        10,
                        52
                    );
                    $pdf->FancyTable($header, $rows,$w);
                   }
            }

            $pdf->Output("servizi_autisti"."_".$giorno."_".$data.".pdf","I");
            exit;

            }
            catch(Exception $e){
                $e->getMessage();
            }
            sfView::NONE;
            exit;
    }

    public function executeServicesDriversPdfEmail(sfWebRequest $request){

        $day = $this->getUser()->getCurrentDriversDate();

        $services = Driver::getDriversServices($day);
        try{

            foreach($services as $service){
                $data = date('d-m-Y',strtotime($day));
                $giorno =  explode('-',$day);
                $giorno = Driver::translateToItaDayOfWeek(date('D',mktime(0, 0, 0, $giorno[1], $giorno[2], $giorno[0])));

                $rows = Driver::getDriverServicesDay($day,$service['DRIVER_ID']);


                $title = 'Autista: '.$service["driver"].' numero servizi:  ('.$rows.') - '.$giorno.' '.$data;
                $pdf = new CustomPdf("L","mm","A4");
                $pdf->setHeaderTitle($title);
                $pdf->AddPage();

                if($rows){
                    $header = array(
                        'N.',
                        'PRA',
                        'Servizio',
                        'Orario',
                        'Vettore',
                        'Cliente',
                        'Referente',
                        'Pax',
                        'Tragitto',
                        'Mezzo',
                        'Tipo',
                        'Nota');

                    $w = array (
                        5,
                        9,
                        21,
                        15,
                        18,
                        40,
                        40,
                        10,
                        50,
                        25,
                        10,
                        52
                    );
                    $pdf->FancyTable($header,$rows,$w);
                }
                $pdf->Output("uploads/servizi_autisti"."_".$giorno."_".$data.".pdf", 'F');

                $messageParams = array(
                    'name' => $service["driver"],
                    'day'=>$data
                );
                $body = $this->getPartial('driver_mail', $messageParams);
                $from = "leonardo.podda@gmail.com";

                $fromName = "Maremania";
                $to = $service['EMAIL'];
                $toName = $service['driver'];

                $subject = "Servizi autista ".$service['driver']." per il giorno: ".$data."";

                $bbc_email = "leonardopodda.ntbusinss@gmail.com";

                $message = Swift_Message:: newInstance()
                    ->setFrom(array($from=>$fromName))
                    ->setTo(array($to=>$toName))
                    ->setBcc($bbc_email)
                    ->setSubject($subject)
                    ->setBody($body,'text/html');

                $attachment = Swift_Attachment::fromPath("uploads/servizi_autisti"."_".$giorno."_".$data.".pdf", 'application/pdf');
                //	Attach it to the message
                $message->attach($attachment);
                $res = $this->getMailer()->send($message);

                unlink("uploads/servizi_autisti"."_".$giorno."_".$data.".pdf");
            }

        }
        catch(Exception $e){
            $e->getMessage();
        }
        sfView::NONE;
        exit;
    }


    /**
     * show driver's services list.
     */
    public function executeDriverServiceList(sfRequest $request){
        $day = $request->getParameter('day');
        $driver_id = $request->getParameter('driver_id');
        $services = Driver::getDriverServicesDay($day,$driver_id);
        return $this->renderPartial('driverServiceList',array('driverService'=>$services,'id'=>$driver_id,'day'=>$day));
        exit;
        sfView::SUCCESS;

    }
    /**
     * show driver's services list.
     */
    public function executeDriverServiceListPdf(sfRequest $request){
        $day = $request->getParameter('day');
        $data = date('d-m-Y',strtotime($day));
        $giorno =  explode('-',$day);
        $giorno = Driver::translateToItaDayOfWeek(date('D',mktime(0, 0, 0, $giorno[1], $giorno[2], $giorno[0])));

        $driver_id = $request->getParameter('id');
        $driver = sfGuardUserPeer::retrieveByPK($driver_id);
        $services = Driver::getDriverServicesDay($day,$driver_id);

        $pdf = new CustomPdf();
        if(count($services)){
                    $title = 'Autista: '.$driver.' numero servizi:  ('.count($services).') - '.$giorno.' '.$data;
                    $pdf->setHeaderTitle($title);
                    $pdf->AddPage();

                    if(count($services)){
                        $header = array(
                            'N.',
                            'PRA',
                            'Servizio',
                            'Orario',
                            'Vettore',
                            'Cliente',
                            'Referente',
                            'Pax',
                            'Tragitto',
                            'Mezzo',
                            'Tipo',
                            'Nota');

                        $w = array (
                            5,
                            9,
                            21,
                            15,
                            18,
                            40,
                            40,
                            10,
                            50,
                            25,
                            10,
                            52
                        );
                        $pdf->FancyTable($header, $services ,$w);
                    }
          }

            $pdf->Output("servizi_autista"."_".$giorno."_".$data.".pdf","I");
            exit;

    }



}
