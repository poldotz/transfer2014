<?php

/**
 * users actions.
 *
 * @package    transfer
 * @subpackage users
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class customerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

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
            $c->addOr(CustomerPeer::VAT_NUMBER,"%".$query."%",Criteria::LIKE);
            $c->addOr(CustomerPeer::TAX_CODE,"%".$query."%",Criteria::LIKE);
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
        $json["iTotalRecords"] = $pager->getNbResults();
        $json["iTotalDisplayRecords"] = $pager->getNbResults();
        $json["aaData"] = array();
        foreach ($pager->getResults() as $v)
        {
            $status = $v->getIsActive() ? '<span class="badge badge-success"> ATTIVO</span>' : '<span class="badge badge-warning"> NON ATTIVO</span>';
            $tax_field = $v->getCustomerType() == "Privato" ? $v->getTaxCode() : $v->getVatNumber();
            $url = $this->generateUrl('customer_edit',array('id'=>$v->getId()));
            $action = '<input class="btn btn-info" style="float:left; margin: 5px;" value="Modifica" type="button" onclick="document.location.href=\''.$url.'\'">';
            $val = array($v->getName(),$v->getCustomerType()->getDescription(),$tax_field,$v->getEmail(),$v->getPhone(),$v->getFax(),$status,$action);
            array_push($json["aaData"],$val);
        }
        return $this->renderText(json_encode($json));
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new CustomerForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CustomerForm();

        $error = $this->processForm($request, $this->form);
        if(isset($error)){
            $this->getUser()->setFlash('error',$error);
        }

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $user = CustomerQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($user, sprintf('Object Customer  does not exist (%s).', $request->getParameter('id')));
        $this->form = new CustomerForm($user);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $user = CustomerQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($user, sprintf('Object Customer does not exist (%s).', $request->getParameter('id')));
        $this->form = new CustomerForm($user);

        $error = $this->processForm($request, $this->form);
        if(isset($error)){
            $this->getUser()->setFlash('error',$error);
        }


        $this->setTemplate('edit');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            try{
                $customer = $form->save();
            }
            catch(Exception $e){
                    return "Verificare l'indirizzo inserito e riprovare";
            }
            $this->redirect('customer/edit?id='.$customer->getId());
        }

    }

}
