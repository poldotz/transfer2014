<?php

/**
 * Arrival form base class.
 *
 * @method Arrival getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseArrivalForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'booking_id'         => new sfWidgetFormPropelChoice(array('model' => 'Booking', 'add_empty' => true)),
      'day'                => new sfWidgetFormDate(),
      'hour'               => new sfWidgetFormTime(),
      'flight'             => new sfWidgetFormInputText(),
      'cost'               => new sfWidgetFormInputText(),
      'note'               => new sfWidgetFormInputText(),
      'payment_method_id'  => new sfWidgetFormPropelChoice(array('model' => 'PaymentMethod', 'add_empty' => true)),
      'locality_from'      => new sfWidgetFormPropelChoice(array('model' => 'Locality', 'add_empty' => true)),
      'locality_to'        => new sfWidgetFormPropelChoice(array('model' => 'Locality', 'add_empty' => true)),
      'driver_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'vehicle_id'         => new sfWidgetFormPropelChoice(array('model' => 'Vehicle', 'add_empty' => true)),
      'cancelled'          => new sfWidgetFormInputCheckbox(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'version'            => new sfWidgetFormInputText(),
      'version_created_at' => new sfWidgetFormDateTime(),
      'version_created_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'booking_id'         => new sfValidatorPropelChoice(array('model' => 'Booking', 'column' => 'id', 'required' => false)),
      'day'                => new sfValidatorDate(array('required' => false)),
      'hour'               => new sfValidatorTime(array('required' => false)),
      'flight'             => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'cost'               => new sfValidatorNumber(array('required' => false)),
      'note'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'payment_method_id'  => new sfValidatorPropelChoice(array('model' => 'PaymentMethod', 'column' => 'id', 'required' => false)),
      'locality_from'      => new sfValidatorPropelChoice(array('model' => 'Locality', 'column' => 'id', 'required' => false)),
      'locality_to'        => new sfValidatorPropelChoice(array('model' => 'Locality', 'column' => 'id', 'required' => false)),
      'driver_id'          => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'vehicle_id'         => new sfValidatorPropelChoice(array('model' => 'Vehicle', 'column' => 'id', 'required' => false)),
      'cancelled'          => new sfValidatorBoolean(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'version'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'version_created_at' => new sfValidatorDateTime(array('required' => false)),
      'version_created_by' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Arrival', 'column' => array('booking_id')))
    );

    $this->widgetSchema->setNameFormat('arrival[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Arrival';
  }


}
