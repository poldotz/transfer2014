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
      $this->useFields(array('is_vector','is_active','name','phone','fax','mobile','email','site','formatted_address'));
      $this->widgetSchema->setLabels(array(
          'name'    => 'Denominazione',
          'is_vector' => 'Vettore',
          'is_active'   => 'Attivo',
          'phone' => 'Telefono',
          'mobile' => 'Cellulare',
          'site' => 'Sito web',
          'formatted_address' => 'Indirizzo'
      ));
  }
}
