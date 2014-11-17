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
      $this->useFields(array('name','per_person'));

      $this->widgetSchema->setLabels(array(
          'name'    => 'Nome',
          'per_person' => 'A persona'
      ));

  }
}
