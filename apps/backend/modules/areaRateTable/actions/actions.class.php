<?php

/**
 * areaRateTable actions.
 *
 * @package    transfer
 * @subpackage areaRateTable
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class areaRateTableActions extends sfActions
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

    /**
     *  AreaVehicle form.
     */
    public function executeAreaCustomerRateTable(sfWebRequest $request){

        if($request->getParameter('areaCustomer',null)){
            $customerAreaForm = new AreaCustomerForm();
            $customerAreaForm->bind($request->getParameter('areaCustomer'));
            if($customerAreaForm->isValid()){
                $this->area = AreaPeer::retrieveByPK($customerAreaForm->getValue('area_id'));
                $this->customer = CustomerPeer::retrieveByPK($customerAreaForm->getValue('customer_id'));
                $this->form = new AreaVehicleRateTableCollectionForm(array('customer_id'=>$this->customer->getId()),array('area'=>$this->area));
            }
            else{
                $customer_id = $request->getGetParameter('id',null);
                $this->redirect($this->generateUrl('customer_rate',array('id'=>$customer_id)));
            }
        }
        else if($request->getGetParameter('id',null) && $customer_id = $request->getGetParameter('area_id',null) ){
            $this->area = AreaPeer::retrieveByPK($request->getGetParameter('area_id',null));
            $this->customer = CustomerPeer::retrieveByPK($request->getGetParameter('id',null));
            $this->form = new AreaVehicleRateTableCollectionForm(array('customer_id'=>$this->customer->getId()),array('area'=>$this->area));
        }
        else{
            $this->redirect('@customer');
        }
  }

    /**
     * @param sfWebRequest $request
     */
    public function executeSave(sfWebRequest $request){

        $rates = $request->getParameter('areaCustomerRates');

        $customer_id = $request->getParameter('customer_id');
        $area_id = $request->getParameter('area_id');

        foreach($rates as $rate){

            $rateTableObj = AreaVehicleRateTableQuery::create()->findPk(array($rate['area_id'],$rate['vehicle_type_id'],$rate['customer_id']));
            if($rateTableObj == null){
                $rateTableObj = new AreaVehicleRateTable();
            }
            $rateForm = new AreaVehicleRateTableForm($rateTableObj);

            $rateForm->bind($rate);
            //$customer_id = $request->getParameter('customer_id');
            if($rateForm->isValid()){
                $rateForm->save();

            }
            else{
                $this->getUser()->setFlash("error",'Si è verificato un errore durante la processazione del form');
            }

        }
        $this->redirect($this->generateUrl('area_customer_rate',array('id'=>$customer_id,'area_id'=>$area_id)));

  }


  public function executeCustomerRateTable(sfWebRequest $request){
      $customer_id = $request->getGetParameter('id',null);
      if($customer_id){
        //$rateTable = AreaVehicleRateTableQuery::findByCustomerId($customer_id);
        $this->form = new AreaVehicleRateTableFormCollection(null,array('customer_id'=>$customer_id));

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




}
