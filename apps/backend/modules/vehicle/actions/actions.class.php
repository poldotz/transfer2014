<?php

/**
 * vehicle actions.
 *
 * @package    transfer
 * @subpackage vehicle
 * @author     Poldotz
 */
class vehicleActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Vehicles = VehicleQuery::create()->find();
  }

    public function executeGet_data(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');

        //start: sorting
        $type_colnames = array(VehiclePeer::MODEL);
        $iSortCol_0 = $request->getParameter('iSortCol_0');
        if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
        $c = new Criteria();
        $c->addJoin(VehiclePeer::VEHICLE_TYPE_ID,VehicleTypePeer::ID);
        if ($query = $request->getParameter('sSearch'))
        {
            $c->addOr(VehicleTypePeer::NAME,"%".$query."%",Criteria::LIKE);
            $c->addOr(VehiclePeer::MODEL,"%".$query."%",Criteria::LIKE);
            $c->addOr(VehiclePeer::PLATE_NUMBER,"%".$query."%",Criteria::LIKE);
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
        $pager = VehiclePeer::doSelectPager($page, $item_per_page, $c);
        //end: paging
        $json = '{"iTotalRecords":'.$pager->getNbResults().',
     "iTotalDisplayRecords":'.$pager->getNbResults().',
     "aaData":[';
        $first = 0;
        foreach ($pager->getResults() as $v)
        {
            if ($first++) $json .= ',';
            $json .= '["'.$v->getModel().'","'.$v->getVehicleType().'","'.$v->getPlateNumber().'","'.$v->getFrameNumber().'","'.$v->getMileage().'","'.$v->getNote().'","<input class=\'btn btn-info\' style=\'float:left; margin: 5px;\' value=\'Modifica\' type=\'button\' onclick=\"document.location.href=\'vehicle/edit/id/'.$v->getId().' \';\">"]';
        }
        $json .= ']}';
        return $this->renderText($json);
    }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new VehicleForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new VehicleForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Vehicle = VehicleQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Vehicle, sprintf('Object Vehicle does not exist (%s).', $request->getParameter('id')));
    $this->form = new VehicleForm($Vehicle);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Vehicle = VehicleQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Vehicle, sprintf('Object Vehicle does not exist (%s).', $request->getParameter('id')));
    $this->form = new VehicleForm($Vehicle);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Vehicle = VehicleQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Vehicle, sprintf('Object Vehicle does not exist (%s).', $request->getParameter('id')));
    $Vehicle->delete();

    $this->redirect('vehicle/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Vehicle = $form->save();

      $this->redirect('vehicle/edit?id='.$Vehicle->getId());
    }
  }
}
