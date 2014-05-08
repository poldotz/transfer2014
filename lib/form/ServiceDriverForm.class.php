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
          $day = sfContext::getInstance()->getUser()->getSessionYear();
          $this->widgetSchema['day_change'] = new sfWidgetFormInput();
          if(!$this->hasDefault('day_change')){
            $this->setDefault('day_change',sfContext::getInstance()->getUser()->getCurrentDriversDate());
          }
          else{
              
            }
  }
}
