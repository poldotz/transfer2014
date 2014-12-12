<?php

/**
 * areaRateTable actions.
 *
 * @package    transfer
 * @subpackage areaRateTable
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class parameterRateTableActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $customer_id = $request->getGetParameter('id',null);
      if($customer_id){
        $this->customer = CustomerPeer::retrieveByPK($customer_id);

      }
      else{
          $this->redirect('@customer');
      }
  }

  public function executeCustomerRateTableParameters(sfWebRequest $request){
    $customer_id = $request->getGetParameter('id',null);
    if($customer_id){
        $this->customer = CustomerPeer::retrieveByPK($customer_id);
    }
    else{
        $this->redirect('@customer');
    }
  }

    /**
     * @param sfWebRequest $request
     */
    public function executeSave(sfWebRequest $request){

        $rates = $request->getParameter('customerRateExtras');
        $this->customer_id = $request->getParameter('customer_id');
        $this->customer = CustomerPeer::retrieveByPK($this->customer_id);


        foreach($rates as $rate){

            $rateTableObj = CustomerRateExtraPeer::retrieveByPK($this->customer_id,$rate['rate_extra_id']);
            if($rateTableObj == null){
                $rateTableObj = new CustomerRateExtra();
            }
            $rateForm = new CustomerRateExtraForm($rateTableObj);

            $rateForm->bind($rate);
            //$customer_id = $request->getParameter('customer_id');
            if($rateForm->isValid()){
                $rateForm->save();

            }
            else{
                break;
            }
        }
        $this->rateForm = $rateForm;
        //$this->redirect($this->generateUrl('parameter_customer_rate',array('id'=>$this->customer_id )));
        $this->setTemplate('customerRateTableParameters');
    }






}
