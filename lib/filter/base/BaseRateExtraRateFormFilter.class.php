<?php

/**
 * RateExtraRate filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseRateExtraRateFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('rate_extra_rate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RateExtraRate';
  }

  public function getFields()
  {
    return array(
      'rate_id'       => 'ForeignKey',
      'rate_extra_id' => 'ForeignKey',
    );
  }
}
