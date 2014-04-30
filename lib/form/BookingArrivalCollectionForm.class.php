<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 30/04/14
 * Time: 15.42
 */
class BookingArrivalCollectionForm extends sfForm
{
    public function configure()
    {
        if (!$booking = $this->getOption('booking'))
        {
            throw new InvalidArgumentException('You must provide a booking object.');
        }

        $arrival = new Arrival();
        $arrival->setBooking($booking);
        $arrivalForm = new ArrivalForm($arrival);
        $this->embedForm(0,$arrivalForm);
    }
}