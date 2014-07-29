<?php

/**
 * Arrival form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class ServiceDriverForm extends sfForm
{
  public function configure()
  {
          $this->widgetSchema['day_change'] = new sfWidgetFormInput();
          if(!$this->hasDefault('day_change')){
            $this->setDefault('day_change',date('d-m-Y',strtotime(sfContext::getInstance()->getUser()->getCurrentDriversDate())));
          }
  }
}
