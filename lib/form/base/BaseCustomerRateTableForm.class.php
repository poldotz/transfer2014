<?php

/**
 * CustomerRateTable form base class.
 *
 * @method CustomerRateTable getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseCustomerRateTableForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'customer_id'        => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => false)),
      'rate_id'            => new sfWidgetFormPropelChoice(array('model' => 'Rate', 'add_empty' => false)),
      'vehicle_type_id'    => new sfWidgetFormPropelChoice(array('model' => 'VehicleType', 'add_empty' => false)),
      'cost'               => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'version'            => new sfWidgetFormInputText(),
      'version_created_at' => new sfWidgetFormDateTime(),
      'version_created_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'customer_id'        => new sfValidatorPropelChoice(array('model' => 'Customer', 'column' => 'id')),
      'rate_id'            => new sfValidatorPropelChoice(array('model' => 'Rate', 'column' => 'id')),
      'vehicle_type_id'    => new sfValidatorPropelChoice(array('model' => 'VehicleType', 'column' => 'id')),
      'cost'               => new sfValidatorNumber(),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'version'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'version_created_at' => new sfValidatorDateTime(array('required' => false)),
      'version_created_by' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'CustomerRateTable', 'column' => array('customer_id', 'rate_id', 'vehicle_type_id')))
    );

    $this->widgetSchema->setNameFormat('customer_rate_table[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerRateTable';
  }


}
