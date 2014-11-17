<?php

/**
 * tlTask form base class.
 *
 * @method tlTask getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasetlTaskForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'task'                => new sfWidgetFormInputText(),
      'arguments'           => new sfWidgetFormInputText(),
      'options'             => new sfWidgetFormInputText(),
      'count_processed'     => new sfWidgetFormInputText(),
      'count_not_processed' => new sfWidgetFormInputText(),
      'is_running'          => new sfWidgetFormInputCheckbox(),
      'last_id_processed'   => new sfWidgetFormInputText(),
      'started_at'          => new sfWidgetFormDateTime(),
      'ended_at'            => new sfWidgetFormDateTime(),
      'is_ok'               => new sfWidgetFormInputCheckbox(),
      'error_code'          => new sfWidgetFormInputText(),
      'log'                 => new sfWidgetFormTextarea(),
      'log_file'            => new sfWidgetFormInputText(),
      'comments'            => new sfWidgetFormTextarea(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'task'                => new sfValidatorString(array('max_length' => 255)),
      'arguments'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'options'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'count_processed'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'count_not_processed' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'is_running'          => new sfValidatorBoolean(),
      'last_id_processed'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'started_at'          => new sfValidatorDateTime(array('required' => false)),
      'ended_at'            => new sfValidatorDateTime(array('required' => false)),
      'is_ok'               => new sfValidatorBoolean(),
      'error_code'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'log'                 => new sfValidatorString(array('required' => false)),
      'log_file'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'comments'            => new sfValidatorString(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'updated_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tl_task[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'tlTask';
  }


}
