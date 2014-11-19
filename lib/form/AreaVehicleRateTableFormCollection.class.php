<?php

/**
 * AreaVehicleRateTable form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class AreaVehicleRateTableFormCollection
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
      foreach($areas as $a => $area){
          foreach($vehicleTypes as $vt => $vehicleType){
              $areaVehicleRateTable = AreaVehicleRateTableQuery::create()
                  ->filterByCustomerId($this->getOption('customer_id'))
                  ->filterByAreaId($area->getId())
                  ->filterByVehicleTypeId($vehicleType->getId())
                  ->findOne();
              $rateTableRowForm = new AreaVehicleRateTableForm($areaVehicleRateTable);
              $rateTableRowForm->setDefault('customer_id',$this->getOption('customer_id'));
              $rateTableRowForm->setDefault('area_id',$area->getId());
              $rateTableRowForm->setDefault('vehicle_type_id',$vehicleType->getId());
              $this->embedForm($a."-".$vt,$rateTableRowForm);
          }
      }
      $this->widgetSchema->setNameFormat('customerRates[%s]');
      $this->disableLocalCSRFProtection();

  }
}
