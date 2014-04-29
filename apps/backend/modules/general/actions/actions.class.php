<?php

/**
 * general actions.
 *
 * @package    transfer
 * @subpackage general
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class generalActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }

  public function executeChangeSessionYear(sfWebRequest $request){

      $parameter = $request->getParameter('session_year');
      if(isset($parameter['year'])){
          $this->getUser()->setAttribute('session_year',$parameter['year']);
      }
      $this->redirect('@homepage');

  }

}
