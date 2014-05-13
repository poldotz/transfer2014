<?php

/**
 * Departure filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseDepartureFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'booking_id'         => new sfWidgetFormPropelChoice(array('model' => 'Booking', 'add_empty' => true)),
      'day'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hour'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'pick_up'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'departure_time'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'flight'             => new sfWidgetFormFilterInput(),
      'rate_cost'          => new sfWidgetFormFilterInput(),
      'calculated_cost'    => new sfWidgetFormFilterInput(),
      'rate_name'          => new sfWidgetFormFilterInput(),
      'note'               => new sfWidgetFormFilterInput(),
      'payment_method_id'  => new sfWidgetFormPropelChoice(array('model' => 'PaymentMethod', 'add_empty' => true)),
      'locality_from'      => new sfWidgetFormPropelChoice(array('model' => 'Locality', 'add_empty' => true)),
      'locality_to'        => new sfWidgetFormPropelChoice(array('model' => 'Locality', 'add_empty' => true)),
      'driver_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'vehicle_id'         => new sfWidgetFormPropelChoice(array('model' => 'Vehicle', 'add_empty' => true)),
      'cancelled'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version'            => new sfWidgetFormFilterInput(),
      'version_created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'version_created_by' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'booking_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Booking', 'column' => 'id')),
      'day'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hour'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'pick_up'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'departure_time'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'flight'             => new sfValidatorPass(array('required' => false)),
      'rate_cost'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'calculated_cost'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'rate_name'          => new sfValidatorPass(array('required' => false)),
      'note'               => new sfValidatorPass(array('required' => false)),
      'payment_method_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PaymentMethod', 'column' => 'id')),
      'locality_from'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Locality', 'column' => 'id')),
      'locality_to'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Locality', 'column' => 'id')),
      'driver_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'vehicle_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Vehicle', 'column' => 'id')),
      'cancelled'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'version_created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'version_created_by' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('departure_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Departure';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'booking_id'         => 'ForeignKey',
      'day'                => 'Date',
      'hour'               => 'Date',
      'pick_up'            => 'Boolean',
      'departure_time'     => 'Date',
      'flight'             => 'Text',
      'rate_cost'          => 'Number',
      'calculated_cost'    => 'Number',
      'rate_name'          => 'Text',
      'note'               => 'Text',
      'payment_method_id'  => 'ForeignKey',
      'locality_from'      => 'ForeignKey',
      'locality_to'        => 'ForeignKey',
      'driver_id'          => 'ForeignKey',
      'vehicle_id'         => 'ForeignKey',
      'cancelled'          => 'Boolean',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'version'            => 'Number',
      'version_created_at' => 'Date',
      'version_created_by' => 'Text',
    );
  }
}
