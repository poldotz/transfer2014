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
