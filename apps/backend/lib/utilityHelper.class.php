<?php
/**
 * Created by PhpStorm.
 * User: lpodda
 * Date: 5/12/14
 * Time: 12:32 PM
 */

class UtilityHelper {

    public static function translateToItaDayOfWeek($giorno ="")
    {
        switch($giorno)
        {
            case "Sun":
                $giorno = "Domenica";
                break;
            case "Mon":
                $giorno = "Lunedi";
                break;
            case "Tue":
                $giorno = "Martedi";
                break;
            case "Wed":
                $giorno = "Mercoledi";
                break;
            case "Thu":
                $giorno = "Giovedi";
                break;
            case "Fri":
                $giorno = "Venerdi";
                break;
            case "Sat":
                $giorno = "Sabato";
                break;
            default:
                $giorno = "Errore";
                break;
        }
        return $giorno;
    }




}