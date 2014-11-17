<?php

/**
 * Area form base class.
 *
 * @method Area getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseAreaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'is_active'      => new sfWidgetFormInputCheckbox(),
      'name'           => new sfWidgetFormInputText(),
      'latitude'       => new sfWidgetFormInputText(),
      'longitude'      => new sfWidgetFormInputText(),
      'viewport_sw_lt' => new sfWidgetFormInputText(),
      'viewport_sw_ln' => new sfWidgetFormInputText(),
      'viewport_ne_lt' => new sfWidgetFormInputText(),
      'viewport_ne_ln' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'is_active'      => new sfValidatorBoolean(),
      'name'           => new sfValidatorString(array('max_length' => 200)),
      'latitude'       => new sfValidatorNumber(array('required' => false)),
      'longitude'      => new sfValidatorNumber(array('required' => false)),
      'viewport_sw_lt' => new sfValidatorNumber(array('required' => false)),
      'viewport_sw_ln' => new sfValidatorNumber(array('required' => false)),
      'viewport_ne_lt' => new sfValidatorNumber(array('required' => false)),
      'viewport_ne_ln' => new sfValidatorNumber(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('area[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Area';
  }


}
