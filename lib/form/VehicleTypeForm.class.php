<?php

/**
 * VehicleType form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class VehicleTypeForm extends BaseVehicleTypeForm
{
  public function configure()
  {
      $this->useFields(array('name'));

  }
}
