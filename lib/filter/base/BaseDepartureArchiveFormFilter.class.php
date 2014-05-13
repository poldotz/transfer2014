<?php

/**
 * DepartureArchive filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseDepartureArchiveFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'booking_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'day'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hour'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'pick_up'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'departure_time'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'flight'            => new sfWidgetFormFilterInput(),
      'rate_cost'         => new sfWidgetFormFilterInput(),
      'calculated_cost'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rate_name'         => new sfWidgetFormFilterInput(),
      'note'              => new sfWidgetFormFilterInput(),
      'payment_method_id' => new sfWidgetFormFilterInput(),
      'locality_from'     => new sfWidgetFormFilterInput(),
      'locality_to'       => new sfWidgetFormFilterInput(),
      'driver_id'         => new sfWidgetFormFilterInput(),
      'vehicle_id'        => new sfWidgetFormFilterInput(),
      'cancelled'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'archived_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'booking_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'day'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hour'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'pick_up'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'departure_time'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'flight'            => new sfValidatorPass(array('required' => false)),
      'rate_cost'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'calculated_cost'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'rate_name'         => new sfValidatorPass(array('required' => false)),
      'note'              => new sfValidatorPass(array('required' => false)),
      'payment_method_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'locality_from'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'locality_to'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'driver_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vehicle_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cancelled'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'archived_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('departure_archive_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DepartureArchive';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'booking_id'        => 'Number',
      'day'               => 'Date',
      'hour'              => 'Date',
      'pick_up'           => 'Boolean',
      'departure_time'    => 'Date',
      'flight'            => 'Text',
      'rate_cost'         => 'Number',
      'calculated_cost'   => 'Number',
      'rate_name'         => 'Text',
      'note'              => 'Text',
      'payment_method_id' => 'Number',
      'locality_from'     => 'Number',
      'locality_to'       => 'Number',
      'driver_id'         => 'Number',
      'vehicle_id'        => 'Number',
      'cancelled'         => 'Boolean',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'archived_at'       => 'Date',
    );
  }
}
