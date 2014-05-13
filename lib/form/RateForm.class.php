<?php

/**
 * Rate form.
 *
 * @package    transfer
 * @subpackage form
 * @author     Poldotz
 */
class RateForm extends BaseRateForm
{
  public function configure()
  {
      $optionsDays = array(1 => "Lunedi", 2 => "Martedi", 3 => "Mercoledi", 4 => "Giovedi", 5 => "Venerdi",6 => "Sabato",0 => "Domenica",8 => "Tutti");
      $this->setWidget('day',new sfWidgetFormChoice(array('choices'=>$optionsDays,'multiple'=>true)));
      //$this->setValidator('day',new sfValidatorChoice(array('choices'=>array_keys($optionsDays),'multiple'=>true)));
      $optionsSurcharge = range(0,100, 5);
      $optionsSurcharge = array_combine($optionsSurcharge,$optionsSurcharge);
      $this->setWidget('surcharge',new sfWidgetFormChoice(array('choices'=>$optionsSurcharge)));
      $this->setValidator('surcharge',new sfValidatorChoice(array('choices'=>array_keys($optionsSurcharge),'multiple'=>true)));

      $this->validatorSchema['name']->setMessage('required','Campo Obbligatorio');
      $this->validatorSchema['day']->setMessage('required','Campo Obbligatorio');
      $this->validatorSchema['hour_from']->setMessage('required','Campo Obbligatorio');
      $this->validatorSchema['hour_to']->setMessage('required','Campo Obbligatorio');
      $this->widgetSchema->setLabels(array(
          'name'    => 'Nome: ',
          'description'   => 'Descrizione :',
          'day' => 'Giorni: ',
          'hour_from' => 'Dalle: ',
          'hour_to' => 'Alle: ',
          'hour_from' => 'Dalle: ',
          'surcharge' => "Supplemento: ",
          'note' => "Note: "
      ));
  }
}
