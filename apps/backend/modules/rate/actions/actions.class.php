<?php

/**
 * rate actions.
 *
 * @package    transfer
 * @subpackage rate
 * @author     Poldotz
 */
class rateActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //$this->Rates = RateQuery::create()->find();
  }

    public function executeGet_data(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');

        //start: sorting
        $type_colnames = array(RatePeer::NAME,RatePeer::DESCRIPTION);
        $iSortCol_0 = $request->getParameter('iSortCol_0');
        if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
        $c = new Criteria();
        if ($query = $request->getParameter('sSearch'))
        {
            $c->add(RatePeer::NAME,"%".$query."%",Criteria::LIKE);
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
        $pager = RatePeer::doSelectPager($page, $item_per_page, $c);
        //end: paging
        $json["iTotalRecords"] = $pager->getNbResults();
        $json["iTotalDisplayRecords"] = $pager->getNbResults();
        $json["aaData"] = array();

        $first = 0;
        foreach ($pager->getResults() as $v)
        {
            $url = $this->generateUrl('rate_edit',array("id"=>$v->getId()));
            $action = '<input class="btn btn-info" style="float:left; margin: 5px;" value="Modifica" type="button" onclick="document.location.href=\''.$url.'\'";">';
            $json['aaData'][] = array($v->getName(),$v->getDescription(),$action);
        }
        return $this->renderText(json_encode($json));
    }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RateForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RateForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Rate = RateQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Rate, sprintf('Object Rate does not exist (%s).', $request->getParameter('id')));
    $this->form = new RateForm($Rate);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Rate = RateQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Rate, sprintf('Object Rate does not exist (%s).', $request->getParameter('id')));
    $this->form = new RateForm($Rate);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Rate = RateQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Rate, sprintf('Object Rate does not exist (%s).', $request->getParameter('id')));
    $Rate->delete();

    $this->redirect('rate/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $rateForm = $request->getParameter('rate');
    if(isset($rateForm) && isset($rateForm['day'])){
        $day = $rateForm['day'];
        if(is_array($day)){
            $day = implode("",$day);
            $rateForm['day'] = $day;
        }

        $request->setParameter('rate',$rateForm);

    }
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
        $values = $form->getValues();
      $Rate = $form->save();

      $this->redirect('rate/edit?id='.$Rate->getId());
    }
  }
}
