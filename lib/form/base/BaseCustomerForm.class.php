<?php

/**
 * customer form base class.
 *
 * @method customer getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BasecustomerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'user_id'           => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'customer_type_id'  => new sfWidgetFormPropelChoice(array('model' => 'CustomerType', 'add_empty' => true)),
      'name'              => new sfWidgetFormInputText(),
      'vat_number'        => new sfWidgetFormInputText(),
      'tax_code'          => new sfWidgetFormInputText(),
      'phone'             => new sfWidgetFormInputText(),
      'fax'               => new sfWidgetFormInputText(),
      'mobile'            => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'site'              => new sfWidgetFormInputText(),
      'formatted_address' => new sfWidgetFormInputText(),
      'lat'               => new sfWidgetFormInputText(),
      'lon'               => new sfWidgetFormInputText(),
      'iban'              => new sfWidgetFormInputText(),
      'bic'               => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'           => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'customer_type_id'  => new sfValidatorPropelChoice(array('model' => 'CustomerType', 'column' => 'id', 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 100)),
      'vat_number'        => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'tax_code'          => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'phone'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'fax'               => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'mobile'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'site'              => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'formatted_address' => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'lat'               => new sfValidatorNumber(array('required' => false)),
      'lon'               => new sfValidatorNumber(array('required' => false)),
      'iban'              => new sfValidatorString(array('max_length' => 27, 'required' => false)),
      'bic'               => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('customer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'customer';
  }


}
