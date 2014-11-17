<?php



/**
 * This class defines the structure of the 'booking' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon Nov 17 17:31:37 2014
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class BookingTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.BookingTableMap';

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
        $this->setName('booking');
        $this->setPhpName('Booking');
        $this->setClassname('Booking');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('BOOKING_DATE', 'BookingDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('YEAR', 'Year', 'INTEGER', true, 4, null);
        $this->addColumn('NUMBER', 'Number', 'INTEGER', true, 12, null);
        $this->addColumn('ADULT', 'Adult', 'INTEGER', true, 4, null);
        $this->addColumn('REDUCED', 'Reduced', 'INTEGER', false, 2, null);
        $this->addColumn('CHILD', 'Child', 'INTEGER', false, 4, 0);
        $this->addColumn('CONTACT', 'Contact', 'VARCHAR', false, 100, null);
        $this->addColumn('RIF_FILE', 'RifFile', 'VARCHAR', false, 20, null);
        $this->addForeignKey('CUSTOMER_ID', 'CustomerId', 'INTEGER', 'sf_guard_user_profile', 'ID', true, null, null);
        $this->addForeignKey('VEHICLE_TYPE_ID', 'VehicleTypeId', 'INTEGER', 'vehicle_type', 'ID', true, null, null);
        $this->addColumn('IS_CONFIRMED', 'IsConfirmed', 'BOOLEAN', true, 1, false);
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
        $this->addRelation('Customer', 'Customer', RelationMap::MANY_TO_ONE, array('customer_id' => 'id', ), null, null);
        $this->addRelation('VehicleType', 'VehicleType', RelationMap::MANY_TO_ONE, array('vehicle_type_id' => 'id', ), null, null);
        $this->addRelation('Arrival', 'Arrival', RelationMap::ONE_TO_MANY, array('id' => 'booking_id', ), 'CASCADE', 'CASCADE', 'Arrivals');
        $this->addRelation('Departure', 'Departure', RelationMap::ONE_TO_MANY, array('id' => 'booking_id', ), 'CASCADE', 'CASCADE', 'Departures');
        $this->addRelation('BookingVersion', 'BookingVersion', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', null, 'BookingVersions');
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
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
            'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

} // BookingTableMap
