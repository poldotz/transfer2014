<?php

/**
 * CustomerRateExtra form base class.
 *
 * @method CustomerRateExtra getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseCustomerRateExtraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'customer_id'   => new sfWidgetFormInputHidden(),
      'rate_extra_id' => new sfWidgetFormInputHidden(),
      'value'         => new sfWidgetFormInputText(),
      'typology'      => new sfWidgetFormChoice(array('choices' => array (  '' => '',  'percentuale' => 'percentuale',  'addizionale' => 'addizionale',))),
    ));

    $this->setValidators(array(
      'customer_id'   => new sfValidatorPropelChoice(array('model' => 'Customer', 'column' => 'id', 'required' => false)),
      'rate_extra_id' => new sfValidatorPropelChoice(array('model' => 'RateExtra', 'column' => 'id', 'required' => false)),
      'value'         => new sfValidatorNumber(),
      'typology'      => new sfValidatorChoice(array('choices' => array (  0 => 'percentuale',  1 => 'addizionale',), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('customer_rate_extra[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerRateExtra';
  }


}
