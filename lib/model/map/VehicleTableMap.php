<?php



/**
 * This class defines the structure of the 'vehicle' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Thu 17 Apr 2014 03:28:10 PM CEST
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class VehicleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.VehicleTableMap';

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
        $this->setName('vehicle');
        $this->setPhpName('Vehicle');
        $this->setClassname('Vehicle');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('VEHICLE_TYPE_ID', 'VehicleTypeId', 'INTEGER', 'vehicle_type', 'ID', true, null, null);
        $this->addColumn('MODEL', 'Model', 'VARCHAR', true, 100, null);
        $this->addColumn('PLATE_NUMBER', 'PlateNumber', 'VARCHAR', false, 20, null);
        $this->addColumn('FRAME_NUMBER', 'FrameNumber', 'VARCHAR', false, 50, null);
        $this->addColumn('MILEAGE', 'Mileage', 'BIGINT', false, null, null);
        $this->addColumn('NOTE', 'Note', 'VARCHAR', false, 255, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('VehicleType', 'VehicleType', RelationMap::MANY_TO_ONE, array('vehicle_type_id' => 'id', ), 'CASCADE', null);
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
        );
    } // getBehaviors()

} // VehicleTableMap
