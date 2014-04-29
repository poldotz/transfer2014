<?php

/**
 * Airport filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseAirportFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lat'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lng'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timezone'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'code'       => new sfValidatorPass(array('required' => false)),
      'name'       => new sfValidatorPass(array('required' => false)),
      'city'       => new sfValidatorPass(array('required' => false)),
      'country'    => new sfValidatorPass(array('required' => false)),
      'lat'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lng'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'timezone'   => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('airport_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Airport';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'code'       => 'Text',
      'name'       => 'Text',
      'city'       => 'Text',
      'country'    => 'Text',
      'lat'        => 'Number',
      'lng'        => 'Number',
      'timezone'   => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
