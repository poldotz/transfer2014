<?php

/**
 * ArrivalArchive form base class.
 *
 * @method ArrivalArchive getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseArrivalArchiveForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'booking_id'        => new sfWidgetFormInputText(),
      'day'               => new sfWidgetFormDate(),
      'hour'              => new sfWidgetFormTime(),
      'flight'            => new sfWidgetFormInputText(),
      'cost'              => new sfWidgetFormInputText(),
      'note'              => new sfWidgetFormInputText(),
      'payment_method_id' => new sfWidgetFormInputText(),
      'locality_from'     => new sfWidgetFormInputText(),
      'locality_to'       => new sfWidgetFormInputText(),
      'driver_id'         => new sfWidgetFormInputText(),
      'vehicle_id'        => new sfWidgetFormInputText(),
      'cancelled'         => new sfWidgetFormInputCheckbox(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'archived_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'booking_id'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'day'               => new sfValidatorDate(array('required' => false)),
      'hour'              => new sfValidatorTime(array('required' => false)),
      'flight'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'cost'              => new sfValidatorNumber(array('required' => false)),
      'note'              => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'payment_method_id' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'locality_from'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'locality_to'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'driver_id'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'vehicle_id'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cancelled'         => new sfValidatorBoolean(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'archived_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('arrival_archive[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArrivalArchive';
  }


}
