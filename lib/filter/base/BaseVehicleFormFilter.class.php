<?php

/**
 * Vehicle filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseVehicleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'vehicle_type_id' => new sfWidgetFormPropelChoice(array('model' => 'VehicleType', 'add_empty' => true)),
      'model'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'plate_number'    => new sfWidgetFormFilterInput(),
      'frame_number'    => new sfWidgetFormFilterInput(),
      'mileage'         => new sfWidgetFormFilterInput(),
      'note'            => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'vehicle_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'VehicleType', 'column' => 'id')),
      'model'           => new sfValidatorPass(array('required' => false)),
      'plate_number'    => new sfValidatorPass(array('required' => false)),
      'frame_number'    => new sfValidatorPass(array('required' => false)),
      'mileage'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'note'            => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('vehicle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vehicle';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'vehicle_type_id' => 'ForeignKey',
      'model'           => 'Text',
      'plate_number'    => 'Text',
      'frame_number'    => 'Text',
      'mileage'         => 'Number',
      'note'            => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
