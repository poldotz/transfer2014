<?php

/**
 * RateExtra form base class.
 *
 * @method RateExtra getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseRateExtraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'value'                => new sfWidgetFormInputText(),
      'typology'             => new sfWidgetFormChoice(array('choices' => array (  '' => '',  'percentage' => 'percentage',  'additional' => 'additional',))),
      'rate_extra_rate_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Rate')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 100)),
      'value'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'typology'             => new sfValidatorChoice(array('choices' => array (  0 => 'percentage',  1 => 'additional',), 'required' => false)),
      'rate_extra_rate_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Rate', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rate_extra[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RateExtra';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['rate_extra_rate_list']))
    {
      $values = array();
      foreach ($this->object->getRateExtraRates() as $obj)
      {
        $values[] = $obj->getRateId();
      }

      $this->setDefault('rate_extra_rate_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveRateExtraRateList($con);
  }

  public function saveRateExtraRateList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['rate_extra_rate_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(RateExtraRatePeer::RATE_EXTRA_ID, $this->object->getPrimaryKey());
    RateExtraRatePeer::doDelete($c, $con);

    $values = $this->getValue('rate_extra_rate_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new RateExtraRate();
        $obj->setRateExtraId($this->object->getPrimaryKey());
        $obj->setRateId($value);
        $obj->save($con);
      }
    }
  }

}
