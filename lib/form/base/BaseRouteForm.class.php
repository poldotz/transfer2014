<?php

/**
 * Route form base class.
 *
 * @method Route getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseRouteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'locality_from' => new sfWidgetFormPropelChoice(array('model' => 'Locality', 'add_empty' => false)),
      'locality_to'   => new sfWidgetFormPropelChoice(array('model' => 'Locality', 'add_empty' => false)),
      'duration'      => new sfWidgetFormTime(),
      'distance'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'locality_from' => new sfValidatorPropelChoice(array('model' => 'Locality', 'column' => 'id')),
      'locality_to'   => new sfValidatorPropelChoice(array('model' => 'Locality', 'column' => 'id')),
      'duration'      => new sfValidatorTime(),
      'distance'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Route', 'column' => array('locality_from', 'locality_to')))
    );

    $this->widgetSchema->setNameFormat('route[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Route';
  }


}
