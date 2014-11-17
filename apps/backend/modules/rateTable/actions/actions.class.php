<?php

/**
 * rateTable actions.
 *
 * @package    transfer
 * @subpackage rateTable
 * @author     Poldotz
 */
class rateTableActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $this->form = new CustomerSearchForm();
    //$this->CustomerRateTables = CustomerRateTableQuery::create()->find();
  }

  public function executeSearch(sfWebRequest $request){

    $customer_id = $request->getParameter('id',null);


  }

    public function executeGet_data(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');

        //start: sorting
        $type_colnames = array(CustomerPeer::NAME);
        $iSortCol_0 = $request->getParameter('iSortCol_0');
        if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
        $c = new Criteria();
        $c->addJoin(CustomerPeer::USER_ID,sfGuardUserPeer::ID,Criteria::LEFT_JOIN);
        $c->addJoin(CustomerPeer::CUSTOMER_TYPE_ID,CustomerTypePeer::ID);
        if ($query = $request->getParameter('sSearch'))
        {
            $c->addOr(CustomerPeer::NAME,"%".$query."%",Criteria::LIKE);
            $c->addOr(CustomerTypePeer::DESCRIPTION,"%".$query."%",Criteria::LIKE);
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
        $pager = CustomerPeer::doSelectPager($page, $item_per_page, $c);
        //end: paging
        $json = '{"iTotalRecords":'.$pager->getNbResults().',
     "iTotalDisplayRecords":'.$pager->getNbResults().',
     "aaData":[';
        $first = 0;
        foreach ($pager->getResults() as $v)
        {
            if ($first++) $json .= ',';
            $status = $v->getSfGuardUser()->getIsActive() ? "ATTIVO" : "NON ATTIVO";
            $json .= '["'.$v->getName().'","'.$v->getCustomerType().'","'.$status.'","<input class=\'btn btn-info\' style=\'float:left; margin: 5px;\' value=\'Tarifazione\' type=\'button\'>"]';
        }
        $json .= ']}';
        return $this->renderText($json);
    }


    public function setRateTable(sfWebRequest $request){
        $customer_id = $request->getParameter('customer_id');
        if($customer_id){
            $this->form = new RateCollectionForm(null,array('customer_id'=>$customer_id));
            $this->customer = CustomerPeer::retrieveByPK($customer_id);
        }
        else{
            $this->redirect('rateTable/index');
        }

    }


    public function executeNew(sfWebRequest $request)
  {
    $this->form = new CustomerRateTableForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CustomerRateTableForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $CustomerRateTable = CustomerRateTableQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($CustomerRateTable, sprintf('Object CustomerRateTable does not exist (%s).', $request->getParameter('id')));
    $this->form = new CustomerRateTableForm($CustomerRateTable);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $CustomerRateTable = CustomerRateTableQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($CustomerRateTable, sprintf('Object CustomerRateTable does not exist (%s).', $request->getParameter('id')));
    $this->form = new CustomerRateTableForm($CustomerRateTable);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $CustomerRateTable = CustomerRateTableQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($CustomerRateTable, sprintf('Object CustomerRateTable does not exist (%s).', $request->getParameter('id')));
    $CustomerRateTable->delete();

    $this->redirect('rateTable/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $CustomerRateTable = $form->save();

      $this->redirect('rateTable/edit?id='.$CustomerRateTable->getId());
    }
  }
}
