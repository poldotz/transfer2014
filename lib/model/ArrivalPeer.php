<?php



/**
 * Skeleton subclass for performing query and update operations on the 'arrival' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Thu Apr 24 18:51:37 2014
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class ArrivalPeer extends BaseArrivalPeer
{

    public static function doSelectPager($page=1, $item_per_page = 10, Criteria $criteria = null)
    {
        if ($criteria === null)
        {
            $criteria = new Criteria();
        }
        $pager = new sfPropelPager('Arrival', $item_per_page);
        $pager->setCriteria($criteria);
        $pager->setPage($page);
        $pager->setPeerMethod('doSelect');
        $pager->init();
        return $pager;
    }

    public static function getServicesByDay($day,$customer_id = null){

        $con = Propel::getConnection();

        $customer_clause = "";
        if($customer_id){
            $customer_clause = " and b.customer_id = ".$customer_id;
        }

        $select = "SELECT if(a.cancelled,'si','no') as 'Anullato', b.number, substr(a.hour,1,5) as 'hour', a.flight, substr(c.name, 1,15) as 'customer', substr(b.contact,1,15) as 'contact', concat(b.adult,'/',if(b.child,b.child,0)) as 'pax', concat(substr(locfrom.name,1,15),'/',substr(locto.name,1,15)) as 'route', v.name, concat(driver.first_name,'/',substr(driver.last_name,1,1),'.') as 'driver', p.name,a.note";
        $from = " FROM arrival as a JOIN booking as b on (a.booking_id = b.id) ".
            " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
            " JOIN locality as locfrom on (a.locality_from = locfrom.id) ".
            " JOIN locality as locto ON (a.locality_to = locto.id) ".
            " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
            " LEFT JOIN sf_guard_user as driver on (a.driver_id = driver.id) ".
            " LEFT JOIN payment_method as p on (a.payment_method_id = p.id) ";
        $where = " WHERE a.day ='".$day."'".$customer_clause;
        $order_by = " ORDER BY a.hour, v.id, b.number;";

        $query = $select.$from.$where.$order_by;

        $statement = $con->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_NUM);
    }
    public static function getDataByDay($day,$customer_id = null){

        $con = Propel::getConnection();

        $customer_clause = "";
        if($customer_id){
            $customer_clause = " and b.customer_id = ".$customer_id;
        }

        $select = "SELECT if(a.cancelled,'si','no') as 'Anullato', b.number, substr(a.hour,1,5) as 'hour', a.flight, substr(c.name, 1,15) as 'customer', substr(b.contact,1,15) as 'contact', concat(b.adult,'/',if(b.child,b.child,0)) as 'pax', concat(substr(locfrom.name,1,15),'/',substr(locto.name,1,15)) as 'route', v.name as 'vehicle_type', concat(driver.first_name,' ',substr(driver.last_name,1,1),'.') as 'driver', p.name,a.note,a.id,b.year";
        $from = " FROM arrival as a JOIN booking as b on (a.booking_id = b.id) ".
            " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
            " JOIN locality as locfrom on (a.locality_from = locfrom.id) ".
            " JOIN locality as locto ON (a.locality_to = locto.id) ".
            " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
            " LEFT JOIN sf_guard_user as driver on (a.driver_id = driver.id) ".
            " LEFT JOIN payment_method as p on (a.payment_method_id = p.id) ";
        $where = " WHERE a.day ='".$day."'".$customer_clause;
        $order_by = " ORDER BY a.hour, v.id, b.number;";

        $query = $select.$from.$where.$order_by;

        $statement = $con->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
