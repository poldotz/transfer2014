<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 26/04/14
 * Time: 11.34
 */

class generalComponents extends sfComponents {

    public function executeSessionYear(){
        $this->form = new SessionYearForm(array('year'=> $this->getUser()->getSessionYear()));
    }

} 