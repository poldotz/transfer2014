<?php

/**
 * Locality form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class LocalityForm extends BaseLocalityForm
{
  public function configure()
  {
      $this->useFields(array('is_vector','area_id','is_active','name','phone','fax','mobile','email','site','formatted_address','latitude','longitude'));

      $this->widgetSchema['latitude'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['longitude'] = new sfWidgetFormInputHidden();
      $c = new Criteria();
      $c->addAscendingOrderByColumn(AreaPeer::NAME);

      $this->widgetSchema['area_id'] = new sfWidgetFormPropelChoice(array('model'=>'area','criteria'=>$c,'add_empty'=>'Seleziona una zona: '));
      $this->widgetSchema->setLabels(array(
          'name'    => 'Denominazione',
          'is_vector' => 'Vettore',
          'is_active'   => 'Attivo',
          'phone' => 'Telefono',
          'mobile' => 'Cellulare',
          'site' => 'Sito web',
          'formatted_address' => 'Indirizzo',
          'area'=> 'Zona'
      ));
  }
}
