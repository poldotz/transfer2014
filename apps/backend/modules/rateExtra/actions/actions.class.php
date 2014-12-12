<?php

/**
 * rateExtra actions.
 *
 * @package    transfer
 * @subpackage rateExtra
 * @author     Poldotz
 */
class rateExtraActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->RateExtras = RateExtraQuery::create()->find();
  }

  public function executeGet_data(sfWebRequest $request)
  {
    sfConfig::set('sf_web_debug', false);
    $this->getResponse()->setContentType('application/json');

    //start: sorting
    $type_colnames = array(RateExtraPeer::NAME,RateExtraPeer::TYPOLOGY);
    $iSortCol_0 = $request->getParameter('iSortCol_0');
    if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
    $c = new Criteria();
    if ($query = $request->getParameter('sSearch'))
    {
        $c->add(RateExtraPeer::NAME,"%".$query."%",Criteria::LIKE);
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
    $pager = RateExtraPeer::doSelectPager($page, $item_per_page, $c);
    //end: paging
    $json["iTotalRecords"] = $pager->getNbResults();
    $json["iTotalDisplayRecords"] = $pager->getNbResults();
    $json["aaData"] = array();

    $first = 0;
    foreach ($pager->getResults() as $v)
    {
        $url = $this->generateUrl('rate_extra_edit',array("id"=>$v->getId()));
        $action = '<input class="btn btn-info" style="float:left; margin: 5px;" value="Modifica" type="button" onclick="document.location.href=\''.$url.'\'";">';
        $json['aaData'][] = array($v->getName(),$v->getValue(),$v->getTypology(),$action);
    }
    return $this->renderText(json_encode($json));
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RateExtraForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RateExtraForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $RateExtra = RateExtraQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RateExtra, sprintf('Object RateExtra does not exist (%s).', $request->getParameter('id')));
    $this->form = new RateExtraForm($RateExtra);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $RateExtra = RateExtraQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RateExtra, sprintf('Object RateExtra does not exist (%s).', $request->getParameter('id')));
    $this->form = new RateExtraForm($RateExtra);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $RateExtra = RateExtraQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RateExtra, sprintf('Object RateExtra does not exist (%s).', $request->getParameter('id')));
    $RateExtra->delete();

    $this->redirect('rateExtra/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $RateExtra = $form->save();

      $this->redirect('rateExtra/edit?id='.$RateExtra->getId());
    }
  }
}
