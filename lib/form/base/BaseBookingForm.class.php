<?php

/**
 * Booking form base class.
 *
 * @method Booking getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseBookingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'booking_date'       => new sfWidgetFormDateTime(),
      'year'               => new sfWidgetFormInputText(),
      'number'             => new sfWidgetFormInputText(),
      'adult'              => new sfWidgetFormInputText(),
      'reduced'            => new sfWidgetFormInputText(),
      'child'              => new sfWidgetFormInputText(),
      'contact'            => new sfWidgetFormInputText(),
      'rif_file'           => new sfWidgetFormInputText(),
      'customer_id'        => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => false)),
      'vehicle_type_id'    => new sfWidgetFormPropelChoice(array('model' => 'VehicleType', 'add_empty' => false)),
      'is_confirmed'       => new sfWidgetFormInputCheckbox(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'version'            => new sfWidgetFormInputText(),
      'version_created_at' => new sfWidgetFormDateTime(),
      'version_created_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'booking_date'       => new sfValidatorDateTime(),
      'year'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'number'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'adult'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'reduced'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'child'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'contact'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'rif_file'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'customer_id'        => new sfValidatorPropelChoice(array('model' => 'Customer', 'column' => 'id')),
      'vehicle_type_id'    => new sfValidatorPropelChoice(array('model' => 'VehicleType', 'column' => 'id')),
      'is_confirmed'       => new sfValidatorBoolean(),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'version'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'version_created_at' => new sfValidatorDateTime(array('required' => false)),
      'version_created_by' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Booking', 'column' => array('year', 'number')))
    );

    $this->widgetSchema->setNameFormat('booking[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Booking';
  }


}
