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
        $c->addJoin(sfGuardUserPeer::ID,sfGuardUserProfilePeer::USER_ID);
        if ($query = $request->getParameter('sSearch'))
        {
            $c->addOr(sfGuardUserPeer::USERNAME,"%".$query."%",Criteria::LIKE);
            $c->addOr(sfGuardUserProfilePeer::FIRST_NAME,"%".$query."%",Criteria::LIKE);
            $c->addOr(sfGuardUserProfilePeer::LAST_NAME,"%".$query."%",Criteria::LIKE);
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
        $json = '{"iTotalRecords":'.$pager->getNbResults().',
     "iTotalDisplayRecords":'.$pager->getNbResults().',
     "aaData":[';
        $first = 0;
        foreach ($pager->getResults() as $v)
        {
            if ($first++) $json .= ',';
            $status = $v->getIsActive() ? "SI" : "NO";
            $json .= '["'.$v->getUserName().'","'.$v->getFirstName().'","'.$v->getLastName().'","'.$v->getEmail().'","'.$v->getPhone().'","'.implode(",",$v->getGroupNames()).'","'.$status.'","<input class=\'btn btn-info\' style=\'float:left; margin: 5px;\' value=\'Modifica\' type=\'button\' onclick=\"document.location.href=\'users/edit/id/'.$v->getId().' \';\">"]';
        }
        $json .= ']}';
        return $this->renderText($json);
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

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $user = $form->save();

            $this->redirect('users/edit?id='.$user->getId());
        }
    }

}
