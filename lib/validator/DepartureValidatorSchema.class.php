<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 29/04/14
 * Time: 15.28
 */

class DepartureValidatorSchema extends  sfValidatorSchema {


    protected function doClean($values)
    {
        $errorSchemaLocal = new sfValidatorErrorSchema($this);

        foreach($values as $key => $value){
            $errorSchemaLocal = new sfValidatorErrorSchema($this);


        }
    }
}