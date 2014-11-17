<?php

/**
 * Locality filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseLocalityFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'           => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'is_vector'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_active'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'             => new sfWidgetFormFilterInput(),
      'fax'               => new sfWidgetFormFilterInput(),
      'mobile'            => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'site'              => new sfWidgetFormFilterInput(),
      'formatted_address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'latitude'          => new sfWidgetFormFilterInput(),
      'longitude'         => new sfWidgetFormFilterInput(),
      'area_id'           => new sfWidgetFormPropelChoice(array('model' => 'Area', 'add_empty' => true)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'user_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'is_vector'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_active'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'name'              => new sfValidatorPass(array('required' => false)),
      'phone'             => new sfValidatorPass(array('required' => false)),
      'fax'               => new sfValidatorPass(array('required' => false)),
      'mobile'            => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'site'              => new sfValidatorPass(array('required' => false)),
      'formatted_address' => new sfValidatorPass(array('required' => false)),
      'latitude'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'area_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Area', 'column' => 'id')),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('locality_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Locality';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'user_id'           => 'ForeignKey',
      'is_vector'         => 'Boolean',
      'is_active'         => 'Boolean',
      'name'              => 'Text',
      'phone'             => 'Text',
      'fax'               => 'Text',
      'mobile'            => 'Text',
      'email'             => 'Text',
      'site'              => 'Text',
      'formatted_address' => 'Text',
      'latitude'          => 'Number',
      'longitude'         => 'Number',
      'area_id'           => 'ForeignKey',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
