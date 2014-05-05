<?php

/**
 * Route filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseRouteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'locality_from' => new sfWidgetFormPropelChoice(array('model' => 'Locality', 'add_empty' => true)),
      'locality_to'   => new sfWidgetFormPropelChoice(array('model' => 'Locality', 'add_empty' => true)),
      'duration'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'distance'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'locality_from' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Locality', 'column' => 'id')),
      'locality_to'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Locality', 'column' => 'id')),
      'duration'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'distance'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('route_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Route';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'locality_from' => 'ForeignKey',
      'locality_to'   => 'ForeignKey',
      'duration'      => 'Date',
      'distance'      => 'Number',
    );
  }
}
