<?php

/**
 * serviceHostess actions.
 *
 * @package    transfer
 * @subpackage serviceHostess
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class serviceHostessActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->form = new ServiceHostessForm(array('year'=> $this->getUser()->getSessionYear()));

  }

    public function executeGetData(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        $form = array();
         parse_str(urldecode($request->getParameter('form')),$form);
        //start: sorting
        $type_colnames = array(BookingPeer::BOOKING_DATE,BookingPeer::CUSTOMER_ID,BookingPeer::CONTACT,BookingPeer::RIF_FILE);
        $iSortCol_0 = $request->getParameter('iSortCol_0');
        if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
        $c = new Criteria();
        $c->addJoin(BookingPeer::CUSTOMER_ID,CustomerPeer::ID);
        $c->addDescendingOrderByColumn(BookingPeer::BOOKING_DATE);

        if(isset($form['serviceHostess']) && !empty($form['serviceHostess'])){
            $serviceHostesForm = $form['serviceHostess'];

            foreach($serviceHostesForm as $key => $field){
                switch($key){
                    case 'date_range':
                        if(checkdate($field['from']['month'],$field['from']['day'],$field['from']['year']))
                            $from = $field['from']['year']."-".$field['from']['month']."-".$field['from']['day'];
                        break;
                }
            }
        }
        $item_per_page = $request->getParameter('length', 10);
        $page = ($request->getParameter('start', 0) / $item_per_page) + 1;
        $pager = BookingPeer::doSelectPager($page, $item_per_page, $c);

        $json["iTotalRecords"] = $pager->getNbResults();
        $json["iTotalDisplayRecords"] = $pager->getNbResults();
        $json["aaData"] = array();
        foreach ($pager->getResults() as $v)
        {
            $val = array($v->getNumber().'/'.$v->getYear(),date('d-m-Y',strtotime($v->getBookingDate())),$v->getCustomer()->getName(),$v->getContact(),$v->getAdult().'/'.($v->getChild() ? $v->getChild() : 0),$v->getRifFile());
            array_push($json["aaData"],$val);
        }
        return $this->renderText(json_encode($json));
    }


  public function executeGetContacts(sfWebRequest $request){
      sfConfig::set('sf_web_debug', false);
      $this->getResponse()->setContentType('application/json');

    $param = $request->getParameter('term');
    $result = BookingQuery::create()->select('contact')->findByContact("%$param%");
    $contacts = $result->toArray();
    return $this->renderText(json_encode($contacts));
  }

  public function executeGetRifFiles(sfWebRequest $request){
      sfConfig::set('sf_web_debug', false);
      $this->getResponse()->setContentType('application/json');

      $param = $request->getParameter('term');
      $result = BookingQuery::create()->select('rifFile')->findByRifFile("%$param%");
      $rifFiles = $result->toArray();
      return $this->renderText(json_encode($rifFiles));
  }

    public function executeGetCustomers(sfWebRequest $request){
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        $param = $request->getParameter('term');

        $result = CustomerQuery::create()->select('name')->findByName("%$param%");
        $customers = $result->toArray();
        return $this->renderText(json_encode($customers));
    }

    public function executeGetLocalities(sfWebRequest $request){
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        $param = $request->getParameter('term');

        $result = LocalityQuery::create()->select('name')->findByName("%$param%");
        $localities = $result->toArray();
        return $this->renderText(json_encode($localities));
    }

}
