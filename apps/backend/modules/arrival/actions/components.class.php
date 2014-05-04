<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 26/04/14
 * Time: 11.34
 */

class ArrivalComponents extends sfComponents {

    public function executeDrivers(){

        $this->form = new ArrivalForm();
    }

} 