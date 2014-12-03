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

    /**
     *  header rateTable
     */
    public function executeRateTableHeader(){

        $this->urlRateAreas = $this->generateUrl('customer_rate',array('id'=>$this->customer_id ));
        $this->urlRateParameters = $this->generateUrl('parameter_customer_rate',array('id'=>$this->customer_id ));
    }
} 