<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 26/04/14
 * Time: 11.34
 */

class serviceDriverComponents extends sfComponents {

    public function executeDriversServices(){
        $day = $this->getUser()->getCurrentDriversDate();
        $services = Driver::getDriversServices($day);
        $this->services = $services;
    }

} 