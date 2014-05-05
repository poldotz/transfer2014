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
                ->filterByLocalityFrom($this->getDefault('locality_from'))
                ->filterByLocalityTo($vector->getId())
                ->findOne();
            $routeForm = new RouteForm($route);
            $this->embedForm($key,$routeForm);
      }
      $this->widgetSchema->setNameFormat('routes[%s]');

  }
}
