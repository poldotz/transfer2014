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
      $areas = AreaQuery::create()
          ->filterByIsActive(true)
          ->orderByName()
          ->find();

      $vehicleTypes = VehicleTypeQuery::create()
          //->filterByIsActive(true)
          ->orderByName()
          ->find();

      foreach($areas as $area){
          foreach($vehicleTypes as $vehicleType){
              $areaVehicleRateTable = AreaVehicleRateTableQuery::create()
                  ->filterByCustomerId($this->getOption('customer_id'))
                  ->filterByAreaId($area->getId())
                  ->filterByVehicleTypeId($vehicleType->getId())
                  ->findOne();
              if($areaVehicleRateTable == null){
                $areaVehicleRateTable = new AreaVehicleRateTable();
                $areaVehicleRateTable->setCustomerId($this->getOption('customer_id'));
                $areaVehicleRateTable->setArea($area);
                $areaVehicleRateTable->setVehicleType($vehicleType);
              }

              $rateTableRowForm = new AreaVehicleRateTableForm($areaVehicleRateTable);
              $rateTableRowForm->setDefault('customer_id',$this->getOption('customer_id'));
              $rateTableRowForm->setDefault('area_id',$area->getId());
              $rateTableRowForm->setDefault('vehicle_type_id',$vehicleType->getId());
              $this->embedForm($area->getId()."-".$vehicleType->getId(),$rateTableRowForm);
          }
      }
      $this->widgetSchema->setNameFormat('customerRates[%s]');
      $this->disableLocalCSRFProtection();

  }
}
