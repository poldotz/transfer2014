<?php



/**
 * This class defines the structure of the 'rate' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Dec  3 16:02:42 2014
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class RateTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.RateTableMap';

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
        $this->setName('rate');
        $this->setPhpName('Rate');
        $this->setClassname('Rate');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 20, null);
        $this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 100, null);
        $this->addColumn('DAY', 'Day', 'VARCHAR', true, 7, null);
        $this->addColumn('HOUR_FROM', 'HourFrom', 'TIME', true, null, null);
        $this->addColumn('HOUR_TO', 'HourTo', 'TIME', true, null, null);
        $this->addColumn('SURCHARGE', 'Surcharge', 'INTEGER', false, 3, null);
        $this->addColumn('REDUCED_PERCENTAGE', 'ReducedPercentage', 'INTEGER', false, 2, null);
        $this->addColumn('NOTE', 'Note', 'VARCHAR', false, 255, null);
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
        $this->addRelation('RateExtraRate', 'RateExtraRate', RelationMap::ONE_TO_MANY, array('id' => 'rate_id', ), null, null, 'RateExtraRates');
        $this->addRelation('CustomerRate', 'CustomerRate', RelationMap::ONE_TO_MANY, array('id' => 'rate_id', ), null, null, 'CustomerRates');
        $this->addRelation('RateVersion', 'RateVersion', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', null, 'RateVersions');
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

} // RateTableMap
