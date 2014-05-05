<?php

/**
 * locality actions.
 *
 * @package    transfer
 * @subpackage locality
 * @author     Poldotz
 */
class localityActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //$this->Localities = LocalityQuery::create()->find();
  }

    public function executeGet_data(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');

        //start: sorting
        $type_colnames = array(LocalityPeer::NAME);
        $iSortCol_0 = $request->getParameter('iSortCol_0');
        if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
        $c = new Criteria();
        if ($query = $request->getParameter('sSearch'))
        {
            $c->addOr(LocalityPeer::NAME,"%".$query."%",Criteria::LIKE);
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
        $pager = LocalityPeer::doSelectPager($page, $item_per_page, $c);
        //end: paging
        $json = '{"iTotalRecords":'.$pager->getNbResults().',
     "iTotalDisplayRecords":'.$pager->getNbResults().',
     "aaData":[';
        $first = 0;
        foreach ($pager->getResults() as $v)
        {
            if ($first++) $json .= ',';
            $status = $v->getIsActive() ? "SI" : "NO";
            $vector = $v->getIsVector() ? "SI" : "NO";
            $json .= '["'.$v->getName().'","'.$vector.'","'.$v->getEmail().'","'.$v->getPhone().'","'.$v->getFax().'","'.$status.'","<input class=\'btn btn-info\' style=\'float:left; margin: 5px;\' value=\'Modifica\' type=\'button\' onclick=\"document.location.href=\'locality/edit/id/'.$v->getId().' \';\">"]';
        }
        $json .= ']}';
        return $this->renderText($json);
    }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LocalityForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LocalityForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Locality = LocalityQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Locality, sprintf('Object Locality does not exist (%s).', $request->getParameter('id')));
    $this->form = new LocalityForm($Locality);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Locality = LocalityQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Locality, sprintf('Object Locality does not exist (%s).', $request->getParameter('id')));
    $this->form = new LocalityForm($Locality);

    $error = $this->processForm($request, $this->form);
    if($error){
        $this->getUser()->setFlash('error',$error);
    }
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Locality = LocalityQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Locality, sprintf('Object Locality does not exist (%s).', $request->getParameter('id')));
    $Locality->delete();

    $this->redirect('locality/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      try{
        $Locality = $form->save();
      }
      catch(Exception $e){
          return "Verificate l'indirizzo inserito e riprovare";
      }
        $this->redirect('locality/edit?id='.$Locality->getId());
    }
  }
}
