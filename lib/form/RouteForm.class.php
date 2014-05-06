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
      $this->disableLocalCSRFProtection();
      $this->setWidget('locality_from', new sfWidgetFormInputHidden());
      $this->setValidator('locality_from',new sfValidatorInteger());

      $this->setWidget('locality_to', new sfWidgetFormInputHidden());
      $this->setValidator('locality_to',new sfValidatorInteger());

  }
}
