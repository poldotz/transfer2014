<?php

/**
 * arrival actions.
 *
 * @package    transfer
 * @subpackage arrival
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class arrivalActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    // è stato selezionato un record

    if($request->getParameter('id')){
        $booking = BookingPeer::retrieveByPK($request->getParameter('id'));
    }
    else{
        $day  = $this->getUser()->getCurrentArrivalDate();
        $arrival = ArrivalQuery::create()->orderBy('hour')->findOneByDay($day);
        $booking = $arrival ? $arrival->getBooking() : null;
    }
    $this->form = new BookingArrivalForm($booking);
  }

    /**
     * set arrival day
     */
    public function executeUpdateDay(sfWebRequest $request){

        $booking_form = $request->getParameter('booking');
        $day = date('Y-m-d',strtotime($booking_form['arrival']['day_update']));
        $arrival_id = $booking_form['arrival']['id'];
        $arrival = ArrivalPeer::retrieveByPK($arrival_id);
        $arrival->setDay($day);
        $arrival->save();
        $this->redirect('arrival/index');

  }



    public function executeGet_data(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        $day  = $this->getUser()->getCurrentArrivalDate();
        $arrivals = ArrivalPeer::getDataByDay($day);

        $json = '{ "data":[';
        $first = 0;
        foreach ($arrivals as $v)
        {
            if ($first++) $json .= ',';

            $route = $v['route'];
            $is_cancelled = strtoupper($v['Anullato']);
            $json .= '["'.$v['id'].'","'.$is_cancelled.'","'.$v['number'].'/'.$v['year'].'","'.$v['hour'].'","'.$v['flight'].'","'.$v['name'].'","'.$v['driver'].'","'.$v['customer'].'","'.$v['contact'].'","'.$route.'"]';
        }
        $json .= ']}';
        return $this->renderText($json);
    }

    public function executeArrivalPdf(sfWebRequest $request){
        $day  = $this->getUser()->getCurrentArrivalDate();
        $data = date('d-m-Y',strtotime($day));
        $giorno =  explode('-',$day);
        $giorno = UtilityHelper::translateToItaDayOfWeek(date('D',mktime(0, 0, 0, $giorno[1], $giorno[2], $giorno[0])));

        $rows = ArrivalPeer::getServicesByDay($day);

        try{

            $pdf = new CustomPdf();
            $title = 'Transfer in arrivo: ('.count($rows).') - '.$giorno.' '.$data;
            $pdf->setHeaderTitle($title);
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(1,0.5);

            if(count($rows)){
                $header = array('N.',
                                'Prg.',
                                'Arrivo',
                                'Vettore',
                                'Cliente',
                                'Referente',
                                'Pax',
                                'Tragitto',
                                'Mezzo',
                                'Autista',
                                'Tipo',
                                'Nota');
                $w = array (
                    5,
                    9,
                    15,
                    18,
                    40,
                    40,
                    8,
                    50,
                    25,
                    25,
                    10,
                    50
                );
                $pdf->FancyTable($header, $rows,$w);
                $pdf->Output("transfer_arrivo"."_".$giorno."_".$data.".pdf","I");
                exit;
            }
        }
        catch(Exception $e){
            $e->getMessage();
        }
        sfView::NONE;
        exit;
    }



    /**
     * set the current session arrival date.
     */
    public function executeChangeDate(sfWebRequest $request){

        $booking_form =$request->getParameter('booking');
        $day = date('Y-m-d',strtotime($booking_form['arrival']['day_change']));
        $this->getUser()->setCurrentArrivalDate($day);
        $this->forward('arrival','index');
    }

    public function executeSetDriver(sfWebRequest $request){
        if ($request->isXmlHttpRequest())
        {
            sfConfig::set('sf_web_debug', false);
            $arrival = ArrivalPeer::retrieveByPK($request->getParameter('arrival_id'));
            $driver = $arrival->getDriver();
            if($request->getParameter('driver_id')){
                $arrival->setDriverId($request->getParameter('driver_id'));
            }
            else{
                $arrival->setDriverId(null);
            }
            try{
                $res = $arrival->save();

                if($res){
                    $driver = $arrival->getDriver();
                }
                return $this->renderText($driver);

            }
            catch(Exception $e){
                $response = sfContext::getInstance()->getResponse();
                return $response->setStatusCode(500,'Errore nel salvataggio.');
            }
        }
    }

    public function executeSelectCustomer(sfWebRequest $request){

        if ($request->isXmlHttpRequest())
        {
            sfConfig::set('sf_web_debug', false);
            $this->form = new BookingArrivalForm();
            return $this->renderPartial('arrival/selectCustomer', array('form' => $this->form));

        }
    }

    public function executeEdit(sfWebRequest $request)
    {
        $booking = BookingQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($booking, sprintf('Object Booking  does not exist (%s).', $request->getParameter('id')));
        $this->form = new BookingArrivalForm($booking);
        $this->setTemplate('index');
    }

    public function executeEditJs(sfWebRequest $request){

        if ($request->isXmlHttpRequest())
        {
            sfConfig::set('sf_web_debug', false);
            $idNumber = explode("/",$request->getParameter('idNumber'));
            if(is_array($idNumber)){
                $number = $idNumber[0];
                $year = $idNumber[1];
                $booking = BookingPeer::getBookingByIdNumber($number,$year);
                $this->form = new BookingArrivalForm($booking);
                return $this->renderPartial('arrival/arrival_form', array('form' => $this->form));
            }else{
                $response = sfContext::getInstance()->getResponse();
                return $response->setStatusCode(404,'Prenotazione non trovata.');
            }

        }
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $booking = BookingQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($booking, sprintf('Object Booking does not exist (%s).', $request->getParameter('id')));
        $this->form = new BookingArrivalForm($booking);

        $error = $this->processForm($request, $this->form);
        if(isset($error)){
            $this->getUser()->setFlash('error',$error);
        }
        $this->setTemplate('index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $booking = $form->save();
            $this->redirect('arrival/edit?id='.$booking->getId());

        }
        else{
            $this->form = $form;
            $this->setTemplate('index');
        }
    }
}
