<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 30/04/14
 * Time: 15.42
 */
class BookingDepartureCollectionForm extends sfForm
{
    public function configure()
    {
        if (!$booking = $this->getOption('booking'))
        {
            throw new InvalidArgumentException('You must provide a booking object.');
        }

        $departure = new Departure();
        $departure->setBooking($booking);
        $departureForm = new DepartureForm($departure);
        $this->embedForm(0,$departureForm);
    }
}