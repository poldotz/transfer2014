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


  public function executeSelectCustomer(sfWebRequest $request){

      if ($request->isXmlHttpRequest())
      {
            sfConfig::set('sf_web_debug', false);
            $this->form = new BookingForm();
            return $this->renderPartial('booking/selectCustomer', array('form' => $this->form));

      }
  }


    public function executeGet_data(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');

        //start: sorting
        $type_colnames = array(BookingPeer::YEAR,BookingPeer::NUMBER);
        $iSortCol_0 = $request->getParameter('iSortCol_0');
        if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
        $c = new Criteria();
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

    public function executeEdit(sfWebRequest $request)
    {
        $booking = BookingQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($booking, sprintf('Object Booking  does not exist (%s).', $request->getParameter('id')));
        $this->form = new BookingForm($booking);
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
