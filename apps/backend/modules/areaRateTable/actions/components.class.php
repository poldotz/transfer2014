<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 26/04/14
 * Time: 11.34
 */

class areaRateTableComponents extends sfComponents {

    public function executeAreaCustomer(){
        $this->customerAreaForm = new AreaCustomerForm(null,array('customer_id'=>$this->customer_id));
        $this->urlForm = $this->generateUrl('area_customer_rate',array('id'=>$this->customer_id ));
    }
} 