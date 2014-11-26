<?php

/**
 * AreaVehicleRateTable form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class AreaVehicleRateTableCollectionForm extends sfForm
{

  public function configure()
  {
      $area = $this->getOption('area');

      $vehicleTypes = VehicleTypeQuery::create()
          //->filterByIsActive(true)
          ->orderByName()
          ->find();


      foreach($vehicleTypes as $key => $vehicleType){
              $areaVehicleRateTable = AreaVehicleRateTableQuery::create()
                  ->filterByCustomerId($this->getDefault('customer_id'))
                  ->filterByAreaId($area->getId())
                  ->filterByVehicleTypeId($vehicleType->getId())
                  ->findOne();
              if($areaVehicleRateTable == null){
                $areaVehicleRateTable = new AreaVehicleRateTable();
                $areaVehicleRateTable->setCustomerId($this->getDefault('customer_id'));
                $areaVehicleRateTable->setArea($area);
                $areaVehicleRateTable->setVehicleType($vehicleType);
              }

              $rateTableRowForm = new AreaVehicleRateTableForm($areaVehicleRateTable);
              $rateTableRowForm->setDefault('customer_id',$this->getDefault('customer_id'));
              $rateTableRowForm->setDefault('area_id',$area->getId());
              $rateTableRowForm->setDefault('vehicle_type_id',$vehicleType->getId());
              $this->embedForm($key,$rateTableRowForm);
          }
      $this->widgetSchema->setNameFormat('areaCustomerRates[%s]');
      $this->disableLocalCSRFProtection();

  }
}
