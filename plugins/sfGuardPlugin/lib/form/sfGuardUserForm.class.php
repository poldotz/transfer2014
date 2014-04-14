<?php

/**
 * sfGuardUser form.
 *
 * @package    form
 * @subpackage sf_guard_user
 * @version    SVN: $Id: sfGuardUserForm.class.php 24560 2009-11-30 11:05:31Z fabien $
 */
class sfGuardUserForm extends sfGuardUserAdminForm
{
  public function configure()
  {
    parent::configure();

    $c = new Criteria();
    $c->add(sfGuardGroupPeer::NAME,sfConfig::get('app_internal_user_groups', array('Amministratore','Operatore','Autista')),Criteria::IN);
    $this->setWidget('internal_user_groups',new sfWidgetFormPropelChoice(array('multiple' => false, 'model' => 'sfGuardGroup')));

    $this->setValidator('internal_user_groups', new sfValidatorPropelChoice(array('multiple' => false, 'model' => 'sfGuardGroup', 'required' => false)));

    unset(
      $this['last_login'],
      $this['created_at'],
      $this['salt'],
      $this['algorithm'],
      //$this['is_active'],
      $this['is_super_admin'],
      $this['sf_guard_user_group_list'],
      $this['sf_guard_user_permission_list']
    );
  }

    public function updateDefaultsFromObject()
    {
        parent::updateDefaultsFromObject();

        if (isset($this->widgetSchema['internal_user_groups']))
        {
            $values = array();
            foreach ($this->object->getsfGuardUserGroups() as $obj)
            {
                $values[] = $obj->getGroupId();
            }

            $this->setDefault('internal_user_groups', $values);
        }

    }

    protected function doSave($con = null)
    {
        parent::doSave($con);

        $this->saveInternalUserGroup($con);
    }

    public function saveInternalUserGroup($con = null)
    {
        if (!$this->isValid())
        {
            throw $this->getErrorSchema();
        }

        if (!isset($this->widgetSchema['internal_user_groups']))
        {
            // somebody has unset this widget
            return;
        }

        if (null === $con)
        {
            $con = $this->getConnection();
        }

        $c = new Criteria();
        $c->add(sfGuardUserGroupPeer::USER_ID, $this->object->getPrimaryKey());
        sfGuardUserGroupPeer::doDelete($c, $con);

        $values = $this->getValue('internal_user_groups');
        if (is_array($values))
        {
            foreach ($values as $value)
            {
                $obj = new sfGuardUserGroup();
                $obj->setUserId($this->object->getPrimaryKey());
                $obj->setGroupId($value);
                $obj->save($con);
            }
        }
        else{
            $obj = new sfGuardUserGroup();
            $obj->setUserId($this->object->getPrimaryKey());
            $obj->setGroupId($values);
            $obj->save($con);

        }
    }



}
