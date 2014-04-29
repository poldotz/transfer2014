<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 29/04/14
 * Time: 15.28
 */

class TransferValidatorSchema extends  sfValidatorSchema {


    protected function doClean($values)
    {
        $errorSchema = new sfValidatorErrorSchema($this);

        foreach($values as $key => $value){


            if($key == "arrival"){
                $errorSchemaArrival = new sfValidatorErrorSchema($this);
                $arrival = $value;

                if(!$arrival['day'] && !$arrival['hour'] && !$arrival['locality_from'] && !$arrival['locality_to']){
                    unset($values['arrival']);
                }
                else{
                    if(!$arrival['day']){
                        $errorSchemaArrival->addError(new sfValidatorError($this, 'required'), 'day');
                    }
                    if(!$arrival['hour']){
                        $errorSchemaArrival->addError(new sfValidatorError($this, 'required'), 'hour');
                    }
                    if(!$arrival['locality_from']){
                        $errorSchemaArrival->addError(new sfValidatorError($this, 'required'), 'locality_from');
                    }
                    if(!$arrival['locality_to']){
                        $errorSchemaArrival->addError(new sfValidatorError($this, 'required'), 'locality_to');
                    }
                }

                // ci sono errori per il form incluso
                if (count($errorSchemaArrival))
                {
                    $errorSchema->addError($errorSchemaArrival, 'arrival');
                }
            }


            if($key == "departure"){
                $errorSchemaDeparture = new sfValidatorErrorSchema($this);
                $departure = $value;

                if(!$departure['day'] && !$departure['hour'] && !$departure['locality_from'] && !$departure['locality_to']){
                    unset($values['departure']);
                }
                else{
                    if(!$departure['day']){
                        $errorSchemaDeparture->addError(new sfValidatorError($this, 'required'), 'day');
                    }
                    if(!$departure['hour']){
                        $errorSchemaDeparture->addError(new sfValidatorError($this, 'required'), 'hour');
                    }
                    if(!$departure['locality_from']){
                        $errorSchemaDeparture->addError(new sfValidatorError($this, 'required'), 'locality_from');
                    }
                    if(!$departure['locality_to']){
                        $errorSchemaDeparture->addError(new sfValidatorError($this, 'required'), 'locality_to');
                    }
                }

                // ci sono errori per il form incluso
                if (count($errorSchemaDeparture))
                {
                    $errorSchema->addError($errorSchemaDeparture, 'departure');
                }
            }
        }
        // invia l'errore per il form principale
        if (count($errorSchema))
        {
            throw new sfValidatorErrorSchema($this, $errorSchema);
        }

        return $values;
    }

} 