<?php

/**
 * RateArchive form base class.
 *
 * @method RateArchive getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseRateArchiveForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'day'         => new sfWidgetFormInputText(),
      'hour_from'   => new sfWidgetFormTime(),
      'hour_to'     => new sfWidgetFormTime(),
      'surcharge'   => new sfWidgetFormInputText(),
      'per_person'  => new sfWidgetFormInputCheckbox(),
      'note'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'archived_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 20)),
      'description' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'day'         => new sfValidatorString(array('max_length' => 7)),
      'hour_from'   => new sfValidatorTime(),
      'hour_to'     => new sfValidatorTime(),
      'surcharge'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'per_person'  => new sfValidatorBoolean(array('required' => false)),
      'note'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'archived_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rate_archive[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RateArchive';
  }


}
