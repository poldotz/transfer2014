<?php

/**
 * CustomerRateTableVersion filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseCustomerRateTableVersionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'customer_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rate_id'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vehicle_type_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cost'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version_created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version_created_by' => new sfWidgetFormFilterInput(),
      'rate_id_version'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'customer_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rate_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vehicle_type_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cost'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version_created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version_created_by' => new sfValidatorPass(array('required' => false)),
      'rate_id_version'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('customer_rate_table_version_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerRateTableVersion';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'ForeignKey',
      'customer_id'        => 'Number',
      'rate_id'            => 'Number',
      'vehicle_type_id'    => 'Number',
      'cost'               => 'Number',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'version'            => 'Number',
      'version_created_at' => 'Date',
      'version_created_by' => 'Text',
      'rate_id_version'    => 'Number',
    );
  }
}
