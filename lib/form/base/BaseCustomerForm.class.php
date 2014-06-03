<?php

/**
 * Customer form base class.
 *
 * @method Customer getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseCustomerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'is_active'         => new sfWidgetFormInputCheckbox(),
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
      'iban'              => new sfWidgetFormInputText(),
      'bic'               => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'latitude'          => new sfWidgetFormInputText(),
      'longitude'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'is_active'         => new sfValidatorBoolean(),
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
      'iban'              => new sfValidatorString(array('max_length' => 27, 'required' => false)),
      'bic'               => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'latitude'          => new sfValidatorNumber(array('required' => false)),
      'longitude'         => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('customer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Customer';
  }


}
