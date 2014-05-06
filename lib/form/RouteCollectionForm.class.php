<?php

/**
 * Route form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class RouteCollectionForm extends sfForm
{
  public function configure()
  {
      $vectors = LocalityQuery::create()
          ->filterByIsActive(true)
          ->filterByIsVector(true)
          ->orderByName()
          ->find();

      foreach($vectors as $key => $vector){
            $route = RouteQuery::create()
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
