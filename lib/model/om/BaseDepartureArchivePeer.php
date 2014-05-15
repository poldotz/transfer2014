<?php


/**
 * Base static class for performing query and update operations on the 'departure_archive' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Thu 15 May 2014 03:03:17 PM CEST
 *
 * @package propel.generator.lib.model.om
 */
abstract class BaseDepartureArchivePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'departure_archive';

    /** the related Propel class for this table */
    const OM_CLASS = 'DepartureArchive';

    /** the related TableMap class for this table */
    const TM_CLASS = 'DepartureArchiveTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 20;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 20;

    /** the column name for the ID field */
    const ID = 'departure_archive.ID';

    /** the column name for the BOOKING_ID field */
    const BOOKING_ID = 'departure_archive.BOOKING_ID';

    /** the column name for the DAY field */
    const DAY = 'departure_archive.DAY';

    /** the column name for the HOUR field */
    const HOUR = 'departure_archive.HOUR';

    /** the column name for the PICK_UP field */
    const PICK_UP = 'departure_archive.PICK_UP';

    /** the column name for the DEPARTURE_TIME field */
    const DEPARTURE_TIME = 'departure_archive.DEPARTURE_TIME';

    /** the column name for the FLIGHT field */
    const FLIGHT = 'departure_archive.FLIGHT';

    /** the column name for the RATE_COST field */
    const RATE_COST = 'departure_archive.RATE_COST';

    /** the column name for the CALCULATED_COST field */
    const CALCULATED_COST = 'departure_archive.CALCULATED_COST';

    /** the column name for the RATE_NAME field */
    const RATE_NAME = 'departure_archive.RATE_NAME';

    /** the column name for the NOTE field */
    const NOTE = 'departure_archive.NOTE';

    /** the column name for the PAYMENT_METHOD_ID field */
    const PAYMENT_METHOD_ID = 'departure_archive.PAYMENT_METHOD_ID';

    /** the column name for the LOCALITY_FROM field */
    const LOCALITY_FROM = 'departure_archive.LOCALITY_FROM';

    /** the column name for the LOCALITY_TO field */
    const LOCALITY_TO = 'departure_archive.LOCALITY_TO';

    /** the column name for the DRIVER_ID field */
    const DRIVER_ID = 'departure_archive.DRIVER_ID';

    /** the column name for the VEHICLE_ID field */
    const VEHICLE_ID = 'departure_archive.VEHICLE_ID';

    /** the column name for the CANCELLED field */
    const CANCELLED = 'departure_archive.CANCELLED';

    /** the column name for the CREATED_AT field */
    const CREATED_AT = 'departure_archive.CREATED_AT';

    /** the column name for the UPDATED_AT field */
    const UPDATED_AT = 'departure_archive.UPDATED_AT';

    /** the column name for the ARCHIVED_AT field */
    const ARCHIVED_AT = 'departure_archive.ARCHIVED_AT';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of DepartureArchive objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array DepartureArchive[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. DepartureArchivePeer::$fieldNames[DepartureArchivePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'BookingId', 'Day', 'Hour', 'PickUp', 'DepartureTime', 'Flight', 'RateCost', 'CalculatedCost', 'RateName', 'Note', 'PaymentMethodId', 'LocalityFrom', 'LocalityTo', 'DriverId', 'VehicleId', 'Cancelled', 'CreatedAt', 'UpdatedAt', 'ArchivedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'bookingId', 'day', 'hour', 'pickUp', 'departureTime', 'flight', 'rateCost', 'calculatedCost', 'rateName', 'note', 'paymentMethodId', 'localityFrom', 'localityTo', 'driverId', 'vehicleId', 'cancelled', 'createdAt', 'updatedAt', 'archivedAt', ),
        BasePeer::TYPE_COLNAME => array (DepartureArchivePeer::ID, DepartureArchivePeer::BOOKING_ID, DepartureArchivePeer::DAY, DepartureArchivePeer::HOUR, DepartureArchivePeer::PICK_UP, DepartureArchivePeer::DEPARTURE_TIME, DepartureArchivePeer::FLIGHT, DepartureArchivePeer::RATE_COST, DepartureArchivePeer::CALCULATED_COST, DepartureArchivePeer::RATE_NAME, DepartureArchivePeer::NOTE, DepartureArchivePeer::PAYMENT_METHOD_ID, DepartureArchivePeer::LOCALITY_FROM, DepartureArchivePeer::LOCALITY_TO, DepartureArchivePeer::DRIVER_ID, DepartureArchivePeer::VEHICLE_ID, DepartureArchivePeer::CANCELLED, DepartureArchivePeer::CREATED_AT, DepartureArchivePeer::UPDATED_AT, DepartureArchivePeer::ARCHIVED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'BOOKING_ID', 'DAY', 'HOUR', 'PICK_UP', 'DEPARTURE_TIME', 'FLIGHT', 'RATE_COST', 'CALCULATED_COST', 'RATE_NAME', 'NOTE', 'PAYMENT_METHOD_ID', 'LOCALITY_FROM', 'LOCALITY_TO', 'DRIVER_ID', 'VEHICLE_ID', 'CANCELLED', 'CREATED_AT', 'UPDATED_AT', 'ARCHIVED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'booking_id', 'day', 'hour', 'pick_up', 'departure_time', 'flight', 'rate_cost', 'calculated_cost', 'rate_name', 'note', 'payment_method_id', 'locality_from', 'locality_to', 'driver_id', 'vehicle_id', 'cancelled', 'created_at', 'updated_at', 'archived_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. DepartureArchivePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'BookingId' => 1, 'Day' => 2, 'Hour' => 3, 'PickUp' => 4, 'DepartureTime' => 5, 'Flight' => 6, 'RateCost' => 7, 'CalculatedCost' => 8, 'RateName' => 9, 'Note' => 10, 'PaymentMethodId' => 11, 'LocalityFrom' => 12, 'LocalityTo' => 13, 'DriverId' => 14, 'VehicleId' => 15, 'Cancelled' => 16, 'CreatedAt' => 17, 'UpdatedAt' => 18, 'ArchivedAt' => 19, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'bookingId' => 1, 'day' => 2, 'hour' => 3, 'pickUp' => 4, 'departureTime' => 5, 'flight' => 6, 'rateCost' => 7, 'calculatedCost' => 8, 'rateName' => 9, 'note' => 10, 'paymentMethodId' => 11, 'localityFrom' => 12, 'localityTo' => 13, 'driverId' => 14, 'vehicleId' => 15, 'cancelled' => 16, 'createdAt' => 17, 'updatedAt' => 18, 'archivedAt' => 19, ),
        BasePeer::TYPE_COLNAME => array (DepartureArchivePeer::ID => 0, DepartureArchivePeer::BOOKING_ID => 1, DepartureArchivePeer::DAY => 2, DepartureArchivePeer::HOUR => 3, DepartureArchivePeer::PICK_UP => 4, DepartureArchivePeer::DEPARTURE_TIME => 5, DepartureArchivePeer::FLIGHT => 6, DepartureArchivePeer::RATE_COST => 7, DepartureArchivePeer::CALCULATED_COST => 8, DepartureArchivePeer::RATE_NAME => 9, DepartureArchivePeer::NOTE => 10, DepartureArchivePeer::PAYMENT_METHOD_ID => 11, DepartureArchivePeer::LOCALITY_FROM => 12, DepartureArchivePeer::LOCALITY_TO => 13, DepartureArchivePeer::DRIVER_ID => 14, DepartureArchivePeer::VEHICLE_ID => 15, DepartureArchivePeer::CANCELLED => 16, DepartureArchivePeer::CREATED_AT => 17, DepartureArchivePeer::UPDATED_AT => 18, DepartureArchivePeer::ARCHIVED_AT => 19, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'BOOKING_ID' => 1, 'DAY' => 2, 'HOUR' => 3, 'PICK_UP' => 4, 'DEPARTURE_TIME' => 5, 'FLIGHT' => 6, 'RATE_COST' => 7, 'CALCULATED_COST' => 8, 'RATE_NAME' => 9, 'NOTE' => 10, 'PAYMENT_METHOD_ID' => 11, 'LOCALITY_FROM' => 12, 'LOCALITY_TO' => 13, 'DRIVER_ID' => 14, 'VEHICLE_ID' => 15, 'CANCELLED' => 16, 'CREATED_AT' => 17, 'UPDATED_AT' => 18, 'ARCHIVED_AT' => 19, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'booking_id' => 1, 'day' => 2, 'hour' => 3, 'pick_up' => 4, 'departure_time' => 5, 'flight' => 6, 'rate_cost' => 7, 'calculated_cost' => 8, 'rate_name' => 9, 'note' => 10, 'payment_method_id' => 11, 'locality_from' => 12, 'locality_to' => 13, 'driver_id' => 14, 'vehicle_id' => 15, 'cancelled' => 16, 'created_at' => 17, 'updated_at' => 18, 'archived_at' => 19, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = DepartureArchivePeer::getFieldNames($toType);
        $key = isset(DepartureArchivePeer::$fieldKeys[$fromType][$name]) ? DepartureArchivePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(DepartureArchivePeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, DepartureArchivePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return DepartureArchivePeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. DepartureArchivePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(DepartureArchivePeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(DepartureArchivePeer::ID);
            $criteria->addSelectColumn(DepartureArchivePeer::BOOKING_ID);
            $criteria->addSelectColumn(DepartureArchivePeer::DAY);
            $criteria->addSelectColumn(DepartureArchivePeer::HOUR);
            $criteria->addSelectColumn(DepartureArchivePeer::PICK_UP);
            $criteria->addSelectColumn(DepartureArchivePeer::DEPARTURE_TIME);
            $criteria->addSelectColumn(DepartureArchivePeer::FLIGHT);
            $criteria->addSelectColumn(DepartureArchivePeer::RATE_COST);
            $criteria->addSelectColumn(DepartureArchivePeer::CALCULATED_COST);
            $criteria->addSelectColumn(DepartureArchivePeer::RATE_NAME);
            $criteria->addSelectColumn(DepartureArchivePeer::NOTE);
            $criteria->addSelectColumn(DepartureArchivePeer::PAYMENT_METHOD_ID);
            $criteria->addSelectColumn(DepartureArchivePeer::LOCALITY_FROM);
            $criteria->addSelectColumn(DepartureArchivePeer::LOCALITY_TO);
            $criteria->addSelectColumn(DepartureArchivePeer::DRIVER_ID);
            $criteria->addSelectColumn(DepartureArchivePeer::VEHICLE_ID);
            $criteria->addSelectColumn(DepartureArchivePeer::CANCELLED);
            $criteria->addSelectColumn(DepartureArchivePeer::CREATED_AT);
            $criteria->addSelectColumn(DepartureArchivePeer::UPDATED_AT);
            $criteria->addSelectColumn(DepartureArchivePeer::ARCHIVED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.BOOKING_ID');
            $criteria->addSelectColumn($alias . '.DAY');
            $criteria->addSelectColumn($alias . '.HOUR');
            $criteria->addSelectColumn($alias . '.PICK_UP');
            $criteria->addSelectColumn($alias . '.DEPARTURE_TIME');
            $criteria->addSelectColumn($alias . '.FLIGHT');
            $criteria->addSelectColumn($alias . '.RATE_COST');
            $criteria->addSelectColumn($alias . '.CALCULATED_COST');
            $criteria->addSelectColumn($alias . '.RATE_NAME');
            $criteria->addSelectColumn($alias . '.NOTE');
            $criteria->addSelectColumn($alias . '.PAYMENT_METHOD_ID');
            $criteria->addSelectColumn($alias . '.LOCALITY_FROM');
            $criteria->addSelectColumn($alias . '.LOCALITY_TO');
            $criteria->addSelectColumn($alias . '.DRIVER_ID');
            $criteria->addSelectColumn($alias . '.VEHICLE_ID');
            $criteria->addSelectColumn($alias . '.CANCELLED');
            $criteria->addSelectColumn($alias . '.CREATED_AT');
            $criteria->addSelectColumn($alias . '.UPDATED_AT');
            $criteria->addSelectColumn($alias . '.ARCHIVED_AT');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(DepartureArchivePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            DepartureArchivePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(DepartureArchivePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(DepartureArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseDepartureArchivePeer', $criteria, $con);
        }

        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 DepartureArchive
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = DepartureArchivePeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return DepartureArchivePeer::populateObjects(DepartureArchivePeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement durirectly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DepartureArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            DepartureArchivePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(DepartureArchivePeer::DATABASE_NAME);
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseDepartureArchivePeer', $criteria, $con);
        }


        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      DepartureArchive $obj A DepartureArchive object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            DepartureArchivePeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A DepartureArchive object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof DepartureArchive) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DepartureArchive object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(DepartureArchivePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   DepartureArchive Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(DepartureArchivePeer::$instances[$key])) {
                return DepartureArchivePeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool()
    {
        DepartureArchivePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to departure_archive
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = DepartureArchivePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = DepartureArchivePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = DepartureArchivePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DepartureArchivePeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (DepartureArchive object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = DepartureArchivePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = DepartureArchivePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + DepartureArchivePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DepartureArchivePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            DepartureArchivePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(DepartureArchivePeer::DATABASE_NAME)->getTable(DepartureArchivePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseDepartureArchivePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseDepartureArchivePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new DepartureArchiveTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return DepartureArchivePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a DepartureArchive or Criteria object.
     *
     * @param      mixed $values Criteria or DepartureArchive object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DepartureArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from DepartureArchive object
        }


        // Set the correct dbName
        $criteria->setDbName(DepartureArchivePeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a DepartureArchive or Criteria object.
     *
     * @param      mixed $values Criteria or DepartureArchive object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DepartureArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(DepartureArchivePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(DepartureArchivePeer::ID);
            $value = $criteria->remove(DepartureArchivePeer::ID);
            if ($value) {
                $selectCriteria->add(DepartureArchivePeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(DepartureArchivePeer::TABLE_NAME);
            }

        } else { // $values is DepartureArchive object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(DepartureArchivePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the departure_archive table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DepartureArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(DepartureArchivePeer::TABLE_NAME, $con, DepartureArchivePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DepartureArchivePeer::clearInstancePool();
            DepartureArchivePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a DepartureArchive or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or DepartureArchive object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(DepartureArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            DepartureArchivePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof DepartureArchive) { // it's a model object
            // invalidate the cache for this single object
            DepartureArchivePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DepartureArchivePeer::DATABASE_NAME);
            $criteria->add(DepartureArchivePeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                DepartureArchivePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(DepartureArchivePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            DepartureArchivePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given DepartureArchive object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      DepartureArchive $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(DepartureArchivePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(DepartureArchivePeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(DepartureArchivePeer::DATABASE_NAME, DepartureArchivePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return DepartureArchive
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = DepartureArchivePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(DepartureArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(DepartureArchivePeer::DATABASE_NAME);
        $criteria->add(DepartureArchivePeer::ID, $pk);

        $v = DepartureArchivePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return DepartureArchive[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(DepartureArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(DepartureArchivePeer::DATABASE_NAME);
            $criteria->add(DepartureArchivePeer::ID, $pks, Criteria::IN);
            $objs = DepartureArchivePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

    // symfony behavior

    /**
     * Returns an array of arrays that contain columns in each unique index.
     *
     * @return array
     */
    static public function getUniqueColumnNames()
    {
      return array();
    }

    // symfony_behaviors behavior

    /**
     * Returns the name of the hook to call from inside the supplied method.
     *
     * @param string $method The calling method
     *
     * @return string A hook name for {@link sfMixer}
     *
     * @throws LogicException If the method name is not recognized
     */
    static private function getMixerPreSelectHook($method)
    {
      if (preg_match('/^do(Select|Count)(Join(All(Except)?)?|Stmt)?/', $method, $match))
      {
        return sprintf('BaseDepartureArchivePeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
      }

      throw new LogicException(sprintf('Unrecognized function "%s"', $method));
    }

} // BaseDepartureArchivePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseDepartureArchivePeer::buildTableMap();

