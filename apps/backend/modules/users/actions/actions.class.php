<?php

/**
 * users actions.
 *
 * @package    transfer
 * @subpackage users
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usersActions extends sfActions
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
        $type_colnames = array(sfGuardUserPeer::USERNAME);
        $iSortCol_0 = $request->getParameter('iSortCol_0');
        if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
        $c = new Criteria();
        //$c->addJoin(sfGuardUserPeer::ID,sfGuardUserProfilePeer::USER_ID);
        $c->addJoin(sfGuardUserPeer::ID,sfGuardUserGroupPeer::USER_ID);
        $c->addJoin(sfGuardUserGroupPeer::GROUP_ID,sfGuardGroupPeer::ID);
        if ($query = $request->getParameter('sSearch'))
        {
            $c->addOr(sfGuardUserPeer::USERNAME,"%".$query."%",Criteria::LIKE);
            $c->addOr(sfGuardUserPeer::FIRST_NAME,"%".$query."%",Criteria::LIKE);
            $c->addOr(sfGuardUserPeer::LAST_NAME,"%".$query."%",Criteria::LIKE);
            $c->addOr(sfGuardGroupPeer::NAME,"%".$query."%",Criteria::LIKE);

            //$c->addOr(sfGuardUserProfilePeer::FIRST_NAME,"%".$query."%",Criteria::LIKE);
            //$c->addOr(sfGuardUserProfilePeer::LAST_NAME,"%".$query."%",Criteria::LIKE);
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
        $pager = sfGuardUserPeer::doSelectPager($page, $item_per_page, $c);
        //end: paging

        $json["iTotalRecords"] = $pager->getNbResults();
        $json["iTotalDisplayRecords"] = $pager->getNbResults();
        $json["aaData"] = array();
        foreach ($pager->getResults() as $v)
        {
            $status = $v->getIsActive() ? '<span class="badge badge-success"> ATTIVO</span>' : '<span class="badge badge-warning"> NON ATTIVO</span>';
            $url = $this->generateUrl('user_edit',array('id'=>$v->getId()));
            $action = '<input class="btn btn-info" style="float:left; margin: 5px;" value="Modifica" type="button" onclick="document.location.href=\''.$url.'\'">';
            $val = array($v->getUserName(),$v->getFirstName(),$v->getLastName(),$v->getEmail(),$v->getPhone(),implode(",",$v->getGroupNames()),$status,$action);
            array_push($json["aaData"],$val);
        }
        return $this->renderText(json_encode($json));
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new sfGuardUserForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new sfGuardUserForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $user = sfGuardUserQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($user, sprintf('Object User does not exist (%s).', $request->getParameter('id')));
        $this->form = new sfGuardUserForm($user);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $user = sfGuardUserQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($user, sprintf('Object User does not exist (%s).', $request->getParameter('id')));
        $this->form = new sfGuardUserForm($user);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeCustomers(sfWebRequest $request){

        if($request->isXmlHttpRequest()){
            sfConfig::set('sf_web_debug', false);
            if($request->getParameter('group_type',null)){
                $group = sfGuardGroupPeer::retrieveByPK($request->getParameter('group_type'));
                if($group->getName() == "Cliente"){
                    $form = new sfGuardUserForm();
                    return $this->renderPartial('customers',array('form'=>$form));
                }
                else{
                    return $this->renderText("");
                }
            }
            else{
                return $this->renderText("");
            }
        }
        else{
            return $this->renderText("");
        }
    }

    public function executeSelectCustomer(sfWebRequest $request){

        if ($request->isXmlHttpRequest())
        {
            sfConfig::set('sf_web_debug', false);
            $form = new sfGuardUserForm();
            return $this->renderPartial('selectCustomer', array('form' => $form));
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $user = $form->save();
            $parameters = $request->getParameter($form->getName());
            if(isset($parameters['customer_id'])){
                $newCustomer = CustomerPeer::retrieveByPK($parameters['customer_id']);
                if($newCustomer != $user->getProfile()){
                    $oldCustomer = $user->getProfile();
                    $oldCustomer->setsfGuardUser(null);
                    $oldCustomer->save();
                }
                $newCustomer->setsfGuardUser($user);
                $newCustomer->save();
            }

            $this->redirect('users/edit?id='.$user->getId());
        }
    }

}
