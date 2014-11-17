<?php

/**
 * Rate form base class.
 *
 * @method Rate getObject() Returns the current form's model object
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
abstract class BaseRateForm extends BaseFormPropel
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
      'per_person'         => new sfWidgetFormInputCheckbox(),
      'note'               => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'version'            => new sfWidgetFormInputText(),
      'version_created_at' => new sfWidgetFormDateTime(),
      'version_created_by' => new sfWidgetFormInputText(),
      'customer_rate_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Customer')),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'               => new sfValidatorString(array('max_length' => 20)),
      'description'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'day'                => new sfValidatorString(array('max_length' => 7)),
      'hour_from'          => new sfValidatorTime(),
      'hour_to'            => new sfValidatorTime(),
      'surcharge'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'per_person'         => new sfValidatorBoolean(array('required' => false)),
      'note'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'version'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'version_created_at' => new sfValidatorDateTime(array('required' => false)),
      'version_created_by' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'customer_rate_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Customer', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Rate', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('rate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rate';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['customer_rate_list']))
    {
      $values = array();
      foreach ($this->object->getCustomerRates() as $obj)
      {
        $values[] = $obj->getCustomerId();
      }

      $this->setDefault('customer_rate_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCustomerRateList($con);
  }

  public function saveCustomerRateList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['customer_rate_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CustomerRatePeer::RATE_ID, $this->object->getPrimaryKey());
    CustomerRatePeer::doDelete($c, $con);

    $values = $this->getValue('customer_rate_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CustomerRate();
        $obj->setRateId($this->object->getPrimaryKey());
        $obj->setCustomerId($value);
        $obj->save($con);
      }
    }
  }

}
