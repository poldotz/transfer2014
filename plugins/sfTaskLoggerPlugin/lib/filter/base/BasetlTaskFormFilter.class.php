<?php

/**
 * tlTask filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasetlTaskFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'task'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'arguments'           => new sfWidgetFormFilterInput(),
      'options'             => new sfWidgetFormFilterInput(),
      'count_processed'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'count_not_processed' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_running'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'last_id_processed'   => new sfWidgetFormFilterInput(),
      'started_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'ended_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'is_ok'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'error_code'          => new sfWidgetFormFilterInput(),
      'log'                 => new sfWidgetFormFilterInput(),
      'log_file'            => new sfWidgetFormFilterInput(),
      'comments'            => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'task'                => new sfValidatorPass(array('required' => false)),
      'arguments'           => new sfValidatorPass(array('required' => false)),
      'options'             => new sfValidatorPass(array('required' => false)),
      'count_processed'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'count_not_processed' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_running'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'last_id_processed'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'started_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'ended_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'is_ok'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'error_code'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'log'                 => new sfValidatorPass(array('required' => false)),
      'log_file'            => new sfValidatorPass(array('required' => false)),
      'comments'            => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('tl_task_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'tlTask';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'task'                => 'Text',
      'arguments'           => 'Text',
      'options'             => 'Text',
      'count_processed'     => 'Number',
      'count_not_processed' => 'Number',
      'is_running'          => 'Boolean',
      'last_id_processed'   => 'Number',
      'started_at'          => 'Date',
      'ended_at'            => 'Date',
      'is_ok'               => 'Boolean',
      'error_code'          => 'Number',
      'log'                 => 'Text',
      'log_file'            => 'Text',
      'comments'            => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
