<?php

class myUser extends sfGuardSecurityUser
{

    public function isFirstRequest()
    {
        if (!$this->hasAttribute('first_request'))
        {
            $this->setAttribute('first_request',true);
            $this->setAttribute('session_year',date('Y'));
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

}
