<?php

/**
 * Area filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseAreaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'is_active'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'latitude'       => new sfWidgetFormFilterInput(),
      'longitude'      => new sfWidgetFormFilterInput(),
      'viewport_sw_lt' => new sfWidgetFormFilterInput(),
      'viewport_sw_ln' => new sfWidgetFormFilterInput(),
      'viewport_ne_lt' => new sfWidgetFormFilterInput(),
      'viewport_ne_ln' => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'is_active'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'name'           => new sfValidatorPass(array('required' => false)),
      'latitude'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'viewport_sw_lt' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'viewport_sw_ln' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'viewport_ne_lt' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'viewport_ne_ln' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('area_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Area';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'is_active'      => 'Boolean',
      'name'           => 'Text',
      'latitude'       => 'Number',
      'longitude'      => 'Number',
      'viewport_sw_lt' => 'Number',
      'viewport_sw_ln' => 'Number',
      'viewport_ne_lt' => 'Number',
      'viewport_ne_ln' => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
