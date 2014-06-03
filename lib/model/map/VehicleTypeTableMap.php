<?php



/**
 * This class defines the structure of the 'vehicle_type' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue 03 Jun 2014 03:49:25 PM CEST
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class VehicleTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.VehicleTypeTableMap';

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
        $this->setName('vehicle_type');
        $this->setPhpName('VehicleType');
        $this->setClassname('VehicleType');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Vehicle', 'Vehicle', RelationMap::ONE_TO_MANY, array('id' => 'vehicle_type_id', ), 'CASCADE', null, 'Vehicles');
        $this->addRelation('CustomerRateTable', 'CustomerRateTable', RelationMap::ONE_TO_MANY, array('id' => 'vehicle_type_id', ), 'CASCADE', 'CASCADE', 'CustomerRateTables');
        $this->addRelation('Booking', 'Booking', RelationMap::ONE_TO_MANY, array('id' => 'vehicle_type_id', ), null, null, 'Bookings');
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
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
            'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

} // VehicleTypeTableMap
