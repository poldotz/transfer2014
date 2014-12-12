<?php

/**
 * AreaVehicleRateTable form base class.
 *
 * @method AreaVehicleRateTable getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseAreaVehicleRateTableForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'area_id'         => new sfWidgetFormInputHidden(),
      'vehicle_type_id' => new sfWidgetFormInputHidden(),
      'customer_id'     => new sfWidgetFormInputHidden(),
      'cost'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'area_id'         => new sfValidatorPropelChoice(array('model' => 'Area', 'column' => 'id', 'required' => false)),
      'vehicle_type_id' => new sfValidatorPropelChoice(array('model' => 'VehicleType', 'column' => 'id', 'required' => false)),
      'customer_id'     => new sfValidatorPropelChoice(array('model' => 'Customer', 'column' => 'id', 'required' => false)),
      'cost'            => new sfValidatorNumber(),
    ));

    $this->widgetSchema->setNameFormat('area_vehicle_rate_table[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AreaVehicleRateTable';
  }


}
