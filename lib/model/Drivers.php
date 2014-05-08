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
        $departures= $departures->toArray();

        foreach($arrivals as $arrival){
            foreach($departures as &$departure){
                if(in_array($arrival['DRIVER_ID'],$departure)){
                    $departure['num'] = $departure['num'] + $arrival['num'];
                }
            }
        }
        return $departures;
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