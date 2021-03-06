<?php



/**
 * This class defines the structure of the 'locality' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sat Dec  6 11:52:05 2014
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class LocalityTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.LocalityTableMap';

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
        $this->setName('locality');
        $this->setPhpName('Locality');
        $this->setClassname('Locality');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
        $this->addColumn('IS_VECTOR', 'IsVector', 'BOOLEAN', true, 1, false);
        $this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', true, 1, true);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 200, null);
        $this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 20, null);
        $this->addColumn('FAX', 'Fax', 'VARCHAR', false, 20, null);
        $this->addColumn('MOBILE', 'Mobile', 'VARCHAR', false, 20, null);
        $this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 100, null);
        $this->addColumn('SITE', 'Site', 'VARCHAR', false, 150, null);
        $this->addColumn('FORMATTED_ADDRESS', 'FormattedAddress', 'VARCHAR', true, 150, null);
        $this->addColumn('LATITUDE', 'Latitude', 'DOUBLE', false, 10, null);
        $this->addColumn('LONGITUDE', 'Longitude', 'DOUBLE', false, 10, null);
        $this->addForeignKey('AREA_ID', 'AreaId', 'INTEGER', 'area', 'ID', true, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Area', 'Area', RelationMap::MANY_TO_ONE, array('area_id' => 'id', ), null, null);
        $this->addRelation('RouteRelatedByLocalityFrom', 'Route', RelationMap::ONE_TO_MANY, array('id' => 'locality_from', ), 'CASCADE', 'CASCADE', 'RoutesRelatedByLocalityFrom');
        $this->addRelation('RouteRelatedByLocalityTo', 'Route', RelationMap::ONE_TO_MANY, array('id' => 'locality_to', ), 'CASCADE', 'CASCADE', 'RoutesRelatedByLocalityTo');
        $this->addRelation('ArrivalRelatedByLocalityFrom', 'Arrival', RelationMap::ONE_TO_MANY, array('id' => 'locality_from', ), null, 'CASCADE', 'ArrivalsRelatedByLocalityFrom');
        $this->addRelation('ArrivalRelatedByLocalityTo', 'Arrival', RelationMap::ONE_TO_MANY, array('id' => 'locality_to', ), null, 'CASCADE', 'ArrivalsRelatedByLocalityTo');
        $this->addRelation('DepartureRelatedByLocalityFrom', 'Departure', RelationMap::ONE_TO_MANY, array('id' => 'locality_from', ), null, 'CASCADE', 'DeparturesRelatedByLocalityFrom');
        $this->addRelation('DepartureRelatedByLocalityTo', 'Departure', RelationMap::ONE_TO_MANY, array('id' => 'locality_to', ), null, 'CASCADE', 'DeparturesRelatedByLocalityTo');
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

} // LocalityTableMap
