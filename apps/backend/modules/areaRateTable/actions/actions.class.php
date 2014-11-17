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

  }

  public function executeCustomerRateTable(sfWebRequest $request){
      $customer_id = $request->getGetParameter('id');
      if($customer_id){
        $rateTable = AreaVehicleRateTableQuery::findByCustomerId($customer_id);

      }
      else{
          $this->redirect('@customer');
      }
  }
}
