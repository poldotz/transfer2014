<?php

/**
 * BookingArchive filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseBookingArchiveFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'booking_date'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'year'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'number'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'adult'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'child'           => new sfWidgetFormFilterInput(),
      'contact'         => new sfWidgetFormFilterInput(),
      'rif_file'        => new sfWidgetFormFilterInput(),
      'customer_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vehicle_type_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_confirmed'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'archived_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'booking_date'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'year'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'number'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'adult'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'child'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'contact'         => new sfValidatorPass(array('required' => false)),
      'rif_file'        => new sfValidatorPass(array('required' => false)),
      'customer_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vehicle_type_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_confirmed'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'archived_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('booking_archive_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BookingArchive';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'booking_date'    => 'Date',
      'year'            => 'Number',
      'number'          => 'Number',
      'adult'           => 'Number',
      'child'           => 'Number',
      'contact'         => 'Text',
      'rif_file'        => 'Text',
      'customer_id'     => 'Number',
      'vehicle_type_id' => 'Number',
      'is_confirmed'    => 'Boolean',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'archived_at'     => 'Date',
    );
  }
}
