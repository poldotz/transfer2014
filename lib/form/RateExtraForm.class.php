<?php

/**
 * RateExtra form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class RateExtraForm extends BaseRateExtraForm
{
  public function configure()
  {
      $this->setWidget('name',new sfWidgetFormInputHidden());
      $this->getWidgetSchema()->setLabel('value','Valore di default');
      $this->getWidgetSchema()->setLabel('typology','Tipologia operazione');
  }
}
