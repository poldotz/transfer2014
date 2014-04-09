<?php

/**
 * Vehicle form base class.
 *
 * @method Vehicle getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseVehicleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'vehicle_type_id' => new sfWidgetFormPropelChoice(array('model' => 'VehicleType', 'add_empty' => false)),
      'model'           => new sfWidgetFormInputText(),
      'plate_number'    => new sfWidgetFormInputText(),
      'frame_number'    => new sfWidgetFormInputText(),
      'mileage'         => new sfWidgetFormInputText(),
      'note'            => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'vehicle_type_id' => new sfValidatorPropelChoice(array('model' => 'VehicleType', 'column' => 'id')),
      'model'           => new sfValidatorString(array('max_length' => 100)),
      'plate_number'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'frame_number'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mileage'         => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807, 'required' => false)),
      'note'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vehicle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vehicle';
  }


}
