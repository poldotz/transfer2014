<?php

/**
 * Area form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class AreaForm extends BaseAreaForm
{
  public function configure()
  {

      $this->useFields(array('is_active','name','latitude','longitude', 'viewport_sw_lt','viewport_sw_ln','viewport_ne_lt','viewport_ne_ln'));

      $this->widgetSchema['latitude'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['longitude'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['viewport_sw_lt'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['viewport_sw_ln'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['viewport_ne_lt'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['viewport_ne_ln'] = new sfWidgetFormInputHidden();
      $this->widgetSchema->setLabels(array(
          'name'    => 'Zona',
          'is_active'   => 'Stato'
      ));
  }
}