<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 26/04/14
 * Time: 11.34
 */

class areaRateTableComponents extends sfComponents {

    public function executeAreaCustomer(){
        $options = array('customer_id'=>$this->customer_id);
        if(isset($this->area_id)){
            $options['area_id'] = $this->area_id;
        }
        $this->customerAreaForm = new AreaCustomerForm(null,$options);
        $this->urlForm = $this->generateUrl('area_customer_rate',array('id'=>$this->customer_id ));
    }
} 