<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 09/05/14
 * Time: 0.28
 */


Class Driver {

    public static  function getDriversServices($day){

        $arrivals = ArrivalQuery::create()
        ->join('sfGuardUser')
        ->where('Arrival.CANCELLED = ?', 0)
        ->where('Arrival.DAY = ?',$day)
        ->withColumn('count(*)', 'num')
        ->withColumn('concat(sfGuardUser.FIRST_NAME," ",sfGuardUser.LAST_NAME)', 'driver')
        ->groupBy('Arrival.DRIVER_ID')
        ->select(array('DRIVER_ID', 'num','driver'))
        ->orderBy('sfGuardUser.FIRST_NAME')
        ->find();

        $arrivals = $arrivals->toArray();

        $departures = DepartureQuery::create()
        ->join('sfGuardUser')
        ->where('Departure.CANCELLED = ?', 0)
        ->where('Departure.DAY = ?', $day)
        ->withColumn('count(*)', 'num')
        ->withColumn('concat(sfGuardUser.FIRST_NAME," ",sfGuardUser.LAST_NAME)', 'driver')
        ->groupBy('Departure.DRIVER_ID')
        ->select(array('DRIVER_ID', 'num','driver'))
        ->orderBy('sfGuardUser.FIRST_NAME')
        ->find();
        $departures = $departures->toArray();
        $raw_services = array_merge($arrivals,$departures);

        $services = array();
        foreach($raw_services as $row){
            if(array_key_exists($row['DRIVER_ID'],$services)){
                $services[$row['DRIVER_ID']]['num'] += $row['num'];
            }else{
                $services[$row['DRIVER_ID']] = $row;
            }
        }
        return $services;
    }

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