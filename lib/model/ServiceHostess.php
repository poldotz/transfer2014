<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 09/05/14
 * Time: 0.28
 */


Class ServiceHostess {


    private static function getArrivalService($conditions){


        $select = "(SELECT b.number, b.booking_date,c.name,b.contact,concat(b.adult,'/',if(b.child,b.child,0)) as 'pax',concat(b.adult,'/',if(b.child,b.child,0)) as 'pax',b.rifFile, 'Arrivo' as 'arrival' ";
        $from = " FROM arrival as a JOIN booking as b on (a.booking_id = b.id) ".
            " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
            " JOIN locality as locfrom on (a.locality_from = locfrom.id) ".
            " JOIN locality as locto ON (a.locality_to = locto.id) ".
            " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
            " LEFT JOIN sf_guard_user as driver on (a.driver_id = driver.id) ".
            " LEFT JOIN payment_method as p on (a.payment_method_id = p.id) ";
        $where = " WHERE a.cancelled = 0 ";

        $order_by = " ORDER BY b.booking_date, b.number) as a ";

        $queryArrivals = $select.$from.$where.$order_by;



        return $queryArrivals;
    }

    private static function getDepartureService($conditions){

        $select = "(SELECT b.number, b.booking_date,c.name,b.contact,concat(b.adult,'/',if(b.child,b.child,0)) as 'pax',concat(b.adult,'/',if(b.child,b.child,0)) as 'pax',b.rifFile, if(locto.is_vector,'Partenza','Taxi') as 'services', ";
        $from = " FROM departure as d JOIN booking as b on (d.booking_id = b.id) ".
            " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
            " JOIN locality as locfrom on (d.locality_from = locfrom.id) ".
            " JOIN locality as locto ON (d.locality_to = locto.id) ".
            " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
            " LEFT JOIN sf_guard_user as driver on (d.driver_id = driver.id) ".
            " LEFT JOIN payment_method as p on (d.payment_method_id = p.id) ";
        $where = " WHERE d.cancelled = 0 ";
        $order_by = " ORDER BY b.booking_date, b.number) as d";

        $queryDepatures = $select.$from.$where.$order_by;

        return $queryDepatures;
    }

    public static  function getServices($conditions){

        $con = Propel::getConnection();

        $query = "SELECT * FROM ";

        if($conditions['transfer_type']){
            switch ($conditions['transfer_type']) {
                case 'arrival':
                    $arrivalQuery =  ServiceHostess::getArrivalService($conditions);
                    break;
                case $conditions['transfer_type']:
                    $departureQuery =  ServiceHostess::getDepartureService($conditions);
                    break;
            }
        }





        $query .= " UNION ALL SELECT * FROM ";


        $query .= $queryDepatures;
        $query .= " ORDER BY  hour,number;";
        $statement = $con->prepare($query);
        $statement->execute();
        $services  = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $services;
    }
}