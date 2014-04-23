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

  }
}
