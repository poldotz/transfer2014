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

    public function executeGet_data(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        $day  = $this->getUser()->getCurrentArrivalDate();
        //start: sorting
        $type_colnames = array(ArrivalPeer::HOUR,BookingPeer::NUMBER,BookingPeer::YEAR);
        $iSortCol_0 = $request->getParameter('iSortCol_0',ArrivalPeer::HOUR);
        if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
        $c = new Criteria();
        $c->add(ArrivalPeer::DAY,$day,Criteria::EQUAL);
        $c->addJoin(ArrivalPeer::BOOKING_ID,BookingPeer::ID);
        $c->addJoin(BookingPeer::CUSTOMER_ID,CustomerPeer::ID);
        $c->addJoin(BookingPeer::VEHICLE_TYPE_ID,VehicleTypePeer::ID);
        if ($query = $request->getParameter('sSearch'))
        {
            $c->addOr(BookingPeer::YEAR,"%".$query."%",Criteria::LIKE);
            $c->addOr(BookingPeer::NUMBER,"%".$query."%",Criteria::LIKE);
            $c->addOr(BookingPeer::CONCTACT,"%".$query."%",Criteria::LIKE);
            $c->addOr(BookingPeer::RIF_FILE,"%".$query."%",Criteria::LIKE);
            $c->addOr(CustomerPeer::NAME,"%".$query."%",Criteria::LIKE);
        }
        if ('asc' === $request->getParameter('sSortDir_0', 'asc'))
        {
            $c->addAscendingOrderByColumn(ArrivalPeer::HOUR);
        }
        else
        {
            $c->addDescendingOrderByColumn(ArrivalPeer::HOUR);
        }
        //end: sorting
        //start: paging
        $arrivals = ArrivalPeer::doSelect($c);
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
            $values = $form->getValues();
            $booking = $form->save();
            $this->redirect('arrival/edit?id='.$booking->getId());

        }
        else{
            $this->form = $form;
            $this->setTemplate('index');
        }
    }
}
