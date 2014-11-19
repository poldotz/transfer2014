<?php

/**
 * AreaVehicleRateTable filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseAreaVehicleRateTableFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cost'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cost'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('area_vehicle_rate_table_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AreaVehicleRateTable';
  }

  public function getFields()
  {
    return array(
      'area_id'         => 'ForeignKey',
      'vehicle_type_id' => 'ForeignKey',
      'customer_id'     => 'ForeignKey',
      'cost'            => 'Number',
    );
  }
}
