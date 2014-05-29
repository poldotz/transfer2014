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
                $pdf = new CustomPdf();
                $data = date('d-m-Y',strtotime($day));
                $giorno =  explode('-',$day);
                $giorno = UtilityHelper::translateToItaDayOfWeek(date('D',mktime(0, 0, 0, $giorno[1], $giorno[2], $giorno[0])));
                foreach($services as $service){
                    $rows = Driver::getDriverServicesDay($day,$service['DRIVER_ID']);
                    $title = 'Autista: '.$service["driver"].' numero servizi:  ('.count($rows).') - '.$giorno.' '.$data;
                    $pdf = $this->generateDriverServicesPdf($pdf,$title,$rows,'',false,'NOT');
                }
                $pdf->Output("servizi_autisti"."_".$giorno."_".$data.".pdf","I");
            }
            catch(Exception $e){
                $e->getMessage();
            }
            sfView::NONE;
            exit;
    }

    public function executeServicesDriversPdfEmail(sfWebRequest $request){
        //sfConfig::set('sf_web_debug', false);
        $day = $this->getUser()->getCurrentDriversDate();
        $services = Driver::getDriversServices($day);

        try{
            $data = date('d-m-Y',strtotime($day));
            $giorno =  explode('-',$day);
            $giorno = UtilityHelper::translateToItaDayOfWeek(date('D',mktime(0, 0, 0, $giorno[1], $giorno[2], $giorno[0])));
            $sended = 0;
            foreach($services as $service){
                $rows = Driver::getDriverServicesDay($day,$service['DRIVER_ID']);
                $title = 'Autista: '.$service["driver"].' numero servizi:  ('.count($rows).') - '.$giorno.' '.$data;
                $filename = sfConfig::get('sf_upload_dir')."/servizi_autisti"."_".$giorno."_".$data.".pdf";
                $this->generateDriverServicesPdf(null,$title,$rows,$filename,true,"F");
                $template_params = array('name'=>$service['driver'],'date'=>$data);
                $sended += $this->sendEmailTo('driver_mail',$template_params,array($service['EMAIL']=>$service['driver']),$title,$filename);
                unlink($filename);
            }
            return $this->renderText("Numero email inviate: ".$sended);
        }
        catch(Exception $e){
            $this->renderText($e->getMessage());
        }
    }

    public function executeServicesDriverPdfEmail(sfWebRequest $request){
        //sfConfig::set('sf_web_debug', false);
        $day = $this->getUser()->getCurrentDriversDate();
        $driver_id = $request->getParameter('driver_id');
        try{
            $data = date('d-m-Y',strtotime($day));
            $giorno =  explode('-',$day);
            $giorno = UtilityHelper::translateToItaDayOfWeek(date('D',mktime(0, 0, 0, $giorno[1], $giorno[2], $giorno[0])));
            $sended = 0;
            $driver = sfGuardUserPeer::retrieveByPK($driver_id);
            $rows = Driver::getDriverServicesDay($day,$driver->getId());
            $title = 'Autista: '.$driver.' numero servizi:  ('.count($rows).') - '.$giorno.' '.$data;
            $filename = sfConfig::get('sf_upload_dir')."/servizi_autisti"."_".$giorno."_".$data.".pdf";
            $this->generateDriverServicesPdf(null,$title,$rows,$filename,true,"F");
            $template_params = array('name'=>$driver,'date'=>$data);
            $sended = $this->sendEmailTo('driver_mail',$template_params,array($driver->getEmail()=>$driver),$title,$filename);
            unlink($filename);
            return $this->renderText("Numero email inviate: ".$sended);
        }
        catch(Exception $e){
            return $this->renderText($this->renderText($e->getMessage()));
        }
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

    /*
 * Send driver's service list.
 */
    private function sendEmailTo($template_name,$template_params,$recipient=array(),$subject="",$attachment){


        $body = $this->getPartial($template_name, $template_params);
        $from = "transfer@maremania.com";
        $fromName = "Maremania";
        $to = key($recipient);
        $toName = current($recipient);
        $bbc_email = "maremania.transfer@gmail.com";
        $message = Swift_Message::newInstance()
            ->setFrom(array($from=>$fromName))
            ->setTo(array($to=>$toName))
            ->setBcc($bbc_email)
            ->setSubject($subject)
            ->setBody($body,'text/html');



        $attachment = Swift_Attachment::fromPath($attachment, 'application/pdf');
        //	Attach it to the message
        $message->attach($attachment,'application/pdf');
        $mailer = $this->getMailer();
        $res = $mailer->send($message);

        // Dump the log contents
        // NOTE: The EchoLogger dumps in realtime so dump() does nothing for it

        return $res;
    }

    /**
     * show driver's services list.
     */
    public function executeDriverServiceListPdf(sfRequest $request){
        $day = $request->getParameter('day');
        $data = date('d-m-Y',strtotime($day));
        $giorno =  explode('-',$day);
        $giorno = UtilityHelper::translateToItaDayOfWeek(date('D',mktime(0, 0, 0, $giorno[1], $giorno[2], $giorno[0])));

        $driver_id = $request->getParameter('id');
        $driver = sfGuardUserPeer::retrieveByPK($driver_id);
        $services = Driver::getDriverServicesDay($day,$driver_id);
        $title = 'Autista: '.$driver.' numero servizi:  ('.count($services).') - '.$giorno.' '.$data;
        $filename = "servizi_autista"."_".$giorno."_".$data.".pdf";
        $this->generateDriverServicesPdf(null,$title,$services,$filename);
    }


    private function generateDriverServicesPdf(CustomPdf $pdf = null, $title,$services,$filename,$output=true,$dest = "I"){

        if(!isset($pdf)){
            $pdf = new CustomPdf();
        }
        if(count($services)){

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
        if($output){
            $pdf->Output($filename,$dest);
            if($dest == "I"){
                exit;
            }
        }else{
            return $pdf;
        }




    }



}
