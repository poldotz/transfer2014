<?php



/**
 * Skeleton subclass for representing a row from the 'rate' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon May 12 21:42:31 2014
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Rate extends BaseRate
{
    public static function  getDaysOfWeek(){

        return array(1 => "Lunedi", 2 => "Martedi", 3 => "Mercoledi", 4 => "Giovedi", 5 => "Venerdi",6 => "Sabato",0 => "Domenica",8 => "Tutti");
    }


}
