<?php

/**
 * CustomerRateTableVersion form base class.
 *
 * @method CustomerRateTableVersion getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseCustomerRateTableVersionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'customer_id'        => new sfWidgetFormInputText(),
      'rate_id'            => new sfWidgetFormInputText(),
      'vehicle_type_id'    => new sfWidgetFormInputText(),
      'cost'               => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'version'            => new sfWidgetFormInputHidden(),
      'version_created_at' => new sfWidgetFormDateTime(),
      'version_created_by' => new sfWidgetFormInputText(),
      'rate_id_version'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'CustomerRateTable', 'column' => 'id', 'required' => false)),
      'customer_id'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'rate_id'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'vehicle_type_id'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'cost'               => new sfValidatorNumber(),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'version'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getVersion()), 'empty_value' => $this->getObject()->getVersion(), 'required' => false)),
      'version_created_at' => new sfValidatorDateTime(array('required' => false)),
      'version_created_by' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'rate_id_version'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('customer_rate_table_version[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerRateTableVersion';
  }


}
