<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 09/05/14
 * Time: 0.28
 */


Class ServiceHostess {

    private static function getBookingClauses($conditions){
        $booking_clauses = "";
        foreach($conditions as $key => $condition){
            switch($key){
                case 'contact' :
                    isset($conditions['contact_off']) ? $contact_off = "NOT " : $contact_off = "";

                    $booking_clauses .= " AND b.contact ".$contact_off." like '%".preg_replace("/\s/i","%",$condition)."%'";
                    break;
                case 'rifFile' :
                    isset($conditions['rifFile_off']) ? $rifFile_off= "NOT " : $rifFile_off= "";

                    $booking_clauses .= " AND b.rif_file ".$rifFile_off." like '%".preg_replace("/\s/i","%",$condition)."%'";
                    break;
                case 'customer' :
                    isset($conditions['customer_off']) ? $customer_off= "NOT " : $customer_off= "";

                    $booking_clauses .= " AND c.name ".$customer_off." like '%".preg_replace("/\s/i","%",$condition)."%'";
                    break;
                case 'vehicle_type_id' :
                    isset($conditions['vehicle_type_id_off']) ? $vehicle_type_id_off= "!" : $vehicle_type_id_off= "";

                    $booking_clauses .= " AND b.vehicle_type_id ".$vehicle_type_id_off."= ".$condition;
                    break;
            }
        }
        return $booking_clauses;
    }

    private static function getArrivalServices($conditions,$booking_clauses){
        $select = "(SELECT concat(b.number,'/',b.year) as number, b.booking_date,c.name,b.contact,concat(b.adult,'/',if(b.child,b.child,0)) as 'pax',b.rif_file, 'Arrivo' as 'arrival' ";
        $from = " FROM arrival as a JOIN booking as b on (a.booking_id = b.id) ".
            " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
            " JOIN locality as locfrom on (a.locality_from = locfrom.id) ".
            " JOIN locality as locto ON (a.locality_to = locto.id) ".
            " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
            " LEFT JOIN sf_guard_user as driver on (a.driver_id = driver.id) ".
            " LEFT JOIN payment_method as p on (a.payment_method_id = p.id) ";
        $where = " WHERE a.cancelled = 0 ".$booking_clauses;

        foreach($conditions as $key => $condition){
            switch($key ){
                case 'date_range' :
                    $arrival_clauses = " AND a.day between '".$condition['from']. "' AND '".$condition['to']."'";
                    break;
                case 'locality':
                    isset($conditions['locality_off']) ? $locality_off = "NOT " : $locality_off = "";
                    $arrival_clauses .= " AND ( locto.name ".$locality_off." like '%".preg_replace("/\s/i","%",$condition)."%'  OR locfrom.name ".$locality_off." like '%".preg_replace("/\s/i","%",$condition)."%' )";
                    break;
                case 'driver_id':
                    isset($conditions['driver_id_off']) ? $driver_id_off= "!" : $driver_id_off= "";

                    $arrival_clauses .= " AND a.driver_id ".$driver_id_off."= ".$condition;
                    break;
            }
        }
        $where .= $arrival_clauses;
        $order_by = " ORDER BY b.booking_date, b.number) as a ";
        $queryArrivals = $select.$from.$where.$order_by;

        return $queryArrivals;
    }

    private static function getDepartureServices($conditions,$booking_clauses){

        $select = "(SELECT concat(b.number,'/',b.year) as number, b.booking_date,c.name,b.contact,concat(b.adult,'/',if(b.child,b.child,0)) as 'pax',b.rif_file, if(locto.is_vector,'Partenza','Taxi') as 'services' ";
        $from = " FROM departure as d JOIN booking as b on (d.booking_id = b.id) ".
            " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
            " JOIN locality as locfrom on (d.locality_from = locfrom.id) ".
            " JOIN locality as locto ON (d.locality_to = locto.id) ".
            " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
            " LEFT JOIN sf_guard_user as driver on (d.driver_id = driver.id) ".
            " LEFT JOIN payment_method as p on (d.payment_method_id = p.id) ";
        $where = " WHERE d.cancelled = 0 ";

        foreach($conditions as $key => $condition){
            switch($key){
                case 'date_range' :
                    $departure_clauses = " AND d.day between '".$condition['from']. "' AND '".$condition['to']."'";
                    break;
                case 'locality':
                    isset($conditions['locality_off']) ? $locality_off = "NOT " : $locality_off = "";
                    $departure_clauses .= " AND ( locto.name ".$locality_off." like '%".preg_replace("/\s/i","%",$condition)."%'  OR locfrom.name ".$locality_off." like '%".preg_replace("/\s/i","%",$condition)."%' )";
                    break;
                case 'driver_id':
                    isset($conditions['driver_id_off']) ? $driver_id_off= "!" : $driver_id_off= "";

                    $departure_clauses .= " AND d.driver_id ".$driver_id_off."= ".$condition;
                    break;
            }
        }
        $where .= $departure_clauses;
        $order_by = " ORDER BY b.booking_date, b.number) as d";
        $queryDepatures = $select.$from.$where.$order_by;

        return $queryDepatures;
    }

    public static  function getServices($conditions){

        $con = Propel::getConnection();
        $query = "SELECT * FROM ";
        $booking_clauses = self::getBookingClauses($conditions['booking']);

        if($conditions['transfer_type']){
            switch ($conditions['transfer_type']) {
                case 'arrival':
                    $query.=  self::getArrivalServices($conditions['transfer'],getBookingClauses);
                    break;
                case 'departure':
                    $query.=  self::getDepartureServices($conditions['transfer'],getBookingClauses);
                    break;
            }
        }
        else{
            $query .= self::getArrivalServices($conditions['transfer'],$booking_clauses);
            $query .= " UNION ALL SELECT * FROM ";
            $query .=  self::getDepartureServices($conditions['transfer'],$booking_clauses);
        }

        $query .= " ORDER BY  booking_date,number;";

        $statement = $con->prepare($query);
        $statement->execute();
        $services  = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $services;
    }
}