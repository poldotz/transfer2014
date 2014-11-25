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
      $c = new Criteria();
      $c->add(AreaPeer::IS_ACTIVE,true,Criteria::EQUAL);
      $this->setWidget('area_id',new sfWidgetFormPropelChoice(array('model'=>'Area','add_empty'=>'Seleziona una zona','criteria'=>$c)));
      $this->widgetSchema->setLabels(array(
          'name'    => 'Zona',

      ));

  }
}
