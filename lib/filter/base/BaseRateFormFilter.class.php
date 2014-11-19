<?php

/**
 * Rate filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseRateFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'          => new sfWidgetFormFilterInput(),
      'day'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hour_from'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'hour_to'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'surcharge'            => new sfWidgetFormFilterInput(),
      'reduced_percentage'   => new sfWidgetFormFilterInput(),
      'note'                 => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version'              => new sfWidgetFormFilterInput(),
      'version_created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version_created_by'   => new sfWidgetFormFilterInput(),
      'rate_extra_rate_list' => new sfWidgetFormPropelChoice(array('model' => 'RateExtra', 'add_empty' => true)),
      'customer_rate_list'   => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                 => new sfValidatorPass(array('required' => false)),
      'description'          => new sfValidatorPass(array('required' => false)),
      'day'                  => new sfValidatorPass(array('required' => false)),
      'hour_from'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hour_to'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'surcharge'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reduced_percentage'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'note'                 => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'version_created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version_created_by'   => new sfValidatorPass(array('required' => false)),
      'rate_extra_rate_list' => new sfValidatorPropelChoice(array('model' => 'RateExtra', 'required' => false)),
      'customer_rate_list'   => new sfValidatorPropelChoice(array('model' => 'Customer', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rate_filters[%s]');

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

    $criteria->addJoin(RatePeer::ID, RateExtraRatePeer::RATE_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(RateExtraRatePeer::RATE_EXTRA_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(RateExtraRatePeer::RATE_EXTRA_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addCustomerRateListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(RatePeer::ID, CustomerRatePeer::RATE_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CustomerRatePeer::CUSTOMER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CustomerRatePeer::CUSTOMER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Rate';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'name'                 => 'Text',
      'description'          => 'Text',
      'day'                  => 'Text',
      'hour_from'            => 'Date',
      'hour_to'              => 'Date',
      'surcharge'            => 'Number',
      'reduced_percentage'   => 'Number',
      'note'                 => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'version'              => 'Number',
      'version_created_at'   => 'Date',
      'version_created_by'   => 'Text',
      'rate_extra_rate_list' => 'ManyKey',
      'customer_rate_list'   => 'ManyKey',
    );
  }
}
