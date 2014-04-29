<?php

/**
 * Airport form base class.
 *
 * @method Airport getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseAirportForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'code'       => new sfWidgetFormInputText(),
      'name'       => new sfWidgetFormInputText(),
      'city'       => new sfWidgetFormInputText(),
      'country'    => new sfWidgetFormInputText(),
      'lat'        => new sfWidgetFormInputText(),
      'lng'        => new sfWidgetFormInputText(),
      'timezone'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'code'       => new sfValidatorString(array('max_length' => 5)),
      'name'       => new sfValidatorString(array('max_length' => 100)),
      'city'       => new sfValidatorString(array('max_length' => 100)),
      'country'    => new sfValidatorString(array('max_length' => 100)),
      'lat'        => new sfValidatorNumber(),
      'lng'        => new sfValidatorNumber(),
      'timezone'   => new sfValidatorString(array('max_length' => 100)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Airport', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('airport[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Airport';
  }


}
