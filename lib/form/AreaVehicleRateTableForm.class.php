<?php

/**
 * AreaVehicleRateTable form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class AreaVehicleRateTableForm extends BaseAreaVehicleRateTableForm
{
  public function configure()
  {
      $this->disableLocalCSRFProtection();
      $this->setWidget('customer_id',new sfWidgetFormInputHidden());
      $this->setWidget('area_id',new sfWidgetFormInputHidden());
      $this->setWidget('vehicle_type_id',new sfWidgetFormInputHidden());
      $this->setWidget('cost',new sfWidgetFormInputText());
  }
}
