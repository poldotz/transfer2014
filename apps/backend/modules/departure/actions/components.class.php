<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 26/04/14
 * Time: 11.34
 */

class DepartureComponents extends sfComponents {

    public function executeDrivers(){

        $this->form = new DepartureForm();
    }

    public function executeEditDay(){

        $this->formDay = new DepartureForm(null,array('day'=>'hidden'));
    }

} 