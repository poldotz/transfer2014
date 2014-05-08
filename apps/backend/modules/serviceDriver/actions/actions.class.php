<?php

/**
 * serviceDriver actions.
 *
 * @package    transfer
 * @subpackage serviceDriver
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class serviceDriverActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->form = new ServiceDriverForm();
      $this->services = array();

  }

    /**
     * set the current session arrival date.
     */
    public function executeChangeDate(sfWebRequest $request){

        $date =$request->getParameter('day_change');
        $day = date('Y-m-d',strtotime($date));

        $this->getUser()->setCurrentArrivalDate($day);
        $this->getUser()->setCurrentDepartureDate($day);
        $this->form = new ServiceDriverForm(array('day_change'=>$date));
        $this->services = array();
        $this->setTemplate('index');
    }

}
