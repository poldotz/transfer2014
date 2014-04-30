<?php



/**
 * This class defines the structure of the 'airport' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Apr 30 12:00:19 2014
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class AirportTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.AirportTableMap';

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
        $this->setName('airport');
        $this->setPhpName('Airport');
        $this->setClassname('Airport');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('CODE', 'Code', 'VARCHAR', true, 5, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, null);
        $this->addColumn('CITY', 'City', 'VARCHAR', true, 100, null);
        $this->addColumn('COUNTRY', 'Country', 'VARCHAR', true, 100, null);
        $this->addColumn('LAT', 'Lat', 'DOUBLE', true, 10, null);
        $this->addColumn('LNG', 'Lng', 'DOUBLE', true, 10, null);
        $this->addColumn('TIMEZONE', 'Timezone', 'VARCHAR', true, 100, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
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
            'Timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_updated_at' => 'false', ),
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
            'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

} // AirportTableMap
