<?php

/**
 * booking actions.
 *
 * @package    transfer
 * @subpackage booking
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bookingActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

      $session_year = $this->getUser()->getSessionYear();
      $number = BookingPeer::getIdentificationNumber($session_year);
      $booking = new Booking();
      $booking->setNumber($number);
      $booking->setYear($session_year);
      $booking->setBookingDate(date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),$session_year)));
      $booking->setVersionCreatedBy($this->getUser()->getUsername());

      $this->form = new BookingForm($booking);

  }

  public function executeSearch(sfWebRequest $request){

      if ($request->isXmlHttpRequest()){

          sfConfig::set('sf_web_debug', false);
          $this->getResponse()->setContentType('application/json');

          $form = new BookingSearchForm();
          $values = $request->getParameter($form->getName());

          //start: sorting
          $type_colnames = array(BookingPeer::NUMBER,BookingPeer::YEAR);
          $iSortCol_0 = $request->getParameter('iSortCol_0',0);
          if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
          $c = new Criteria();
          $c->addJoin(BookingPeer::CUSTOMER_ID,CustomerPeer::ID);
          $c->addJoin(BookingPeer::VEHICLE_TYPE_ID,VehicleTypePeer::ID);
          if (!empty($values))
          {
              // booking search.

              if($values['booking_date']['year'] && $values['booking_date']['month'] && $values['booking_date']['day']){
                  $c->addAnd(BookingPeer::BOOKING_DATE,
                             $values['booking_date']['year']."-".sprintf("%02d",$values['booking_date']['month'])."-".sprintf("%02d",$values['booking_date']['day'])." 00:00:00",
                             Criteria::GREATER_THAN
                            );
                  $c->addAnd(BookingPeer::BOOKING_DATE,
                             $values['booking_date']['year']."-".sprintf("%02d",$values['booking_date']['month'])."-".sprintf("%02d",$values['booking_date']['day'])." 23:59:59",
                             Criteria::LESS_THAN
                            ) ;
              }


              if($values['contact']){
                $c->addOr(BookingPeer::CONCTACT,"%".$values['contact']."%",Criteria::LIKE);
              }
              if($values['rif_file']){
                $c->addOr(BookingPeer::RIF_FILE,"%".$values['rif_file']."%",Criteria::LIKE);
              }
              if($values['customer_id']){
                $c->addAnd(CustomerPeer::ID,$values['customer_id'],Criteria::EQUAL);
              }
              if($values['customer_type_id']){
                $c->addAnd(CustomerPeer::CUSTOMER_TYPE_ID,$values['customer_type_id'],Criteria::EQUAL);
              }
              if($values['vehicle_type_id']){
                  $c->addAnd(BookingPeer::VEHICLE_TYPE_ID,$values['vehicle_type_id'],Criteria::EQUAL);
              }
              if($values['adult']){
                  $c->addAnd(BookingPeer::ADULT,$values['adult'],Criteria::EQUAL);
              }
              if($values['child']){
                  $c->addAnd(BookingPeer::CHILD,$values['child'],Criteria::EQUAL);
              }

              // arrival search
          }
          if ('desc' === $request->getParameter('sSortDir_0', 'desc'))
          {
              $c->addAscendingOrderByColumn($type_colnames[$iSortCol_0]);
          }
          else
          {
              $c->addDescendingOrderByColumn($type_colnames[$iSortCol_0]);
          }
          //end: sorting
          //start: paging
          $item_per_page = $request->getParameter('iDisplayLength', 10);
          $page = ($request->getParameter('iDisplayStart', 0) / $item_per_page) + 1;
          $pager = BookingPeer::doSelectPager($page, $item_per_page, $c);
          //end: paging
          $json = '{"iTotalRecords":'.$pager->getNbResults().',
     "iTotalDisplayRecords":'.$pager->getNbResults().',
     "aaData":[';
          $first = 0;
          foreach ($pager->getResults() as $v)
          {
              if ($first++) $json .= ',';
              $json .= '["'.$v->getNumber().'/'.$v->getYear().'","'.$v->getCustomer().'","'.$v->getContact().'","'.$v->getBookingDate('d-m-Y H:i').'","'.$v->getRifFile().'","'.$v->getAdult().'/'.($v->getChild() ? $v->getChild() : 0).'","'.$v->getVehicleType().'","'.$v->getVersionCreatedBy().'"]';
          }
          $json .= ']}';
          return $this->renderText($json);
      }
      $session_year = $this->getUser()->getSessionYear();
      $booking = new Booking();
      $this->form = new BookingSearchForm($booking);


  }


  public function executeSelectCustomer(sfWebRequest $request){

      if ($request->isXmlHttpRequest())
      {
            sfConfig::set('sf_web_debug', false);
            $this->form = new BookingForm();
            return $this->renderPartial('booking/selectCustomer', array('form' => $this->form));
      }
  }

    public function executeEdit(sfWebRequest $request)
    {
        $booking = BookingQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($booking, sprintf('Object Booking  does not exist (%s).', $request->getParameter('id')));
        $this->form = new BookingForm($booking);
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
                $this->form = new BookingForm($booking);
                return $this->renderPartial('booking/booking_form', array('form' => $this->form));
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

        //start: sorting
        $type_colnames = array(BookingPeer::NUMBER,BookingPeer::YEAR);
        $iSortCol_0 = $request->getParameter('iSortCol_0');
        if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
        $c = new Criteria();
        $c->addJoin(BookingPeer::CUSTOMER_ID,CustomerPeer::ID);
        $c->addJoin(BookingPeer::VEHICLE_TYPE_ID,VehicleTypePeer::ID);
        if ($query = $request->getParameter('sSearch'))
        {
            $identification_number = explode("/",$query);

            if(isset($identification_number) && isset($identification_number[1]) &&
               strlen($identification_number['1']) &&  isset($identification_number[0]) &&  is_numeric($identification_number[0])){
                $c->addAnd(BookingPeer::YEAR,$identification_number[1],Criteria::EQUAL);
                $c->addAnd(BookingPeer::NUMBER,$identification_number[0],Criteria::EQUAL);
            }
            else{
                $c->addOr(BookingPeer::YEAR,$query,Criteria::EQUAL);
                $c->addOr(BookingPeer::NUMBER,"%".$query."%",Criteria::LIKE);
            }

            $c->addOr(BookingPeer::CONTACT,"%".$query."%",Criteria::LIKE);
            $c->addOr(BookingPeer::RIF_FILE,"%".$query."%",Criteria::LIKE);
            $c->addOr(CustomerPeer::NAME,"%".$query."%",Criteria::LIKE);
        }
        if ('desc' === $request->getParameter('sSortDir_0', 'desc'))
        {
            $c->addAscendingOrderByColumn($type_colnames[$iSortCol_0]);
        }
        else
        {
            $c->addDescendingOrderByColumn($type_colnames[$iSortCol_0]);
        }
        //end: sorting
        //start: paging
        $item_per_page = $request->getParameter('iDisplayLength', 10);
        $page = ($request->getParameter('iDisplayStart', 0) / $item_per_page) + 1;
        $pager = BookingPeer::doSelectPager($page, $item_per_page, $c);
        //end: paging
        $json = '{"iTotalRecords":'.$pager->getNbResults().',
     "iTotalDisplayRecords":'.$pager->getNbResults().',
     "aaData":[';
        $first = 0;
        foreach ($pager->getResults() as $v)
        {
            if ($first++) $json .= ',';
                $json .= '["'.$v->getNumber().'/'.$v->getYear().'","'.$v->getCustomer().'","'.$v->getContact().'","'.$v->getBookingDate('d-m-Y H:i').'","'.$v->getRifFile().'","'.$v->getAdult().'/'.($v->getChild() ? $v->getChild() : 0).'","'.$v->getVehicleType().'","'.$v->getVersionCreatedBy().'"]';
        }
        $json .= ']}';
        return $this->renderText($json);
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new BookingForm();

        $error = $this->processForm($request, $this->form);
        if(isset($error)){
            $this->getUser()->setFlash('error',$error);
        }

        $this->setTemplate('index');
    }

    public function executeCopy(sfWebRequest $request){

        $oldBook = BookingPeer::retrieveByPK($request->getParameter('id'));

        $newBook = $oldBook->copy(true);
        $session_year = $this->getUser()->getSessionYear();
        $number = BookingPeer::getIdentificationNumber($session_year);
        $newBook->setNumber($number);
        $newBook->setYear($session_year);
        $newBook->setBookingDate(date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),$session_year)));
        $newBook->setVersionCreatedBy($this->getUser()->getUsername());
        $this->form = new BookingCopyForm($newBook,array('booking_id'=> $oldBook->getId()));
        $this->setTemplate('index');
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $booking = BookingQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($booking, sprintf('Object Booking does not exist (%s).', $request->getParameter('id')));
        $this->form = new BookingForm($booking);

        $error = $this->processForm($request, $this->form);
        if(isset($error)){
            $this->getUser()->setFlash('error',$error);
        }
        $this->setTemplate('index');
    }

    public function executePickUp(sfWebRequest $request){
        $hour  = $request->getParameter('hour');
        $minute  = $request->getParameter('minute');
        $locality_from_id   = $request->getParameter('locality_from');
        $locality_to_id  = $request->getParameter('locality_to');
        $pickUp  = $request->getParameter('pickUp');

        $locality_to = LocalityPeer::retrieveByPK($locality_to_id);

        if(!$locality_to->getIsVector()){
            $taxi_service = true;
        }
        else{
            $taxi_service = false;
        }

        if($pickUp == "false"){
            $route = RouteQuery::create()
                ->filterByLocalityFrom($locality_from_id)
                ->filterByLocalityTo($locality_to_id)
                ->findOne();
            if($route){
                $duration = $route->getDuration();
                $durationTime = explode(":",$duration);
                $departureTime =  $this->calculateDepartureTime($hour,$minute,(int) $durationTime[0],(int) $durationTime[1]);
            }
            else{
                $departureTime = array('departureHour'=>$hour,'departureMinute'=>$minute);
            }

        }else{
            $departureTime = array('departureHour'=>$hour,'departureMinute'=>$minute);
        }

        $departureTime['taxi_service'] = $taxi_service;
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




    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $values = $form->getValues();
            $booking = $form->save();
            $this->redirect('booking/edit?id='.$booking->getId());

        }
        else{
            $this->form = $form;
            $this->setTemplate('index');
        }
    }
}
