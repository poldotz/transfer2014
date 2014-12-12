<?php

/**
 * CustomerRateExtra form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class CustomerRateExtraForm extends BaseCustomerRateExtraForm
{
  public function configure()
  {
      $this->setWidget('customer_id',new sfWidgetFormInputHidden());
      //$extras = RateExtraRateQuery::create()->find();
      $this->disableLocalCSRFProtection();

  }
}
