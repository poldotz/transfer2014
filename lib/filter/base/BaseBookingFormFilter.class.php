<?php

/**
 * Booking filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseBookingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'booking_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'year'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'number'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'adult'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reduced'            => new sfWidgetFormFilterInput(),
      'child'              => new sfWidgetFormFilterInput(),
      'contact'            => new sfWidgetFormFilterInput(),
      'rif_file'           => new sfWidgetFormFilterInput(),
      'customer_id'        => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => true)),
      'vehicle_type_id'    => new sfWidgetFormPropelChoice(array('model' => 'VehicleType', 'add_empty' => true)),
      'is_confirmed'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version'            => new sfWidgetFormFilterInput(),
      'version_created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version_created_by' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'booking_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'year'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'number'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'adult'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reduced'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'child'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'contact'            => new sfValidatorPass(array('required' => false)),
      'rif_file'           => new sfValidatorPass(array('required' => false)),
      'customer_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Customer', 'column' => 'id')),
      'vehicle_type_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'VehicleType', 'column' => 'id')),
      'is_confirmed'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'version_created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version_created_by' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('booking_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Booking';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'booking_date'       => 'Date',
      'year'               => 'Number',
      'number'             => 'Number',
      'adult'              => 'Number',
      'reduced'            => 'Number',
      'child'              => 'Number',
      'contact'            => 'Text',
      'rif_file'           => 'Text',
      'customer_id'        => 'ForeignKey',
      'vehicle_type_id'    => 'ForeignKey',
      'is_confirmed'       => 'Boolean',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'version'            => 'Number',
      'version_created_at' => 'Date',
      'version_created_by' => 'Text',
    );
  }
}
