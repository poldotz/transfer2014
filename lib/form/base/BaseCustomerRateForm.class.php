<?php

/**
 * CustomerRate form base class.
 *
 * @method CustomerRate getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseCustomerRateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'customer_id' => new sfWidgetFormInputHidden(),
      'rate_id'     => new sfWidgetFormInputHidden(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'customer_id' => new sfValidatorPropelChoice(array('model' => 'Customer', 'column' => 'id', 'required' => false)),
      'rate_id'     => new sfValidatorPropelChoice(array('model' => 'Rate', 'column' => 'id', 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('customer_rate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerRate';
  }


}
