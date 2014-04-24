<?php

/**
 * Company form base class.
 *
 * @method Company getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseCompanyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInputText(),
      'vat_number'        => new sfWidgetFormInputText(),
      'phone'             => new sfWidgetFormInputText(),
      'fax'               => new sfWidgetFormInputText(),
      'mobile'            => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'site'              => new sfWidgetFormInputText(),
      'formatted_address' => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'latitude'          => new sfWidgetFormInputText(),
      'longitude'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 100)),
      'vat_number'        => new sfValidatorString(array('max_length' => 20)),
      'phone'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'fax'               => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'mobile'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'site'              => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'formatted_address' => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'latitude'          => new sfValidatorNumber(array('required' => false)),
      'longitude'         => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('company[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Company';
  }


}
