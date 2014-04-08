<?php

/**
 * Company form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class CompanyForm extends BaseCompanyForm
{
  public function configure()
  {
      $this->useFields(array('name', 'vat_number', 'phone', 'fax', 'mobile', 'email', 'formatted_address'));

  }
}
