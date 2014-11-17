<?php

/**
 * RateExtraRate form base class.
 *
 * @method RateExtraRate getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseRateExtraRateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'rate_id'       => new sfWidgetFormInputHidden(),
      'rate_extra_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'rate_id'       => new sfValidatorPropelChoice(array('model' => 'Rate', 'column' => 'id', 'required' => false)),
      'rate_extra_id' => new sfValidatorPropelChoice(array('model' => 'RateExtra', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rate_extra_rate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RateExtraRate';
  }


}
