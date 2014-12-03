<?php

/**
 * RateExtra filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseRateExtraFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'value'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'typology'             => new sfWidgetFormChoice(array('choices' => array(''=>'all',0=>'percentage',1=>'additional',))),
      'rate_extra_rate_list' => new sfWidgetFormPropelChoice(array('model' => 'Rate', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                 => new sfValidatorPass(array('required' => false)),
      'value'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'typology'             => new sfValidatorChoice(array('required' => false, 'choices' => array(0=>0,1=>1,))),
      'rate_extra_rate_list' => new sfValidatorPropelChoice(array('model' => 'Rate', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rate_extra_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addRateExtraRateListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(RateExtraPeer::ID, RateExtraRatePeer::RATE_EXTRA_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(RateExtraRatePeer::RATE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(RateExtraRatePeer::RATE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'RateExtra';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'name'                 => 'Text',
      'value'                => 'Number',
      'typology'             => 'Text',
      'rate_extra_rate_list' => 'ManyKey',
    );
  }
}
