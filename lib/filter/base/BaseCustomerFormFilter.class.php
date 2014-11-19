<?php

/**
 * Customer filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseCustomerFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'is_active'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'user_id'            => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'customer_type_id'   => new sfWidgetFormPropelChoice(array('model' => 'CustomerType', 'add_empty' => true)),
      'name'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vat_number'         => new sfWidgetFormFilterInput(),
      'tax_code'           => new sfWidgetFormFilterInput(),
      'phone'              => new sfWidgetFormFilterInput(),
      'fax'                => new sfWidgetFormFilterInput(),
      'mobile'             => new sfWidgetFormFilterInput(),
      'email'              => new sfWidgetFormFilterInput(),
      'site'               => new sfWidgetFormFilterInput(),
      'formatted_address'  => new sfWidgetFormFilterInput(),
      'iban'               => new sfWidgetFormFilterInput(),
      'bic'                => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'latitude'           => new sfWidgetFormFilterInput(),
      'longitude'          => new sfWidgetFormFilterInput(),
      'customer_rate_list' => new sfWidgetFormPropelChoice(array('model' => 'Rate', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'is_active'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'user_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'customer_type_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CustomerType', 'column' => 'id')),
      'name'               => new sfValidatorPass(array('required' => false)),
      'vat_number'         => new sfValidatorPass(array('required' => false)),
      'tax_code'           => new sfValidatorPass(array('required' => false)),
      'phone'              => new sfValidatorPass(array('required' => false)),
      'fax'                => new sfValidatorPass(array('required' => false)),
      'mobile'             => new sfValidatorPass(array('required' => false)),
      'email'              => new sfValidatorPass(array('required' => false)),
      'site'               => new sfValidatorPass(array('required' => false)),
      'formatted_address'  => new sfValidatorPass(array('required' => false)),
      'iban'               => new sfValidatorPass(array('required' => false)),
      'bic'                => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'latitude'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'customer_rate_list' => new sfValidatorPropelChoice(array('model' => 'Rate', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('customer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addCustomerRateListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(CustomerPeer::ID, CustomerRatePeer::CUSTOMER_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CustomerRatePeer::RATE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CustomerRatePeer::RATE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Customer';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'is_active'          => 'Boolean',
      'user_id'            => 'ForeignKey',
      'customer_type_id'   => 'ForeignKey',
      'name'               => 'Text',
      'vat_number'         => 'Text',
      'tax_code'           => 'Text',
      'phone'              => 'Text',
      'fax'                => 'Text',
      'mobile'             => 'Text',
      'email'              => 'Text',
      'site'               => 'Text',
      'formatted_address'  => 'Text',
      'iban'               => 'Text',
      'bic'                => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'latitude'           => 'Number',
      'longitude'          => 'Number',
      'customer_rate_list' => 'ManyKey',
    );
  }
}
