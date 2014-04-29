<?php

/**
 * BookingArchive form base class.
 *
 * @method BookingArchive getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseBookingArchiveForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'booking_date'    => new sfWidgetFormDateTime(),
      'year'            => new sfWidgetFormInputText(),
      'number'          => new sfWidgetFormInputText(),
      'adult'           => new sfWidgetFormInputText(),
      'child'           => new sfWidgetFormInputText(),
      'contact'         => new sfWidgetFormInputText(),
      'rif_file'        => new sfWidgetFormInputText(),
      'customer_id'     => new sfWidgetFormInputText(),
      'vehicle_type_id' => new sfWidgetFormInputText(),
      'is_confirmed'    => new sfWidgetFormInputCheckbox(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'archived_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'booking_date'    => new sfValidatorDateTime(),
      'year'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'number'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'adult'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'child'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'contact'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'rif_file'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'customer_id'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'vehicle_type_id' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'is_confirmed'    => new sfValidatorBoolean(),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
      'archived_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('booking_archive[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BookingArchive';
  }


}
