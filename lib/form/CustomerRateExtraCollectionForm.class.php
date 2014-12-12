<?php

/**
 * CustomerRateExtra form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class CustomerRateExtraCollectionForm extends sfForm
{
  public function configure()
  {
    $customer_id = $this->getOption('customer_id');
    $rateExtra = RateExtraQuery::create()->find();
    foreach($rateExtra as $key => $extra){
        $customerRateExtra =CustomerRateExtraPeer::retrieveByPK($customer_id,$extra->getId());
        if($customerRateExtra == null){
            $customerRateExtra = new CustomerRateExtra();
            $customerRateExtra->setCustomerId($customer_id);
            $customerRateExtra->setRateExtra($extra);
            $customerRateExtra->setValue($extra->getValue());
            $customerRateExtra->setTypology($extra->getTypology());
        }

        $customerRateExtraForm = new CustomerRateExtraForm($customerRateExtra);
        $customerRateExtraForm->setDefault('customer_id',$customer_id);
        $customerRateExtraForm->setDefault('rate_extra_id',$extra->getId());
        $this->embedForm($key,$customerRateExtraForm);
    }

      $this->widgetSchema->setNameFormat('customerRateExtras[%s]');
      $this->disableLocalCSRFProtection();

  }
}
