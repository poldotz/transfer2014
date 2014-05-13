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
      $optionsDays = Rate::getDaysOfWeek();
      if($this->getObject()){
          $days = str_split($this->getObject()->getDay());

      }

      $this->setWidget('day',new sfWidgetFormChoice(array('choices'=>$optionsDays,'multiple'=>true)));

      //$this->setValidator('day',new sfValidatorChoice(array('choices'=>array_keys($optionsDays),'multiple'=>true)));
      $optionsSurcharge = range(0,100, 5);
      $optionsSurcharge = array_combine($optionsSurcharge,$optionsSurcharge);
      $this->setWidget('surcharge',new sfWidgetFormChoice(array('choices'=>$optionsSurcharge)));
      $this->setValidator('surcharge',new sfValidatorChoice(array('choices'=>$optionsSurcharge)));

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

    public function updateDefaultsFromObject()
    {
        parent::updateDefaultsFromObject();
        if($this->getObject()){
            $days = str_split($this->getObject()->getDay());
            $this->setDefault('day',array_reverse($days));
        }
    }
}
