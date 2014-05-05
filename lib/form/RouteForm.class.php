<?php

/**
 * Route form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class RouteForm extends BaseRouteForm
{
  public function configure()
  {
      $this->setWidget('locality_from', new sfWidgetFormInputHidden());
      $this->setWidget('locality_to', new sfWidgetFormInputHidden());

  }
}
