<?php

/**
 * Vehicle form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class VehicleForm extends BaseVehicleForm
{
  public function configure()
  {
      $this->useFields(array('model','vehicle_type_id','plate_number','frame_number','mileage','note'));
      $this->widgetSchema->setLabels(array(
          'model'    => 'Modello',
          'vehicle_type_id'   => 'Categoria Mezzo',
          'plate_number' => 'Targa',
          'frame_number' => 'Telaio',
          'mileage' => 'KM',

      ));

  }
}
