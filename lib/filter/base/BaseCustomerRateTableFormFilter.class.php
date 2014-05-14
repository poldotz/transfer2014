<?php

/**
 * CustomerRateTable filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseCustomerRateTableFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'customer_id'        => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => true)),
      'rate_id'            => new sfWidgetFormPropelChoice(array('model' => 'Rate', 'add_empty' => true)),
      'vehicle_type_id'    => new sfWidgetFormPropelChoice(array('model' => 'VehicleType', 'add_empty' => true)),
      'cost'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version'            => new sfWidgetFormFilterInput(),
      'version_created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version_created_by' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'customer_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Customer', 'column' => 'id')),
      'rate_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Rate', 'column' => 'id')),
      'vehicle_type_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'VehicleType', 'column' => 'id')),
      'cost'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'version_created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version_created_by' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('customer_rate_table_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerRateTable';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'customer_id'        => 'ForeignKey',
      'rate_id'            => 'ForeignKey',
      'vehicle_type_id'    => 'ForeignKey',
      'cost'               => 'Number',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'version'            => 'Number',
      'version_created_at' => 'Date',
      'version_created_by' => 'Text',
    );
  }
}
