<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUser.php 7634 2008-02-27 18:01:40Z fabien $
 */
class sfGuardUser extends PluginsfGuardUser
{

    public function preInsert(PropelPDO $con = null)
    {
        $this->setFirstName(strtoupper($this->getFirstName()));
        $this->setLastName(strtoupper($this->getLastName()));
        return true;
    }

    public function preUpdate(PropelPDO $con = null)
    {
        $this->setFirstName(strtoupper($this->getFirstName()));
        $this->setLastName(strtoupper($this->getLastName()));
        return true;
    }

    public function __toString(){

        return ucfirst($this->first_name). " ".ucfirst(substr($this->last_name,0,1)).".";

}

    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function getDriver(){
        return ucfirst($this->first_name)." ".ucfirst(substr($this->last_name,0,1)).".";

    }

    /*public function addsfGuardUserProfile()
    {
        if(!$profile = $this->getProfile())
        {
            $profile = new sfGuardUserProfile;
            $profile->setUserId($this->getId());
            $profile->save();
        }
        return $profile;
    }


    public function getEmail()
    {
        return $this->getProfile()->getEmail();
    }
    public function setEmail($email)
    {
        $this->getProfile()->setEmail($email);
    }*/

}
