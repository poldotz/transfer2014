<?php

/**
 * CustomerType form base class.
 *
 * @method CustomerType getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseCustomerTypeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'description' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('customer_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerType';
  }


}
