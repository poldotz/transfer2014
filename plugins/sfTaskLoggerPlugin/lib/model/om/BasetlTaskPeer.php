<?php


/**
 * Base static class for performing query and update operations on the 'tl_tasks' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sun Nov 16 08:50:32 2014
 *
 * @package propel.generator.plugins.sfTaskLoggerPlugin.lib.model.om
 */
abstract class BasetlTaskPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'tl_tasks';

    /** the related Propel class for this table */
    const OM_CLASS = 'tlTask';

    /** the related TableMap class for this table */
    const TM_CLASS = 'tlTaskTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 17;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 17;

    /** the column name for the ID field */
    const ID = 'tl_tasks.ID';

    /** the column name for the TASK field */
    const TASK = 'tl_tasks.TASK';

    /** the column name for the ARGUMENTS field */
    const ARGUMENTS = 'tl_tasks.ARGUMENTS';

    /** the column name for the OPTIONS field */
    const OPTIONS = 'tl_tasks.OPTIONS';

    /** the column name for the COUNT_PROCESSED field */
    const COUNT_PROCESSED = 'tl_tasks.COUNT_PROCESSED';

    /** the column name for the COUNT_NOT_PROCESSED field */
    const COUNT_NOT_PROCESSED = 'tl_tasks.COUNT_NOT_PROCESSED';

    /** the column name for the IS_RUNNING field */
    const IS_RUNNING = 'tl_tasks.IS_RUNNING';

    /** the column name for the LAST_ID_PROCESSED field */
    const LAST_ID_PROCESSED = 'tl_tasks.LAST_ID_PROCESSED';

    /** the column name for the STARTED_AT field */
    const STARTED_AT = 'tl_tasks.STARTED_AT';

    /** the column name for the ENDED_AT field */
    const ENDED_AT = 'tl_tasks.ENDED_AT';

    /** the column name for the IS_OK field */
    const IS_OK = 'tl_tasks.IS_OK';

    /** the column name for the ERROR_CODE field */
    const ERROR_CODE = 'tl_tasks.ERROR_CODE';

    /** the column name for the LOG field */
    const LOG = 'tl_tasks.LOG';

    /** the column name for the LOG_FILE field */
    const LOG_FILE = 'tl_tasks.LOG_FILE';

    /** the column name for the COMMENTS field */
    const COMMENTS = 'tl_tasks.COMMENTS';

    /** the column name for the CREATED_AT field */
    const CREATED_AT = 'tl_tasks.CREATED_AT';

    /** the column name for the UPDATED_AT field */
    const UPDATED_AT = 'tl_tasks.UPDATED_AT';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of tlTask objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array tlTask[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. tlTaskPeer::$fieldNames[tlTaskPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Task', 'Arguments', 'Options', 'CountProcessed', 'CountNotProcessed', 'IsRunning', 'LastIdProcessed', 'StartedAt', 'EndedAt', 'IsOk', 'ErrorCode', 'Log', 'LogFile', 'Comments', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'task', 'arguments', 'options', 'countProcessed', 'countNotProcessed', 'isRunning', 'lastIdProcessed', 'startedAt', 'endedAt', 'isOk', 'errorCode', 'log', 'logFile', 'comments', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (tlTaskPeer::ID, tlTaskPeer::TASK, tlTaskPeer::ARGUMENTS, tlTaskPeer::OPTIONS, tlTaskPeer::COUNT_PROCESSED, tlTaskPeer::COUNT_NOT_PROCESSED, tlTaskPeer::IS_RUNNING, tlTaskPeer::LAST_ID_PROCESSED, tlTaskPeer::STARTED_AT, tlTaskPeer::ENDED_AT, tlTaskPeer::IS_OK, tlTaskPeer::ERROR_CODE, tlTaskPeer::LOG, tlTaskPeer::LOG_FILE, tlTaskPeer::COMMENTS, tlTaskPeer::CREATED_AT, tlTaskPeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'TASK', 'ARGUMENTS', 'OPTIONS', 'COUNT_PROCESSED', 'COUNT_NOT_PROCESSED', 'IS_RUNNING', 'LAST_ID_PROCESSED', 'STARTED_AT', 'ENDED_AT', 'IS_OK', 'ERROR_CODE', 'LOG', 'LOG_FILE', 'COMMENTS', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'task', 'arguments', 'options', 'count_processed', 'count_not_processed', 'is_running', 'last_id_processed', 'started_at', 'ended_at', 'is_ok', 'error_code', 'log', 'log_file', 'comments', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. tlTaskPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Task' => 1, 'Arguments' => 2, 'Options' => 3, 'CountProcessed' => 4, 'CountNotProcessed' => 5, 'IsRunning' => 6, 'LastIdProcessed' => 7, 'StartedAt' => 8, 'EndedAt' => 9, 'IsOk' => 10, 'ErrorCode' => 11, 'Log' => 12, 'LogFile' => 13, 'Comments' => 14, 'CreatedAt' => 15, 'UpdatedAt' => 16, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'task' => 1, 'arguments' => 2, 'options' => 3, 'countProcessed' => 4, 'countNotProcessed' => 5, 'isRunning' => 6, 'lastIdProcessed' => 7, 'startedAt' => 8, 'endedAt' => 9, 'isOk' => 10, 'errorCode' => 11, 'log' => 12, 'logFile' => 13, 'comments' => 14, 'createdAt' => 15, 'updatedAt' => 16, ),
        BasePeer::TYPE_COLNAME => array (tlTaskPeer::ID => 0, tlTaskPeer::TASK => 1, tlTaskPeer::ARGUMENTS => 2, tlTaskPeer::OPTIONS => 3, tlTaskPeer::COUNT_PROCESSED => 4, tlTaskPeer::COUNT_NOT_PROCESSED => 5, tlTaskPeer::IS_RUNNING => 6, tlTaskPeer::LAST_ID_PROCESSED => 7, tlTaskPeer::STARTED_AT => 8, tlTaskPeer::ENDED_AT => 9, tlTaskPeer::IS_OK => 10, tlTaskPeer::ERROR_CODE => 11, tlTaskPeer::LOG => 12, tlTaskPeer::LOG_FILE => 13, tlTaskPeer::COMMENTS => 14, tlTaskPeer::CREATED_AT => 15, tlTaskPeer::UPDATED_AT => 16, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'TASK' => 1, 'ARGUMENTS' => 2, 'OPTIONS' => 3, 'COUNT_PROCESSED' => 4, 'COUNT_NOT_PROCESSED' => 5, 'IS_RUNNING' => 6, 'LAST_ID_PROCESSED' => 7, 'STARTED_AT' => 8, 'ENDED_AT' => 9, 'IS_OK' => 10, 'ERROR_CODE' => 11, 'LOG' => 12, 'LOG_FILE' => 13, 'COMMENTS' => 14, 'CREATED_AT' => 15, 'UPDATED_AT' => 16, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'task' => 1, 'arguments' => 2, 'options' => 3, 'count_processed' => 4, 'count_not_processed' => 5, 'is_running' => 6, 'last_id_processed' => 7, 'started_at' => 8, 'ended_at' => 9, 'is_ok' => 10, 'error_code' => 11, 'log' => 12, 'log_file' => 13, 'comments' => 14, 'created_at' => 15, 'updated_at' => 16, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $toNames = tlTaskPeer::getFieldNames($toType);
        $key = isset(tlTaskPeer::$fieldKeys[$fromType][$name]) ? tlTaskPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(tlTaskPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, tlTaskPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return tlTaskPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. tlTaskPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(tlTaskPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(tlTaskPeer::ID);
            $criteria->addSelectColumn(tlTaskPeer::TASK);
            $criteria->addSelectColumn(tlTaskPeer::ARGUMENTS);
            $criteria->addSelectColumn(tlTaskPeer::OPTIONS);
            $criteria->addSelectColumn(tlTaskPeer::COUNT_PROCESSED);
            $criteria->addSelectColumn(tlTaskPeer::COUNT_NOT_PROCESSED);
            $criteria->addSelectColumn(tlTaskPeer::IS_RUNNING);
            $criteria->addSelectColumn(tlTaskPeer::LAST_ID_PROCESSED);
            $criteria->addSelectColumn(tlTaskPeer::STARTED_AT);
            $criteria->addSelectColumn(tlTaskPeer::ENDED_AT);
            $criteria->addSelectColumn(tlTaskPeer::IS_OK);
            $criteria->addSelectColumn(tlTaskPeer::ERROR_CODE);
            $criteria->addSelectColumn(tlTaskPeer::LOG);
            $criteria->addSelectColumn(tlTaskPeer::LOG_FILE);
            $criteria->addSelectColumn(tlTaskPeer::COMMENTS);
            $criteria->addSelectColumn(tlTaskPeer::CREATED_AT);
            $criteria->addSelectColumn(tlTaskPeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.TASK');
            $criteria->addSelectColumn($alias . '.ARGUMENTS');
            $criteria->addSelectColumn($alias . '.OPTIONS');
            $criteria->addSelectColumn($alias . '.COUNT_PROCESSED');
            $criteria->addSelectColumn($alias . '.COUNT_NOT_PROCESSED');
            $criteria->addSelectColumn($alias . '.IS_RUNNING');
            $criteria->addSelectColumn($alias . '.LAST_ID_PROCESSED');
            $criteria->addSelectColumn($alias . '.STARTED_AT');
            $criteria->addSelectColumn($alias . '.ENDED_AT');
            $criteria->addSelectColumn($alias . '.IS_OK');
            $criteria->addSelectColumn($alias . '.ERROR_CODE');
            $criteria->addSelectColumn($alias . '.LOG');
            $criteria->addSelectColumn($alias . '.LOG_FILE');
            $criteria->addSelectColumn($alias . '.COMMENTS');
            $criteria->addSelectColumn($alias . '.CREATED_AT');
            $criteria->addSelectColumn($alias . '.UPDATED_AT');
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
        $criteria->setPrimaryTableName(tlTaskPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            tlTaskPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(tlTaskPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(tlTaskPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BasetlTaskPeer', $criteria, $con);
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
     * @return                 tlTask
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = tlTaskPeer::doSelect($critcopy, $con);
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
        return tlTaskPeer::populateObjects(tlTaskPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(tlTaskPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            tlTaskPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(tlTaskPeer::DATABASE_NAME);
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BasetlTaskPeer', $criteria, $con);
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
     * @param      tlTask $obj A tlTask object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            tlTaskPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A tlTask object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof tlTask) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or tlTask object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(tlTaskPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   tlTask Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(tlTaskPeer::$instances[$key])) {
                return tlTaskPeer::$instances[$key];
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
        tlTaskPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to tl_tasks
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
        $cls = tlTaskPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = tlTaskPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = tlTaskPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                tlTaskPeer::addInstanceToPool($obj, $key);
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
     * @return array (tlTask object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = tlTaskPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = tlTaskPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + tlTaskPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = tlTaskPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            tlTaskPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(tlTaskPeer::DATABASE_NAME)->getTable(tlTaskPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasetlTaskPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasetlTaskPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new tlTaskTableMap());
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
        return tlTaskPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a tlTask or Criteria object.
     *
     * @param      mixed $values Criteria or tlTask object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(tlTaskPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from tlTask object
        }

        if ($criteria->containsKey(tlTaskPeer::ID) && $criteria->keyContainsValue(tlTaskPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.tlTaskPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(tlTaskPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a tlTask or Criteria object.
     *
     * @param      mixed $values Criteria or tlTask object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(tlTaskPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(tlTaskPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(tlTaskPeer::ID);
            $value = $criteria->remove(tlTaskPeer::ID);
            if ($value) {
                $selectCriteria->add(tlTaskPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(tlTaskPeer::TABLE_NAME);
            }

        } else { // $values is tlTask object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(tlTaskPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the tl_tasks table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(tlTaskPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(tlTaskPeer::TABLE_NAME, $con, tlTaskPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            tlTaskPeer::clearInstancePool();
            tlTaskPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a tlTask or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or tlTask object or primary key or array of primary keys
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
            $con = Propel::getConnection(tlTaskPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            tlTaskPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof tlTask) { // it's a model object
            // invalidate the cache for this single object
            tlTaskPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(tlTaskPeer::DATABASE_NAME);
            $criteria->add(tlTaskPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                tlTaskPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(tlTaskPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            tlTaskPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given tlTask object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      tlTask $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(tlTaskPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(tlTaskPeer::TABLE_NAME);

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

        return BasePeer::doValidate(tlTaskPeer::DATABASE_NAME, tlTaskPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return tlTask
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = tlTaskPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(tlTaskPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(tlTaskPeer::DATABASE_NAME);
        $criteria->add(tlTaskPeer::ID, $pk);

        $v = tlTaskPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return tlTask[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(tlTaskPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(tlTaskPeer::DATABASE_NAME);
            $criteria->add(tlTaskPeer::ID, $pks, Criteria::IN);
            $objs = tlTaskPeer::doSelect($criteria, $con);
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
        return sprintf('BasetlTaskPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
      }

      throw new LogicException(sprintf('Unrecognized function "%s"', $method));
    }

} // BasetlTaskPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasetlTaskPeer::buildTableMap();

