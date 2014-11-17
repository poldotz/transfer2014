<?php

/**
 * RateVersion form base class.
 *
 * @method RateVersion getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseRateVersionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'name'               => new sfWidgetFormInputText(),
      'description'        => new sfWidgetFormInputText(),
      'day'                => new sfWidgetFormInputText(),
      'hour_from'          => new sfWidgetFormTime(),
      'hour_to'            => new sfWidgetFormTime(),
      'surcharge'          => new sfWidgetFormInputText(),
      'reduced_percentage' => new sfWidgetFormInputText(),
      'note'               => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'version'            => new sfWidgetFormInputHidden(),
      'version_created_at' => new sfWidgetFormDateTime(),
      'version_created_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Rate', 'column' => 'id', 'required' => false)),
      'name'               => new sfValidatorString(array('max_length' => 20)),
      'description'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'day'                => new sfValidatorString(array('max_length' => 7)),
      'hour_from'          => new sfValidatorTime(),
      'hour_to'            => new sfValidatorTime(),
      'surcharge'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'reduced_percentage' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'note'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'version'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getVersion()), 'empty_value' => $this->getObject()->getVersion(), 'required' => false)),
      'version_created_at' => new sfValidatorDateTime(array('required' => false)),
      'version_created_by' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rate_version[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RateVersion';
  }


}
