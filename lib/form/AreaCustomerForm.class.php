<?php

/**
 * AreaVehicleRateTable form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class AreaCustomerForm extends BaseAreaVehicleRateTableForm
{
  public function configure()
  {
      $this->useFields(array('customer_id','area_id'));
      $this->setWidget('customer_id',new sfWidgetFormInputHidden());
      $this->setDefault('customer_id',$this->getOption('customer_id'));
      if($this->getOption('area_id')){
        $this->setDefault('are',$this->getOption('area_id'));
      }
      $c = new Criteria();
      $c->add(AreaPeer::IS_ACTIVE,true,Criteria::EQUAL);
      $this->setWidget('area_id',new sfWidgetFormPropelChoice(array('model'=>'area','add_empty'=>'Seleziona una zona','criteria'=>$c)));
      $this->widgetSchema->setLabels(array(
          'name'    => 'Zona',

      ));
      $this->setValidator('area_id',new sfValidatorPropelChoice(array('model'=>'area','required'=>true)));
      $this->widgetSchema->setNameFormat('areaCustomer[%s]');
  }
}
