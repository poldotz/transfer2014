<?php

/**
 * Booking form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class SessionYearForm extends BaseForm
{
    public function configure()
    {
        $years =  BookingQuery::create()->select(array('year'))->groupBy('year')->find();

        if(is_array($years)){
           $years =  array_merge($years,array($this->getDefault('year')));

        }
        else{
            $years = array($this->getDefault('year'));
        }
        // TODO: verificare array_combine.
        $this->setWidget('year',new sfWidgetFormChoice(array('choices'=>array_combine($years, $years)),array('class'=>'sessionYear')));

        $this->setValidator('year',new sfValidatorChoice(array('choices'=>array_combine($years, $years))));

        $this->widgetSchema->setNameFormat('session_year[%s]');
    }
}