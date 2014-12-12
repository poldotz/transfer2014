<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 26/04/14
 * Time: 11.34
 */

class parameterRateTableComponents extends sfComponents {

    /**
     * return a collection of extra rate table.
     */
    public function executeExtraRateTable(){
        $this->extraRatesForm = new CustomerRateExtraCollectionForm(null,array('customer_id'=>$this->customer_id));
        //$this->customer = CustomerPeer::retrieveByPK($this->customer_id);
    }


    /**
     *  header rateTable
     */
    public function executeRateTableHeader(){

        $this->urlRateAreas = $this->generateUrl('customer_rate',array('id'=>$this->customer_id ));
        $this->urlRateParameters = $this->generateUrl('parameter_customer_rate',array('id'=>$this->customer_id ));
    }
} 