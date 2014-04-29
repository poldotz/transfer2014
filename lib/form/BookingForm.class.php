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

      $this->setWidget('customer_type_id',new sfWidgetFormPropelChoice(array('model'=>'customerType','add_empty'=>'Tipo Cliente')));

      $this->setWidget('number',new sfWidgetFormInputHidden());
      $this->setWidget('year',new sfWidgetFormInputHidden());
      $this->setWidget('booking_date',new sfWidgetFormInputHidden());
      $this->setWidget('version_created_by',new sfWidgetFormInputHidden());


      $c = new Criteria();


      $customer_type_id = sfContext::getInstance()->getRequest()->getParameter('customer_type_id');

      if(isset($customer_type_id)){
          $c->add(CustomerPeer::CUSTOMER_TYPE_ID,$customer_type_id,Criteria::EQUAL);
      }
      else{
          $c->add(CustomerPeer::CUSTOMER_TYPE_ID, null, Criteria::ISNOTNULL);
      }
      $c->addDescendingOrderByColumn('name');
      $this->setWidget('customer_id',new sfWidgetFormPropelChoice(array('model'=>'customer','criteria'=>$c,'add_empty'=>'Nome Cliente')));

      $this->setWidget('vehicle_type_id',new sfWidgetFormPropelChoice(array('model'=>'vehicleType','add_empty'=>'Mezzo Richiesto')));

      $this->setDefault('child','');

      $arrival = new Arrival();
      $arrival->setBooking($this->getObject());
      $arrivalForm = new ArrivalForm();
      $this->embedForm('arrival',$arrivalForm);

      $departure = new Departure();
      $departure->setBooking($this->getObject());
      $departureForm = new DepartureForm();
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
            $arrival = $this->getValue('arrival');
            $forms = $this->embeddedForms;
            foreach ($forms as $name => $form)
            {
                if (!isset($arriva[$name]))
                {
                    unset($forms['arrival'][$name]);
                }
            }
        }

        return parent::saveEmbeddedForms($con, $forms);
    }

}
