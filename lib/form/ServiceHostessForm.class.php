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
      $years =  BookingQuery::create()->withColumn('MAX(Booking.YEAR)','max')->withColumn('MIN(Booking.YEAR)','min')->select(array('max','min'))->groupBy('year')->orderBy('year')->findOne();


      $this->setWidget('date_range',new sfWidgetFormDateRange(array(
            'from_date' => new sfWidgetFormJQueryDate(
      array('date_widget' => new sfWidgetFormDate(
              array('years' => array_combine($years, $years),
                    'format' => '%day%/%month%/%year%'))),array('class'=>'span3')
      ),
        'to_date'   => new sfWidgetFormJQueryDate(
                array('date_widget' => new sfWidgetFormDate(
                        array('years' => array_combine($years, $years),
                              'format' => '%day%/%month%/%year%'))),array('class'=>'span3')
            ))));

      $this->setWidget('contact', new sfWidgetFormPropelJQueryAutocompleter(  array(
          'model' => 'Booking',
          'method'=> 'getContact',
          'url' => sfContext::getInstance()->getController()->genUrl('serviceHostess/contacts')
      )));
      $this->widgetSchema->setNameFormat('serviceHostess[%s]');
      $this->disableLocalCSRFProtection();

  }
}
