<?php

class myUser extends sfGuardSecurityUser
{

    public function isFirstRequest()
    {
        if (!$this->hasAttribute('first_request'))
        {
            $this->setAttribute('first_request',true);
            $this->setAttribute('session_year',date('Y'));
            $this->setAttribute('current_arrival_date',date('Y-m-d'));
            $this->setAttribute('current_departure_date',date('Y-m-d'));
            return true;
        }
        else{
            $this->setAttribute('first_request',false);
            return false;
        }
    }

    public function getSessionYear(){
        return $this->getAttribute('session_year',date('Y'));

    }

    public function setCurrentArrivalDate($date = ""){
        if($date){
            $this->setAttribute('current_arrival_date',$date);
        }
        else{
            $this->setAttribute('current_arrival_date',date('Y-m-d'));
        }

    }

    public function getCurrentArrivalDate(){
        return $this->getAttribute('current_arrival_date',date('Y-m-d'));
    }

    public function setCurrentDepartureDate($date = ""){
        if($date){
            $this->setAttribute('current_departure_date',$date);
        }
        else{
            $this->setAttribute('current_departure_date',date('Y-m-d'));
        }
    }

    public function getCurrentDepartureDate(){
        return $this->getAttribute('current_departure_date',date('Y-m-d'));
    }

}
