<?php



/**
 * This class defines the structure of the 'arrival_version' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon 05 May 2014 05:58:08 PM CEST
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ArrivalVersionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ArrivalVersionTableMap';

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
        $this->setName('arrival_version');
        $this->setPhpName('ArrivalVersion');
        $this->setClassname('ArrivalVersion');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'arrival', 'ID', true, null, null);
        $this->addColumn('BOOKING_ID', 'BookingId', 'INTEGER', true, null, null);
        $this->addColumn('DAY', 'Day', 'DATE', false, null, null);
        $this->addColumn('HOUR', 'Hour', 'TIME', false, null, null);
        $this->addColumn('FLIGHT', 'Flight', 'VARCHAR', false, 10, null);
        $this->addColumn('COST', 'Cost', 'DECIMAL', false, 10, null);
        $this->addColumn('NOTE', 'Note', 'VARCHAR', false, 100, null);
        $this->addColumn('PAYMENT_METHOD_ID', 'PaymentMethodId', 'INTEGER', false, null, null);
        $this->addColumn('LOCALITY_FROM', 'LocalityFrom', 'INTEGER', false, null, null);
        $this->addColumn('LOCALITY_TO', 'LocalityTo', 'INTEGER', false, null, null);
        $this->addColumn('DRIVER_ID', 'DriverId', 'INTEGER', false, null, null);
        $this->addColumn('VEHICLE_ID', 'VehicleId', 'INTEGER', false, null, null);
        $this->addColumn('CANCELLED', 'Cancelled', 'BOOLEAN', false, 1, false);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addPrimaryKey('VERSION', 'Version', 'INTEGER', true, null, 0);
        $this->addColumn('VERSION_CREATED_AT', 'VersionCreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('VERSION_CREATED_BY', 'VersionCreatedBy', 'VARCHAR', false, 100, null);
        $this->addColumn('BOOKING_ID_VERSION', 'BookingIdVersion', 'INTEGER', false, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Arrival', 'Arrival', RelationMap::MANY_TO_ONE, array('id' => 'id', ), 'CASCADE', null);
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

} // ArrivalVersionTableMap
