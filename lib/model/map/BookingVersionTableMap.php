<?php



/**
 * This class defines the structure of the 'booking_version' table.
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
class BookingVersionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.BookingVersionTableMap';

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
        $this->setName('booking_version');
        $this->setPhpName('BookingVersion');
        $this->setClassname('BookingVersion');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'booking', 'ID', true, null, null);
        $this->addColumn('BOOKING_DATE', 'BookingDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('YEAR', 'Year', 'INTEGER', true, 4, null);
        $this->addColumn('NUMBER', 'Number', 'INTEGER', true, 12, null);
        $this->addColumn('ADULT', 'Adult', 'INTEGER', true, 4, null);
        $this->addColumn('CHILD', 'Child', 'INTEGER', false, 4, 0);
        $this->addColumn('CONTACT', 'Contact', 'VARCHAR', false, 100, null);
        $this->addColumn('RIF_FILE', 'RifFile', 'VARCHAR', false, 20, null);
        $this->addColumn('CUSTOMER_ID', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('VEHICLE_TYPE_ID', 'VehicleTypeId', 'INTEGER', true, null, null);
        $this->addColumn('IS_CONFIRMED', 'IsConfirmed', 'BOOLEAN', true, 1, false);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addPrimaryKey('VERSION', 'Version', 'INTEGER', true, null, 0);
        $this->addColumn('VERSION_CREATED_AT', 'VersionCreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('VERSION_CREATED_BY', 'VersionCreatedBy', 'VARCHAR', false, 100, null);
        $this->addColumn('ARRIVAL_IDS', 'ArrivalIds', 'ARRAY', false, null, null);
        $this->addColumn('ARRIVAL_VERSIONS', 'ArrivalVersions', 'ARRAY', false, null, null);
        $this->addColumn('DEPARTURE_IDS', 'DepartureIds', 'ARRAY', false, null, null);
        $this->addColumn('DEPARTURE_VERSIONS', 'DepartureVersions', 'ARRAY', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Booking', 'Booking', RelationMap::MANY_TO_ONE, array('id' => 'id', ), 'CASCADE', null);
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

} // BookingVersionTableMap
