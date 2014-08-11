<?php

/**
 * departure actions.
 *
 * @package    transfer
 * @subpackage departure
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class departureActions extends sfActions
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
            $day  = $this->getUser()->getCurrentDepartureDate();
            if(!$this->getUser()->isSuperAdmin() && $this->getUser()->hasCredential('customer')){
                $customer_id =$this->getUser()->getProfile()->getId();

                $departure = DepartureQuery::create()
                    ->useBookingQuery()
                        ->filterByCustomerId($customer_id)
                    ->endUse()
                    ->orderBy('hour')->findOneByDay($day);
            }
            else{
                $departure = DepartureQuery::create()->orderBy('hour')->findOneByDay($day);
            }
            $booking = $departure ? $departure->getBooking() : null;
        }
        $this->form = new BookingDepartureForm($booking);
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
                $this->form = new BookingDepartureForm($booking);
                return $this->renderPartial('departure/departure_form', array('form' => $this->form));
            }else{
                $response = sfContext::getInstance()->getResponse();
                return $response->setStatusCode(404,'Prenotazione non trovata.');
            }

        }
    }

    public function executeGet_data(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        $day  = $this->getUser()->getCurrentDepartureDate();

        if(!$this->getUser()->isSuperAdmin() && $this->getUser()->hasCredential('customer')){
            $customer_id =$this->getUser()->getProfile()->getId();
            $departures = DeparturePeer::getDataByDay($day,$customer_id);
        }
        else{
            $departures = DeparturePeer::getDataByDay($day);
        }

        $json = '{ "data":[';
        $first = 0;
        foreach ($departures as $v)
        {
            if ($first++) $json .= ',';

            $route = $v['route'];
            $is_cancelled = strtoupper($v['Annullato']);
            $json .= '["'.$v['id'].'","'.$is_cancelled.'","'.$v['number'].'/'.$v['year'].'","'.$v['hour'].'","'.$v['flight'].'","'.$v['vehicle_type'].'","'.$v['driver'].'","'.$v['customer'].'","'.$v['contact'].'","'.$route.'"]';
        }
        $json .= ']}';
        return $this->renderText($json);
    }

    public function executeSetDriver(sfWebRequest $request){
        if ($request->isXmlHttpRequest())
        {
            sfConfig::set('sf_web_debug', false);
            $departure = DeparturePeer::retrieveByPK($request->getParameter('departure_id'));
            $driver = $departure->getDriver();
            if($request->getParameter('driver_id')){
                $departure->setDriverId($request->getParameter('driver_id'));
            }
            else{
                $departure->setDriverId(null);
            }
            try{
                $res = $departure->save();

                if($res){
                    $driver = $departure->getDriver() ? $departure->getDriver() : "";
                }
                return $this->renderText($driver);

            }
            catch(Exception $e){
                $response = sfContext::getInstance()->getResponse();
                return $response->setStatusCode(500,'Errore nel salvataggio.');
            }
        }
    }

    public function executeDeparturePdf(sfWebRequest $request){
        $day  = $this->getUser()->getCurrentDepartureDate();
        $data = date('d-m-Y',strtotime($day));
        $giorno =  explode('-',$day);
        $giorno = UtilityHelper::translateToItaDayOfWeek(date('D',mktime(0, 0, 0, $giorno[1], $giorno[2], $giorno[0])));

        if(!$this->getUser()->isSuperAdmin() && $this->getUser()->hasCredential('customer')){
            $customer_id = $this->getUser()->getPrifile()->getId();
            $rows = DeparturePeer::getServicesByDay($day,$customer_id);
        }
        else{
            $rows = DeparturePeer::getServicesByDay($day);
        }

        try{
            $pdf = new CustomPdf();
            $title = 'Transfer in Partenza: ('.count($rows).') - '.$giorno.' '.$data;
            $pdf->setHeaderTitle($title);
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(1,0.5);

            if(count($rows)){
                $header = array('N.',
                    'Prg.',
                    'Servizio',
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
            }
            $pdf->Output("transfer_partenza"."_".$giorno."_".$data.".pdf","I");
        }
        catch(Exception $e){
            $e->getMessage();
        }
        sfView::NONE;
        exit;
    }

    /**
     * set departure day
     */
    public function executeUpdateDay(sfWebRequest $request){

        $booking_form = $request->getParameter('booking');
        $day = date('Y-m-d',strtotime($booking_form['departure']['day_update']));
        $departure_id = $booking_form['departure']['id'];
        $departure = DeparturePeer::retrieveByPK($departure_id);
        $departure->setDay($day);
        $departure->save();
        $this->redirect('departure/index');

    }

    /**
     * set the current session departure date.
     */
    public function executeChangeDate(sfWebRequest $request){

        $booking_form =$request->getParameter('booking');
        $day = date('Y-m-d',strtotime($booking_form['departure']['day_change']));
        $this->getUser()->setCurrentDepartureDate($day);
        $this->forward('departure','index');


    }

    public function executeSelectCustomer(sfWebRequest $request){

        if ($request->isXmlHttpRequest())
        {
            sfConfig::set('sf_web_debug', false);
            $this->form = new BookingDepartureForm();
            return $this->renderPartial('departure/selectCustomer', array('form' => $this->form));

        }
    }

    public function executeEdit(sfWebRequest $request)
    {
        $booking = BookingQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($booking, sprintf('Object Booking  does not exist (%s).', $request->getParameter('id')));
        $this->form = new BookingDepartureForm($booking);
        $this->setTemplate('index');
    }



    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $booking = BookingQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($booking, sprintf('Object Booking does not exist (%s).', $request->getParameter('id')));
        $this->form = new BookingDepartureForm($booking);

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
            $values = $form->getValues();
            $booking = $form->save();
            $this->redirect('departure/edit?id='.$booking->getId());

        }
        else{
            $this->form = $form;
            $this->setTemplate('index');
        }
    }

    public function executePickUp(sfWebRequest $request){
        $hour  = $request->getParameter('hour');
        $minute  = $request->getParameter('minute');
        $locality_from   = $request->getParameter('locality_from');
        $locality_to  = $request->getParameter('locality_to');
        $pickUp  = $request->getParameter('pickUp');

        if($pickUp == "false"){
            $route = RouteQuery::create()
                ->filterByLocalityFrom($locality_from)
                ->filterByLocalityTo($locality_to)
                ->findOne();
            if($route){
                $duration = $route->getDuration();
                $durationTime = explode(":",$duration);
                $departureTime =  $this->calculateDepartureTime($hour,$minute,(int) $durationTime[0],(int) $durationTime[1]);
            }

        }else{
            $departureTime = array('departureHour'=>$hour,'departureMinute'=>$minute);
        }

        $departureTime = json_encode($departureTime);
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        return $this->renderText($departureTime);

    }

    private function calculateDepartureTime($hour,$minute,$routeHour = 0,$routeMinute = 0){
        // il tempo che deve essere sottratto: anticipo del vettore + durata.
        if($minute < $routeMinute)
        {
            if($hour == 1){
                $hour = 25;
            }
            if($hour == 0){
                $hour = 24;
            }
            $hour = $hour - 1;
            if($hour == 24){
                $hour = 0;
            }

            $minute = $minute + 60;
        }

        $minute = $minute - $routeMinute;
        $minus = 0;

        if($hour < $routeHour)
        {
            $minus = $hour - $routeHour;
            $hour = 24 + $minus;
        }
        else{
            $hour = $hour - $routeHour;
        }

        return  array('departureHour'=>$hour,'departureMinute'=>$minute);

    }
}
