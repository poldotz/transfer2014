<?php



/**
 * This class defines the structure of the 'arrival_archive' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue 03 Jun 2014 03:49:26 PM CEST
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ArrivalArchiveTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ArrivalArchiveTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('arrival_archive');
        $this->setPhpName('ArrivalArchive');
        $this->setClassname('ArrivalArchive');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('BOOKING_ID', 'BookingId', 'INTEGER', true, null, null);
        $this->addColumn('DAY', 'Day', 'DATE', false, null, null);
        $this->addColumn('HOUR', 'Hour', 'TIME', false, null, null);
        $this->addColumn('FLIGHT', 'Flight', 'VARCHAR', false, 10, null);
        $this->addColumn('RATE_COST', 'RateCost', 'DECIMAL', false, 10, null);
        $this->addColumn('CALCULATED_COST', 'CalculatedCost', 'DECIMAL', false, 10, 0);
        $this->addColumn('RATE_NAME', 'RateName', 'VARCHAR', false, 20, null);
        $this->addColumn('NOTE', 'Note', 'VARCHAR', false, 100, null);
        $this->addColumn('PAYMENT_METHOD_ID', 'PaymentMethodId', 'INTEGER', false, null, null);
        $this->addColumn('LOCALITY_FROM', 'LocalityFrom', 'INTEGER', false, null, null);
        $this->addColumn('LOCALITY_TO', 'LocalityTo', 'INTEGER', false, null, null);
        $this->addColumn('DRIVER_ID', 'DriverId', 'INTEGER', false, null, null);
        $this->addColumn('VEHICLE_ID', 'VehicleId', 'INTEGER', false, null, null);
        $this->addColumn('CANCELLED', 'Cancelled', 'BOOLEAN', false, 1, false);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('ARCHIVED_AT', 'ArchivedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
            'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

} // ArrivalArchiveTableMap
