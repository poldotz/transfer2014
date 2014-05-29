<?php

/**
 * Route form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class ServiceHostessForm extends sfForm
{
  public function configure()
  {
      $this->disableLocalCSRFProtection();
      //$this->useFields(array('date_range','contact','contact_off','rifFile','rifFile_off','customer','customer_off','locality','locality_off','vehicle_type_id','vehicle_type_id_off','driver_id','driver_id_off','transfer_type'));
      $years =  BookingQuery::create()->withColumn('MAX(Booking.YEAR)','max')->withColumn('MIN(Booking.YEAR)','min')->select(array('max','min'))->groupBy('year')->orderBy('year')->findOne();

      $this->setWidget('date_range',new sfWidgetFormDateRange(array(
            'from_date' => new sfWidgetFormJQueryDate(
      array('date_widget' => new sfWidgetFormDate(
              array('years' => array_combine($years, $years),
                    'format' => '%day%/%month%/%year%'),array('class'=>'span1')))
      ),
        'to_date'   => new sfWidgetFormJQueryDate(
                array('date_widget' => new sfWidgetFormDate(
                        array('years' => array_combine($years, $years),
                              'format' => '%day%/%month%/%year%'),array('class'=>'span1')))
            ))));
      $this->setWidget('date_range_off', new sfWidgetFormInputCheckbox());

      $this->setWidget('contact', new sfWidgetFormPropelJQueryAutocompleter(  array(
          'model' => 'Booking',
          'method'=> 'getContact',
          'url' => sfContext::getInstance()->getController()->genUrl('serviceHostess/getContacts')
      ),array('class'=>'span12',"placeholder"=>'Referente')));
      $this->setWidget('contact_off', new sfWidgetFormInputCheckbox());

      $this->setWidget('rifFile', new sfWidgetFormPropelJQueryAutocompleter(  array(
          'model' => 'Booking',
          'method'=> 'getRifFile',
          'url' => sfContext::getInstance()->getController()->genUrl('serviceHostess/getRifFiles')
      ),array('class'=>'span12',"placeholder"=>'Rif.File')));
      $this->setWidget('rifFile_off', new sfWidgetFormInputCheckbox());

      $this->setWidget('customer', new sfWidgetFormJQueryAutocompleter(  array(
          'url' => sfContext::getInstance()->getController()->genUrl('serviceHostess/getCustomers')
      ),array('class'=>'span12',"placeholder"=>'Cliente')));
      $this->setWidget('customer_off', new sfWidgetFormInputCheckbox());

      $this->setWidget('locality', new sfWidgetFormJQueryAutocompleter(  array(
          'url' => sfContext::getInstance()->getController()->genUrl('serviceHostess/getLocalities')
      ),array('class'=>'span12',"placeholder"=>'Località')));
      $this->setWidget('locality_off', new sfWidgetFormInputCheckbox());

      $this->setWidget('vehicle_type_id',new sfWidgetFormPropelChoice(array('model'=>'vehicleType','add_empty'=>'Mezzo Richiesto'),array("class"=>"span12")));
      $this->setWidget('vehicle_type_id_off', new sfWidgetFormInputCheckbox());

      $c3 = new Criteria();
      $c3->addJoin(sfGuardUserPeer::ID,sfGuardUserGroupPeer::USER_ID);
      $c3->addJoin(sfGuardUserGroupPeer::GROUP_ID,sfGuardGroupPeer::ID);
      $c3->add(sfGuardGroupPeer::NAME,'Autista',Criteria::EQUAL);
      $c3->add(sfGuardUserPeer::IS_ACTIVE,true,Criteria::EQUAL);
      $this->widgetSchema['driver_id'] = new sfWidgetFormPropelChoice(array('model'=>'sfGuardUser','criteria'=>$c3,'add_empty'=>'Autista'),array("class"=>"span12"));
      $this->setWidget('driver_id_off', new sfWidgetFormInputCheckbox());

      $this->widgetSchema['transfer_type'] = new sfWidgetFormChoice(array("choices"=>array('arrival'=>"Arrivo",'departure'=>"Partenza"),'multiple'=>false,'expanded'=>true),array("class"=>"horizontal_type"));

      $this->validatorSchema['date_range'] = new sfValidatorDateRange(array(
          'from_date' => new sfValidatorDate(),
          'to_date' => new sfValidatorDate(),
      ));

      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->validatorSchema->setOption('filter_extra_fields', false);

      $this->widgetSchema->setNameFormat('serviceHostess[%s]');
      $this->disableLocalCSRFProtection();
  }
}
