<?php



/**
 * This class defines the structure of the 'customer_rate_table' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Oct 22 14:16:39 2014
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class CustomerRateTableTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.CustomerRateTableTableMap';

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
        $this->setName('customer_rate_table');
        $this->setPhpName('CustomerRateTable');
        $this->setClassname('CustomerRateTable');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('CUSTOMER_ID', 'CustomerId', 'INTEGER', 'sf_guard_user_profile', 'ID', true, null, null);
        $this->addForeignKey('RATE_ID', 'RateId', 'INTEGER', 'rate', 'ID', true, null, null);
        $this->addForeignKey('VEHICLE_TYPE_ID', 'VehicleTypeId', 'INTEGER', 'vehicle_type', 'ID', true, null, null);
        $this->addColumn('COST', 'Cost', 'DECIMAL', true, 10, 0);
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
        $this->addRelation('Rate', 'Rate', RelationMap::MANY_TO_ONE, array('rate_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Customer', 'Customer', RelationMap::MANY_TO_ONE, array('customer_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('VehicleType', 'VehicleType', RelationMap::MANY_TO_ONE, array('vehicle_type_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('CustomerRateTableVersion', 'CustomerRateTableVersion', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', null, 'CustomerRateTableVersions');
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

} // CustomerRateTableTableMap
