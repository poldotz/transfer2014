<?php

/**
 * Route form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class RateTableCollectionForm extends sfForm
{
  public function configure()
  {
      $rates = RateQuery::create()
          ->orderByName()
          ->find();

      foreach($rates as $key => $rate){
            $route = Ra::create()
                ->filterByLocalityFrom($this->getOption('locality_from'))
                ->filterByLocalityTo($vector->getId())
                ->findOne();
            $routeForm = new RouteForm($route);
            $routeForm->setDefault('locality_from',$this->getOption('locality_from'));
            $routeForm->setDefault('locality_to',$vector->getId());
            $this->embedForm($key,$routeForm);
      }
      $this->widgetSchema->setNameFormat('routes[%s]');
      $this->disableLocalCSRFProtection();

  }
}
