<?php

/**
 * Locality form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class DepartureLocalityForm extends RouteForm
{
  public function configure()
  {
      $this->useFields(array('locality_from'));
      $c1 = new Criteria();
      $c1->add(LocalityPeer::IS_ACTIVE,true,Criteria::EQUAL);
      $c1->add(LocalityPeer::IS_VECTOR,false,Criteria::EQUAL);
      $c1->addDescendingOrderByColumn('name');
      $this->widgetSchema['locality_from'] = new sfWidgetFormPropelChoice(array('model'=>'locality','criteria'=>$c1,'add_empty'=>'Seleziona una località'));
      $this->widgetSchema->setNameFormat('%s');
  }
}
