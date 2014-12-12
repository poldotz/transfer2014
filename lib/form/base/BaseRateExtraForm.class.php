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
      'id'                       => new sfWidgetFormInputHidden(),
      'name'                     => new sfWidgetFormInputText(),
      'value'                    => new sfWidgetFormInputText(),
      'typology'                 => new sfWidgetFormChoice(array('choices' => array (  '' => '',  'percentuale' => 'percentuale',  'addizionale' => 'addizionale',))),
      'customer_rate_extra_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Customer')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'                     => new sfValidatorString(array('max_length' => 100)),
      'value'                    => new sfValidatorNumber(),
      'typology'                 => new sfValidatorChoice(array('choices' => array (  0 => 'percentuale',  1 => 'addizionale',), 'required' => false)),
      'customer_rate_extra_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Customer', 'required' => false)),
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

    if (isset($this->widgetSchema['customer_rate_extra_list']))
    {
      $values = array();
      foreach ($this->object->getCustomerRateExtras() as $obj)
      {
        $values[] = $obj->getCustomerId();
      }

      $this->setDefault('customer_rate_extra_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCustomerRateExtraList($con);
  }

  public function saveCustomerRateExtraList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['customer_rate_extra_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CustomerRateExtraPeer::RATE_EXTRA_ID, $this->object->getPrimaryKey());
    CustomerRateExtraPeer::doDelete($c, $con);

    $values = $this->getValue('customer_rate_extra_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CustomerRateExtra();
        $obj->setRateExtraId($this->object->getPrimaryKey());
        $obj->setCustomerId($value);
        $obj->save($con);
      }
    }
  }

}
