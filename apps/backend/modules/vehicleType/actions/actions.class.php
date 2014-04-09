<?php

/**
 * vehicleType actions.
 *
 * @package    transfer
 * @subpackage vehicleType
 * @author     Poldotz
 */
class vehicleTypeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->VehicleTypes = VehicleTypeQuery::create()->find();
  }

    public function executeGet_data(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        //start: paging
        $item_per_page = $request->getParameter('iDisplayLength', 10);
        $page = ($request->getParameter('iDisplayStart', 0) / $item_per_page) + 1;
        //end: paging
        //start: sorting
        $type_colnames = array(VehicleTypePeer::NAME);
        $iSortCol_0 = $request->getParameter('iSortCol_0');
        if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
        $c = new Criteria();
        if ('asc' === $request->getParameter('sSortDir_0', 'asc'))
        {
            $c->addAscendingOrderByColumn($type_colnames[$iSortCol_0]);
        }
        else
        {
            $c->addDescendingOrderByColumn($type_colnames[$iSortCol_0]);
        }
//end: sorting
        $pager = CountryClassificationPeer::doSelectPager($page, $item_per_page, $c);
        $pager = CountryClassificationPeer::doSelectPager($page, $item_per_page);
        $pager = VehicleTypePeer::doSelectPager();
        $json = '{"iTotalRecords":'.$pager->getNbResults().',
         "iTotalDisplayRecords":'.$pager->getNbResults().',
         "aaData":[';
        $first = 0;
        foreach ($pager->getResults() as $v)
        {
            if ($first++) $json .= ',';
            $json .= '["'.$v->getName().'"]';
        }
        $json .= ']}';
        return $this->renderText($json);
    }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new VehicleTypeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new VehicleTypeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $VehicleType = VehicleTypeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($VehicleType, sprintf('Object VehicleType does not exist (%s).', $request->getParameter('id')));
    $this->form = new VehicleTypeForm($VehicleType);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $VehicleType = VehicleTypeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($VehicleType, sprintf('Object VehicleType does not exist (%s).', $request->getParameter('id')));
    $this->form = new VehicleTypeForm($VehicleType);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $VehicleType = VehicleTypeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($VehicleType, sprintf('Object VehicleType does not exist (%s).', $request->getParameter('id')));
    $VehicleType->delete();

    $this->redirect('vehicleType/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $VehicleType = $form->save();

      $this->redirect('vehicleType/edit?id='.$VehicleType->getId());
    }
  }
}
