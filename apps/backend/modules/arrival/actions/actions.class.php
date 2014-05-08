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
        $arrivals = ArrivalQuery::create()
            ->filterByDay($day)
            ->orderByHour()
            ->orderById()
            ->find();
        $con = Propel::getConnection();
        $con->getLastExecutedQuery();

        $json = '{ "data":[';
        $first = 0;
        foreach ($arrivals as $v)
        {
            if ($first++) $json .= ',';
            $booking = $v->getBooking();
            $route = $v->getLocalityFromName()."-".$v->getLocalityToName();
            $is_cancelled = $v->getCancelled() ? 'SI':'NO';
            $json .= '["'.$v->getId().'","'.$is_cancelled.'","'.$booking->getNumber().'/'.$booking->getYear().'","'.substr($v->getHour(),0,5).'","'.$v->getFlight().'","'.$booking->getVehicleType().'","'.$v->getDriver().'","'.$booking->getCustomer().'","'.$booking->getContact().'","'.$route.'"]';
        }
        $json .= ']}';
        return $this->renderText($json);
    }

    public function executeArrivalPdf(sfWebRequest $request){
        $day  = $this->getUser()->getCurrentArrivalDate();
        $data = date('d-m-Y',strtotime($day));
        $giorno =  explode('-',$day);
        $giorno = $this->translateToItaDayOfWeek(date('D',mktime(0, 0, 0, $giorno[1], $giorno[2], $giorno[0])));

        $con = Propel::getConnection();
        $con->useDebug(true);

        $select = "SELECT if(a.cancelled,'si','no') as 'Anullato', b.number, substr(a.hour,1,5) as 'hour', a.flight, substr(c.name, 1,15) as 'customer', substr(b.contact,1,15) as 'contact', concat(b.adult,'/',b.child) as 'pax', concat(substr(locfrom.name,1,15),'/',substr(locto.name,1,15)) as 'route', v.name, concat(driver.first_name,'/',substr(driver.last_name,1,1),'.') as 'driver', p.name,a.note ";
        $from = " FROM arrival as a JOIN booking as b on (a.booking_id = b.id) ".
                 " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
                 " JOIN locality as locfrom on (a.locality_from = locfrom.id) ".
                 " JOIN locality as locto ON (a.locality_to = locto.id) ".
                 " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
                 " LEFT JOIN sf_guard_user as driver on (a.driver_id = driver.id) ".
                 " LEFT JOIN payment_method as p on (a.payment_method_id = p.id) ";
        $where = " WHERE a.day ='".$day."' ";
        $order_by = " ORDER BY a.hour, v.id, b.number;";

        $query = $select.$from.$where.$order_by;

        try{
            $statement = $con->prepare($query);
            $statement->execute();
            $pdf = new CustomPdf("L","mm","A4");
            $title = 'Transfer in arrivo: ('.$statement->rowCount().') - '.$giorno.' '.$data;
            $pdf->setHeaderTitle($title);
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(1,0.5);

            if($statement->rowCount()){
                $header = array('N.',
                                'Progr.',
                                'Arrivo',
                                'Vettore',
                                'Cliente',
                                'Referente',
                                'Pax',
                                'Tragitto',
                                'Categoria Mezzo',
                                'Autista',
                                'Tipo',
                                'Nota');
                $w = array (
                    8,
                    12,
                    15,
                    18,
                    40,
                    40,
                    10,
                    45,
                    28,
                    25,
                    10,
                    42
                );
                $rows = $statement->fetchAll(PDO::FETCH_NUM);
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

    private function translateToItaDayOfWeek($giorno ="")
    {
        switch($giorno)
        {
            case "Sun":
                $giorno = "Domenica";
                break;
            case "Mon":
                $giorno = "Lunedi";
                break;
            case "Tue":
                $giorno = "Martedi";
                break;
            case "Wed":
                $giorno = "Mercoledi";
                break;
            case "Thu":
                $giorno = "Giovedi";
                break;
            case "Fri":
                $giorno = "Venerdi";
                break;
            case "Sat":
                $giorno = "Sabato";
                break;
            default:
                $giorno = "Errore";
                break;
        }
        return $giorno;
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
            $arrival->setDriverId($request->getParameter('driver_id'));
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
