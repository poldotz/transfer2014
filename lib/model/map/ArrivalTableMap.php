<?php



/**
 * This class defines the structure of the 'arrival' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Thu 15 May 2014 03:03:17 PM CEST
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ArrivalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ArrivalTableMap';

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
        $this->setName('arrival');
        $this->setPhpName('Arrival');
        $this->setClassname('Arrival');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('BOOKING_ID', 'BookingId', 'INTEGER', 'booking', 'ID', true, null, null);
        $this->addColumn('DAY', 'Day', 'DATE', false, null, null);
        $this->addColumn('HOUR', 'Hour', 'TIME', false, null, null);
        $this->addColumn('FLIGHT', 'Flight', 'VARCHAR', false, 10, null);
        $this->addColumn('RATE_COST', 'RateCost', 'DECIMAL', false, 10, null);
        $this->addColumn('CALCULATED_COST', 'CalculatedCost', 'DECIMAL', false, 10, 0);
        $this->addColumn('RATE_NAME', 'RateName', 'VARCHAR', false, 20, null);
        $this->addColumn('NOTE', 'Note', 'VARCHAR', false, 100, null);
        $this->addForeignKey('PAYMENT_METHOD_ID', 'PaymentMethodId', 'INTEGER', 'payment_method', 'ID', false, null, null);
        $this->addForeignKey('LOCALITY_FROM', 'LocalityFrom', 'INTEGER', 'locality', 'ID', false, null, null);
        $this->addForeignKey('LOCALITY_TO', 'LocalityTo', 'INTEGER', 'locality', 'ID', false, null, null);
        $this->addForeignKey('DRIVER_ID', 'DriverId', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
        $this->addForeignKey('VEHICLE_ID', 'VehicleId', 'INTEGER', 'vehicle', 'ID', false, null, null);
        $this->addColumn('CANCELLED', 'Cancelled', 'BOOLEAN', false, 1, false);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('VERSION', 'Version', 'INTEGER', false, null, 0);
        $this->addColumn('VERSION_CREATED_AT', 'VersionCreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('VERSION_CREATED_BY', 'VersionCreatedBy', 'VARCHAR', false, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('LocalityRelatedByLocalityFrom', 'Locality', RelationMap::MANY_TO_ONE, array('locality_from' => 'id', ), null, 'CASCADE');
        $this->addRelation('LocalityRelatedByLocalityTo', 'Locality', RelationMap::MANY_TO_ONE, array('locality_to' => 'id', ), null, 'CASCADE');
        $this->addRelation('Booking', 'Booking', RelationMap::MANY_TO_ONE, array('booking_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('PaymentMethod', 'PaymentMethod', RelationMap::MANY_TO_ONE, array('payment_method_id' => 'id', ), null, null);
        $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('driver_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('Vehicle', 'Vehicle', RelationMap::MANY_TO_ONE, array('vehicle_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('ArrivalVersion', 'ArrivalVersion', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', null, 'ArrivalVersions');
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
            'Timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_updated_at' => 'false', ),
            'versionable' => array('version_column' => 'version', 'version_table' => '', 'log_created_at' => 'true', 'log_created_by' => 'true', 'log_comment' => 'false', 'version_created_at_column' => 'version_created_at', 'version_created_by_column' => 'version_created_by', 'version_comment_column' => 'version_comment', ),
            'archivable' => array('archive_table' => '', 'archive_phpname' => '', 'archive_class' => '', 'log_archived_at' => 'true', 'archived_at_column' => 'archived_at', 'archive_on_insert' => 'false', 'archive_on_update' => 'false', 'archive_on_delete' => 'true', ),
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
            'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

} // ArrivalTableMap
