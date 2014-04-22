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
 * @version    SVN: $Id: sfGuardUserPeer.php 7634 2008-02-27 18:01:40Z fabien $
 */
class sfGuardUserPeer extends PluginsfGuardUserPeer
{
    public static function retrieveByUsernameOrEmail($usernameOrEmail, $isActive = null,$user_id = null)
    {
        $c = new Criteria();
        $c0 = $c->getNewCriterion(self::USERNAME, $usernameOrEmail);
        $c1 = $c->getNewCriterion(self::EMAIL, $usernameOrEmail);
        $c0->addOr($c1);
        if(isset($isActive)){
            $c2 = $c->getNewCriterion(self::IS_ACTIVE, $isActive);
            $c0->addAnd($c2);
        }

        if(isset($user_id)){
            $c3 = $c->getNewCriterion(self::ID,$user_id,Criteria::NOT_EQUAL);
            $c0->addAnd($c3);
        }
        $c->add($c0);

        return self::doSelectOne($c);
    }


    public static function doSelectPager($page=1, $item_per_page = 10, Criteria $criteria = null)
    {
        if ($criteria === null)
        {
            $criteria = new Criteria();
        }
        $pager = new sfPropelPager('sfGuardUser', $item_per_page);
        $pager->setCriteria($criteria);
        $pager->setPage($page);
        $pager->setPeerMethod('doSelect');
        $pager->init();
        return $pager;
    }
}
