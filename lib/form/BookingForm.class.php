<?php

/**
 * Booking form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class BookingForm extends BaseBookingForm
{
  public function configure()
  {
      $this->disableLocalCSRFProtection();
      $this->setWidget('number',new sfWidgetFormInputHidden());
      $this->setWidget('year',new sfWidgetFormInputHidden());
      $this->setWidget('booking_date',new sfWidgetFormInputHidden());
      $this->setWidget('version_created_by',new sfWidgetFormInputHidden());

      $customer_type_id = sfContext::getInstance()->getRequest()->getParameter('customer_type_id');
      if($this->getObject()->getCustomerId()){
        $customer = $this->getObject()->getCustomer();
        $customer_type_id = $customer->getCustomerTypeId();
        $this->setDefault('customer_type_id',$customer_type_id);
      }
      $this->setWidget('customer_type_id',new sfWidgetFormPropelChoice(array('model'=>'customerType','add_empty'=>'Tipo Cliente')));
      $c1 = new Criteria();

      if(isset($customer_type_id)){
          $c1->add(CustomerPeer::CUSTOMER_TYPE_ID,$customer_type_id,Criteria::EQUAL);
      }
      else{
          $c1->add(CustomerPeer::CUSTOMER_TYPE_ID, null, Criteria::ISNOTNULL);
      }
      $c1->addDescendingOrderByColumn('name');
      $this->setWidget('customer_id',new sfWidgetFormPropelChoice(array('model'=>'customer','criteria'=>$c1,'add_empty'=>'Nome Cliente')));

      $this->setWidget('vehicle_type_id',new sfWidgetFormPropelChoice(array('model'=>'vehicleType','add_empty'=>'Mezzo Richiesto')));

      $this->setDefault('child','');

      if($this->getObject()->getId()){
          $arrival = ArrivalQuery::create()->findOneByBookingId($this->getObject()->getId());
          $departure = DepartureQuery::create()->findOneByBookingId($this->getObject()->getId());
      }


      $arrivalForm = new ArrivalForm($arrival);
      $this->embedForm('arrival',$arrivalForm);

      if(!isset($departure)){
          $departure = new Departure();
          $departure->setBooking($this->getObject());
      }

      $departureForm = new DepartureForm($departure);
      $this->embedForm('departure',$departureForm);

      $this->setValidator('customer_type_id',new sfValidatorPropelChoice(array('model'=>'customerType','required'=>true)));
      $this->setValidator('customer_id',new sfValidatorPropelChoice(array('model'=>'customer')));

      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->validatorSchema->setOption('filter_extra_fields', false);


      $this->mergePostValidator(new TransferValidatorSchema());
  }

    public function saveEmbeddedForms($con = null, $forms = null)
    {
        if (null === $forms)
        {

            $forms = $this->embeddedForms;
            foreach ($forms as $name => $form)
            {
                $embForm = $this->getValue($name);
                if (!isset($embForm))
                {
                    unset($forms[$name]);
                }
                else{
                    $booking_id = $forms[$name]->getObject()->getBookingId();
                    if(!isset($booking_id)){
                        $forms[$name]->getObject()->setBookingId($this->getObject()->getId());
                        $forms[$name]->getObject()->setVersionCreatedBy($this->getObject()->getVersionCreatedBy());
                    }
                }
            }
        }

        return parent::saveEmbeddedForms($con, $forms);
    }

}
