<?php

/**
 * Departure form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class DepartureForm extends BaseDepartureForm
{
    public function configure()
    {
        if($this->getOption('day',"") == "hidden"){

            $this->widgetSchema['day'] = new sfWidgetFormInputHidden();

            $this->validatorSchema->setOption('allow_extra_fields', true);
            $years = range(date('Y')-10, date('Y')+10);
            $day = sfContext::getInstance()->getUser()->getCurrentDepartureDate();
            $this->widgetSchema['day_change'] = new sfWidgetFormInput();
            $this->widgetSchema['day_update'] = new sfWidgetFormInput();
            $this->setDefault('day_change',date("d-m-Y", strtotime($day)));
            $this->setDefault('day_update',date("d-m-Y", strtotime($day)));
        }
        else{
            $years = range(date('Y')-10, date('Y')+10);
            $this->widgetSchema['day'] = new sfWidgetFormJQueryDate(
                array('date_widget' => new sfWidgetFormDate(
                        array('years' => array_combine($years, $years),
                            'format' => '%day%/%month%/%year%'))
                ));
        }
        $c1 = new Criteria();
        $c1->add(LocalityPeer::IS_ACTIVE,true,Criteria::EQUAL);
        $c1->add(LocalityPeer::IS_VECTOR,false,Criteria::EQUAL);
        $c1->addAscendingOrderByColumn('name');
        $this->widgetSchema['locality_from'] = new sfWidgetFormPropelChoice(array('model'=>'locality','criteria'=>$c1,'add_empty'=>'DA'));

        $c2 = new Criteria();
        $c2->add(LocalityPeer::IS_ACTIVE,true,Criteria::EQUAL);
        $c2->addDescendingOrderByColumn(LocalityPeer::IS_VECTOR);
        $c2->addAscendingOrderByColumn(LocalityPeer::NAME);

        $this->widgetSchema['locality_to'] = new sfWidgetFormPropelChoice(array('model'=>'locality','criteria'=>$c2,'add_empty'=>'A'));

        $this->widgetSchema['hour'] = new sfWidgetFormTime();
        $this->widgetSchema['departure_time'] = new sfWidgetFormTime();
        $this->widgetSchema['pick_up'] = new sfWidgetFormInputCheckbox(array(),array("class"=>"radio inline"));
        $c3 = new Criteria();
        $c3->addJoin(sfGuardUserPeer::ID,sfGuardUserGroupPeer::USER_ID);
        $c3->addJoin(sfGuardUserGroupPeer::GROUP_ID,sfGuardGroupPeer::ID);
        $c3->add(sfGuardGroupPeer::NAME,'Autista',Criteria::EQUAL);
        $c3->add(sfGuardUserPeer::IS_ACTIVE,true,Criteria::EQUAL);
        $this->widgetSchema['driver_id'] = new sfWidgetFormPropelChoice(array('model'=>'sfGuardUser','criteria'=>$c3,'add_empty'=>'Autista'));
        $c4 = new Criteria();
        $c4->add(PaymentMethodPeer::IS_ACTIVE,true,Criteria::EQUAL);
        $this->widgetSchema['payment_method_id'] = new sfWidgetFormPropelChoice(array('model'=>'paymentMethod','criteria'=>$c4,'multiple'=>false,'expanded'=>true),array("class"=>"horizontal_type"));
        $this->widgetSchema['cancelled'] = new sfWidgetFormInputCheckbox(array(),array("class"=>"radio inline"));
        $this->validatorSchema['booking_id']->setOption('required',false);
        $this->validatorSchema['calculated_cost']->setOption('required',false);

    }
}
