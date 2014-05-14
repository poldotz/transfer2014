<?php

/**
 * RateVersion filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseRateVersionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'                  => new sfWidgetFormFilterInput(),
      'day'                          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hour_from'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'hour_to'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'surcharge'                    => new sfWidgetFormFilterInput(),
      'per_person'                   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'note'                         => new sfWidgetFormFilterInput(),
      'created_at'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version_created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version_created_by'           => new sfWidgetFormFilterInput(),
      'customer_rate_table_ids'      => new sfWidgetFormFilterInput(),
      'customer_rate_table_versions' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                         => new sfValidatorPass(array('required' => false)),
      'description'                  => new sfValidatorPass(array('required' => false)),
      'day'                          => new sfValidatorPass(array('required' => false)),
      'hour_from'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hour_to'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'surcharge'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'per_person'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'note'                         => new sfValidatorPass(array('required' => false)),
      'created_at'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version_created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version_created_by'           => new sfValidatorPass(array('required' => false)),
      'customer_rate_table_ids'      => new sfValidatorPass(array('required' => false)),
      'customer_rate_table_versions' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rate_version_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RateVersion';
  }

  public function getFields()
  {
    return array(
      'id'                           => 'ForeignKey',
      'name'                         => 'Text',
      'description'                  => 'Text',
      'day'                          => 'Text',
      'hour_from'                    => 'Date',
      'hour_to'                      => 'Date',
      'surcharge'                    => 'Number',
      'per_person'                   => 'Boolean',
      'note'                         => 'Text',
      'created_at'                   => 'Date',
      'updated_at'                   => 'Date',
      'version'                      => 'Number',
      'version_created_at'           => 'Date',
      'version_created_by'           => 'Text',
      'customer_rate_table_ids'      => 'Text',
      'customer_rate_table_versions' => 'Text',
    );
  }
}
