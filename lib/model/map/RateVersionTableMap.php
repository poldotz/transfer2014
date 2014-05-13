<?php



/**
 * This class defines the structure of the 'rate_version' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue 13 May 2014 04:36:07 PM CEST
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class RateVersionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.RateVersionTableMap';

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
        $this->setName('rate_version');
        $this->setPhpName('RateVersion');
        $this->setClassname('RateVersion');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'rate', 'ID', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 20, null);
        $this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 100, null);
        $this->addColumn('DAY', 'Day', 'VARCHAR', true, 7, null);
        $this->addColumn('HOUR_FROM', 'HourFrom', 'TIME', true, null, null);
        $this->addColumn('HOUR_TO', 'HourTo', 'TIME', true, null, null);
        $this->addColumn('SURCHARGE', 'Surcharge', 'INTEGER', false, 3, null);
        $this->addColumn('PER_PERSON', 'PerPerson', 'BOOLEAN', false, 1, false);
        $this->addColumn('NOTE', 'Note', 'VARCHAR', false, 255, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addPrimaryKey('VERSION', 'Version', 'INTEGER', true, null, 0);
        $this->addColumn('VERSION_CREATED_AT', 'VersionCreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('VERSION_CREATED_BY', 'VersionCreatedBy', 'VARCHAR', false, 100, null);
        $this->addColumn('CUSTOMER_RATE_TABLE_IDS', 'CustomerRateTableIds', 'ARRAY', false, null, null);
        $this->addColumn('CUSTOMER_RATE_TABLE_VERSIONS', 'CustomerRateTableVersions', 'ARRAY', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rate', 'Rate', RelationMap::MANY_TO_ONE, array('id' => 'id', ), 'CASCADE', null);
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

} // RateVersionTableMap
