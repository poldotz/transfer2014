<?php



/**
 * Skeleton subclass for performing query and update operations on the 'departure' table.
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
class DeparturePeer extends BaseDeparturePeer
{

    public static function doSelectPager($page=1, $item_per_page = 10, Criteria $criteria = null)
    {
        if ($criteria === null)
        {
            $criteria = new Criteria();
        }
        $pager = new sfPropelPager('Departure', $item_per_page);
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

        $select = "(SELECT if(d.cancelled,'si','no') as 'Annullato', b.number, substr(d.hour    ,1,5) as 'hour', d.flight, substr(c.name, 1,22) as 'customer', substr(b.contact,1,22) as 'contact', concat(b.adult,'/',if(b.child,b.child,0)) as 'pax', concat(substr(locfrom.name,1,15),'/',substr(locto.name,1,15)) as 'route', substr(v.name,1,15) as 'vehicle_type',concat(driver.first_name,'/',substr(driver.last_name,1,1),'.') as 'driver', substr(p.name,1,2) as 'pay_method',substr(d.note,1,30) as 'note' ";
        $from = " FROM departure as d JOIN booking as b on (d.booking_id = b.id) ".
            " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
            " JOIN locality as locfrom on (d.locality_from = locfrom.id) ".
            " JOIN locality as locto ON (d.locality_to = locto.id) ".
            " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
            " LEFT JOIN sf_guard_user as driver on (d.driver_id = driver.id) ".
            " LEFT JOIN payment_method as p on (d.payment_method_id = p.id) ";
        $where = " WHERE d.day ='".$day."'".$customer_clause;
        $order_by = " ORDER BY d.hour, v.id, b.number)";

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

        $select = "(SELECT if(d.cancelled,'si','no') as 'Annullato', b.number, substr(d.hour    ,1,5) as 'hour', d.flight, substr(c.name, 1,22) as 'customer', substr(b.contact,1,22) as 'contact', concat(b.adult,'/',if(b.child,b.child,0)) as 'pax', concat(substr(locfrom.name,1,15),'/',substr(locto.name,1,15)) as 'route', substr(v.name,1,15) as 'vehicle_type',concat(driver.first_name,' ',substr(driver.last_name,1,1),'.') as 'driver', substr(p.name,1,2) as 'pay_method',substr(d.note,1,30) as 'note', d.id,b.year";
        $from = " FROM departure as d JOIN booking as b on (d.booking_id = b.id) ".
            " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
            " JOIN locality as locfrom on (d.locality_from = locfrom.id) ".
            " JOIN locality as locto ON (d.locality_to = locto.id) ".
            " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
            " LEFT JOIN sf_guard_user as driver on (d.driver_id = driver.id) ".
            " LEFT JOIN payment_method as p on (d.payment_method_id = p.id) ";
        $where = " WHERE d.day ='".$day."'".$customer_clause;
        $order_by = " ORDER BY d.hour, v.id, b.number)";

        $query = $select.$from.$where.$order_by;

        $statement = $con->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);


    }

}
