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
        ->withColumn('sfGuardUser.EMAIL', 'EMAIL')
        ->groupBy('Arrival.DRIVER_ID')
        ->select(array('DRIVER_ID', 'num','driver','EMAIL'))
        ->orderBy('driver')
        ->find();

        $arrivals = $arrivals->toArray('driver');

        $departures = DepartureQuery::create()
        ->join('sfGuardUser')
        ->where('Departure.CANCELLED = ?', 0)
        ->where('Departure.DAY = ?', $day)
        ->withColumn('count(*)', 'num')
        ->withColumn('concat(sfGuardUser.FIRST_NAME," ",sfGuardUser.LAST_NAME)', 'driver')
        ->withColumn('sfGuardUser.EMAIL', 'EMAIL')
        ->groupBy('Departure.DRIVER_ID')
        ->select(array('DRIVER_ID', 'num','driver',"EMAIL"))
        ->orderBy('driver')
        ->find();
        $departures = $departures->toArray('driver');


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

    public static  function getDriverServicesDay($day,$driver_id = null,$booking_id = false,$fetch_mode = 'NUM'){

        $con = Propel::getConnection();
        $query = "SELECT * FROM ";
        if($booking_id){
            $booking_id = ", b.id ";
        }
        $select = "(SELECT if(a.cancelled,'si','no') as 'Annullato', b.number, 'Arrivo' as 'arrival', substr(a.hour,1,5) as 'hour', a.flight, substr(c.name, 1,22) as 'customer', substr(b.contact,1,22) as 'contact', concat(b.adult,'/',if(b.child,b.child,0)) as 'pax', concat(substr(locfrom.name,1,15),'/',substr(locto.name,1,15)) as 'route', substr(v.name,1,15) as 'vehicle_type', substr(p.name,1,2) as 'pay_method',substr(a.note,1,32) as 'note' ".$booking_id;
        $from = " FROM arrival as a JOIN booking as b on (a.booking_id = b.id) ".
            " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
            " JOIN locality as locfrom on (a.locality_from = locfrom.id) ".
            " JOIN locality as locto ON (a.locality_to = locto.id) ".
            " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
            " LEFT JOIN sf_guard_user as driver on (a.driver_id = driver.id) ".
            " LEFT JOIN payment_method as p on (a.payment_method_id = p.id) ";
        $where = " WHERE a.day ='".$day."' AND a.driver_id = ".$driver_id." AND a.cancelled = 0 ";
        $order_by = " ORDER BY a.hour, v.id, b.number) as a ";

        $queryArrivals = $select.$from.$where.$order_by;
        $query .= $queryArrivals;

        $query .= " UNION ALL SELECT * FROM ";

        $select = "(SELECT if(d.cancelled,'si','no') as 'Annullato', b.number, if(locto.is_vector,'Partenza','Taxi') as 'services', substr(d.hour,1,5) as 'hour', d.flight, substr(c.name, 1,22) as 'customer', substr(b.contact,1,22) as 'contact', concat(b.adult,'/',if(b.child,b.child,0)) as 'pax', concat(substr(locfrom.name,1,15),'/',substr(locto.name,1,15)) as 'route', substr(v.name,1,15) as 'vehicle_type', substr(p.name,1,2) as 'pay_method',substr(d.note,1,32) as 'note' ".$booking_id;
        $from = " FROM departure as d JOIN booking as b on (d.booking_id = b.id) ".
            " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
            " JOIN locality as locfrom on (d.locality_from = locfrom.id) ".
            " JOIN locality as locto ON (d.locality_to = locto.id) ".
            " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
            " LEFT JOIN sf_guard_user as driver on (d.driver_id = driver.id) ".
            " LEFT JOIN payment_method as p on (d.payment_method_id = p.id) ";
        $where = " WHERE d.day ='".$day."' AND d.driver_id = ".$driver_id ." AND d.cancelled = 0 ";
        $order_by = " ORDER BY d.hour, v.id, b.number) as d";

        $queryDepatures = $select.$from.$where.$order_by;
        $query .= $queryDepatures;
        $query .= " ORDER BY  hour,number;";
        $statement = $con->prepare($query);
        $statement->execute();

        if($fetch_mode == "NUM"){
            $services  = $statement->fetchAll(PDO::FETCH_NUM);
        }
        else{
            $services  = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $services;
    }
}