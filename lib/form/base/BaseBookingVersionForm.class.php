<?php

/**
 * BookingVersion form base class.
 *
 * @method BookingVersion getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseBookingVersionForm extends BaseFormPropel
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
      'customer_id'        => new sfWidgetFormInputText(),
      'vehicle_type_id'    => new sfWidgetFormInputText(),
      'is_confirmed'       => new sfWidgetFormInputCheckbox(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'version'            => new sfWidgetFormInputHidden(),
      'version_created_at' => new sfWidgetFormDateTime(),
      'version_created_by' => new sfWidgetFormInputText(),
      'arrival_ids'        => new sfWidgetFormInputText(),
      'arrival_versions'   => new sfWidgetFormInputText(),
      'departure_ids'      => new sfWidgetFormInputText(),
      'departure_versions' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Booking', 'column' => 'id', 'required' => false)),
      'booking_date'       => new sfValidatorDateTime(),
      'year'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'number'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'adult'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'reduced'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'child'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'contact'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'rif_file'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'customer_id'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'vehicle_type_id'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'is_confirmed'       => new sfValidatorBoolean(),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'version'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getVersion()), 'empty_value' => $this->getObject()->getVersion(), 'required' => false)),
      'version_created_at' => new sfValidatorDateTime(array('required' => false)),
      'version_created_by' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'arrival_ids'        => new sfValidatorPass(array('required' => false)),
      'arrival_versions'   => new sfValidatorPass(array('required' => false)),
      'departure_ids'      => new sfValidatorPass(array('required' => false)),
      'departure_versions' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('booking_version[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BookingVersion';
  }


}
