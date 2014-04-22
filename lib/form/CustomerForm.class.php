<?php

/**
 * Customer form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class CustomerForm extends BaseCustomerForm
{
  public function configure()
  {
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->validatorSchema->setOption('filter_extra_fields',false);

      $this->setWidget('user_id',new sfWidgetFormInputHidden());
      $this->setWidget('is_active',new sfWidgetFormInputCheckbox());
      $this->setValidator('customer_type_id', new sfValidatorPropelChoice(array('model' => 'CustomerType', 'column' => 'id', 'required' => true),array('required'=>'Campo Obligatorio')));
      $this->setValidator('name', new sfValidatorString(array('required' => true),array('required'=>'Campo Obligatorio')));

      if($this->getObject()->isNew()){
          $this->setValidator('email',new CustomerEmailValidatorSchema());

      }
      else{
          $this->setDefault('is_active',$this->getObject()->getsfGuardUser()->getIsActive());
      }
  }
}
