<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 26/04/14
 * Time: 10.47
 */

class sessionYearFilter extends sfFilter
{
    public function execute ($filterChain)
    {
        if($this->isFirstCall()){
            sfContext::getInstance()->getUser()->isFirstRequest();
        }

        // execute next filter
        $filterChain->execute();
    }
}