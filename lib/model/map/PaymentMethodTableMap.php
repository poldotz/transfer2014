<?php



/**
 * This class defines the structure of the 'payment_method' table.
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
class PaymentMethodTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.PaymentMethodTableMap';

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
        $this->setName('payment_method');
        $this->setPhpName('PaymentMethod');
        $this->setClassname('PaymentMethod');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, null);
        $this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', true, 1, true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Arrival', 'Arrival', RelationMap::ONE_TO_MANY, array('id' => 'payment_method_id', ), null, null, 'Arrivals');
        $this->addRelation('Departure', 'Departure', RelationMap::ONE_TO_MANY, array('id' => 'payment_method_id', ), null, null, 'Departures');
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
        );
    } // getBehaviors()

} // PaymentMethodTableMap
