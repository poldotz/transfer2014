<?php



/**
 * This class defines the structure of the 'company' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Thu 15 May 2014 03:03:15 PM CEST
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class CompanyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.CompanyTableMap';

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
        $this->setName('company');
        $this->setPhpName('Company');
        $this->setClassname('Company');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, null);
        $this->addColumn('VAT_NUMBER', 'VatNumber', 'VARCHAR', true, 20, null);
        $this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 20, null);
        $this->addColumn('FAX', 'Fax', 'VARCHAR', false, 20, null);
        $this->addColumn('MOBILE', 'Mobile', 'VARCHAR', false, 20, null);
        $this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 100, null);
        $this->addColumn('SITE', 'Site', 'VARCHAR', false, 150, null);
        $this->addColumn('FORMATTED_ADDRESS', 'FormattedAddress', 'VARCHAR', false, 150, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('LATITUDE', 'Latitude', 'DOUBLE', false, 10, null);
        $this->addColumn('LONGITUDE', 'Longitude', 'DOUBLE', false, 10, null);
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
            'Geocodable' => array('auto_update' => 'true', 'latitude_column' => 'latitude', 'longitude_column' => 'longitude', 'type' => 'DOUBLE', 'size' => '10', 'scale' => '8', 'geocode_ip' => 'false', 'ip_column' => 'ip_address', 'geocode_address' => 'true', 'address_columns' => 'formatted_address', 'geocoder_provider' => '\Geocoder\Provider\GoogleMapsProvider', 'geocoder_adapter' => '\Geocoder\HttpAdapter\CurlHttpAdapter', 'geocoder_api_key' => 'AIzaSyDHe1uZEarjAj5pYie_sNwZsEqwLaeuUeY', 'geocoder_api_key_provider' => 'false', ),
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
            'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

} // CompanyTableMap
