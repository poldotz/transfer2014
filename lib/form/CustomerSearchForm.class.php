<?php

/**
 * Locality form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class CustomerSearchForm extends CustomerForm
{
  public function configure()
  {
      $this->useFields(array('id'));
      $c1 = new Criteria();
      $c1->add(CustomerPeer::IS_ACTIVE,true,Criteria::EQUAL);
      $c1->addJoin(CustomerPeer::CUSTOMER_TYPE_ID,CustomerTypePeer::ID);
      $c1->add(CustomerTypePeer::DESCRIPTION,'AZIENDA',Criteria::EQUAL);
      $c1->addDescendingOrderByColumn('name');
      $this->widgetSchema['customer_id'] = new sfWidgetFormPropelChoice(array('model'=>'customer','criteria'=>$c1,'add_empty'=>'Seleziona un cliente'));
      $this->widgetSchema->setNameFormat('%s');
  }
}
