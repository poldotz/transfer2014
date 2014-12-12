<?php


/**
 * Base class that represents a query for the 'tl_tasks' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sat Dec  6 11:52:04 2014
 *
 * @method tlTaskQuery orderById($order = Criteria::ASC) Order by the id column
 * @method tlTaskQuery orderByTask($order = Criteria::ASC) Order by the task column
 * @method tlTaskQuery orderByArguments($order = Criteria::ASC) Order by the arguments column
 * @method tlTaskQuery orderByOptions($order = Criteria::ASC) Order by the options column
 * @method tlTaskQuery orderByCountProcessed($order = Criteria::ASC) Order by the count_processed column
 * @method tlTaskQuery orderByCountNotProcessed($order = Criteria::ASC) Order by the count_not_processed column
 * @method tlTaskQuery orderByIsRunning($order = Criteria::ASC) Order by the is_running column
 * @method tlTaskQuery orderByLastIdProcessed($order = Criteria::ASC) Order by the last_id_processed column
 * @method tlTaskQuery orderByStartedAt($order = Criteria::ASC) Order by the started_at column
 * @method tlTaskQuery orderByEndedAt($order = Criteria::ASC) Order by the ended_at column
 * @method tlTaskQuery orderByIsOk($order = Criteria::ASC) Order by the is_ok column
 * @method tlTaskQuery orderByErrorCode($order = Criteria::ASC) Order by the error_code column
 * @method tlTaskQuery orderByLog($order = Criteria::ASC) Order by the log column
 * @method tlTaskQuery orderByLogFile($order = Criteria::ASC) Order by the log_file column
 * @method tlTaskQuery orderByComments($order = Criteria::ASC) Order by the comments column
 * @method tlTaskQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method tlTaskQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method tlTaskQuery groupById() Group by the id column
 * @method tlTaskQuery groupByTask() Group by the task column
 * @method tlTaskQuery groupByArguments() Group by the arguments column
 * @method tlTaskQuery groupByOptions() Group by the options column
 * @method tlTaskQuery groupByCountProcessed() Group by the count_processed column
 * @method tlTaskQuery groupByCountNotProcessed() Group by the count_not_processed column
 * @method tlTaskQuery groupByIsRunning() Group by the is_running column
 * @method tlTaskQuery groupByLastIdProcessed() Group by the last_id_processed column
 * @method tlTaskQuery groupByStartedAt() Group by the started_at column
 * @method tlTaskQuery groupByEndedAt() Group by the ended_at column
 * @method tlTaskQuery groupByIsOk() Group by the is_ok column
 * @method tlTaskQuery groupByErrorCode() Group by the error_code column
 * @method tlTaskQuery groupByLog() Group by the log column
 * @method tlTaskQuery groupByLogFile() Group by the log_file column
 * @method tlTaskQuery groupByComments() Group by the comments column
 * @method tlTaskQuery groupByCreatedAt() Group by the created_at column
 * @method tlTaskQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method tlTaskQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method tlTaskQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method tlTaskQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method tlTask findOne(PropelPDO $con = null) Return the first tlTask matching the query
 * @method tlTask findOneOrCreate(PropelPDO $con = null) Return the first tlTask matching the query, or a new tlTask object populated from the query conditions when no match is found
 *
 * @method tlTask findOneById(int $id) Return the first tlTask filtered by the id column
 * @method tlTask findOneByTask(string $task) Return the first tlTask filtered by the task column
 * @method tlTask findOneByArguments(string $arguments) Return the first tlTask filtered by the arguments column
 * @method tlTask findOneByOptions(string $options) Return the first tlTask filtered by the options column
 * @method tlTask findOneByCountProcessed(int $count_processed) Return the first tlTask filtered by the count_processed column
 * @method tlTask findOneByCountNotProcessed(int $count_not_processed) Return the first tlTask filtered by the count_not_processed column
 * @method tlTask findOneByIsRunning(boolean $is_running) Return the first tlTask filtered by the is_running column
 * @method tlTask findOneByLastIdProcessed(int $last_id_processed) Return the first tlTask filtered by the last_id_processed column
 * @method tlTask findOneByStartedAt(string $started_at) Return the first tlTask filtered by the started_at column
 * @method tlTask findOneByEndedAt(string $ended_at) Return the first tlTask filtered by the ended_at column
 * @method tlTask findOneByIsOk(boolean $is_ok) Return the first tlTask filtered by the is_ok column
 * @method tlTask findOneByErrorCode(int $error_code) Return the first tlTask filtered by the error_code column
 * @method tlTask findOneByLog(string $log) Return the first tlTask filtered by the log column
 * @method tlTask findOneByLogFile(string $log_file) Return the first tlTask filtered by the log_file column
 * @method tlTask findOneByComments(string $comments) Return the first tlTask filtered by the comments column
 * @method tlTask findOneByCreatedAt(string $created_at) Return the first tlTask filtered by the created_at column
 * @method tlTask findOneByUpdatedAt(string $updated_at) Return the first tlTask filtered by the updated_at column
 *
 * @method array findById(int $id) Return tlTask objects filtered by the id column
 * @method array findByTask(string $task) Return tlTask objects filtered by the task column
 * @method array findByArguments(string $arguments) Return tlTask objects filtered by the arguments column
 * @method array findByOptions(string $options) Return tlTask objects filtered by the options column
 * @method array findByCountProcessed(int $count_processed) Return tlTask objects filtered by the count_processed column
 * @method array findByCountNotProcessed(int $count_not_processed) Return tlTask objects filtered by the count_not_processed column
 * @method array findByIsRunning(boolean $is_running) Return tlTask objects filtered by the is_running column
 * @method array findByLastIdProcessed(int $last_id_processed) Return tlTask objects filtered by the last_id_processed column
 * @method array findByStartedAt(string $started_at) Return tlTask objects filtered by the started_at column
 * @method array findByEndedAt(string $ended_at) Return tlTask objects filtered by the ended_at column
 * @method array findByIsOk(boolean $is_ok) Return tlTask objects filtered by the is_ok column
 * @method array findByErrorCode(int $error_code) Return tlTask objects filtered by the error_code column
 * @method array findByLog(string $log) Return tlTask objects filtered by the log column
 * @method array findByLogFile(string $log_file) Return tlTask objects filtered by the log_file column
 * @method array findByComments(string $comments) Return tlTask objects filtered by the comments column
 * @method array findByCreatedAt(string $created_at) Return tlTask objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return tlTask objects filtered by the updated_at column
 *
 * @package    propel.generator.plugins.sfTaskLoggerPlugin.lib.model.om
 */
abstract class BasetlTaskQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasetlTaskQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'tlTask', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new tlTaskQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     tlTaskQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return tlTaskQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof tlTaskQuery) {
            return $criteria;
        }
        $query = new tlTaskQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   tlTask|tlTask[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = tlTaskPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(tlTaskPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   tlTask A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `TASK`, `ARGUMENTS`, `OPTIONS`, `COUNT_PROCESSED`, `COUNT_NOT_PROCESSED`, `IS_RUNNING`, `LAST_ID_PROCESSED`, `STARTED_AT`, `ENDED_AT`, `IS_OK`, `ERROR_CODE`, `LOG`, `LOG_FILE`, `COMMENTS`, `CREATED_AT`, `UPDATED_AT` FROM `tl_tasks` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new tlTask();
            $obj->hydrate($row);
            tlTaskPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return tlTask|tlTask[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|tlTask[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(tlTaskPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(tlTaskPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(tlTaskPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the task column
     *
     * Example usage:
     * <code>
     * $query->filterByTask('fooValue');   // WHERE task = 'fooValue'
     * $query->filterByTask('%fooValue%'); // WHERE task LIKE '%fooValue%'
     * </code>
     *
     * @param     string $task The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByTask($task = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($task)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $task)) {
                $task = str_replace('*', '%', $task);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::TASK, $task, $comparison);
    }

    /**
     * Filter the query on the arguments column
     *
     * Example usage:
     * <code>
     * $query->filterByArguments('fooValue');   // WHERE arguments = 'fooValue'
     * $query->filterByArguments('%fooValue%'); // WHERE arguments LIKE '%fooValue%'
     * </code>
     *
     * @param     string $arguments The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByArguments($arguments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($arguments)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $arguments)) {
                $arguments = str_replace('*', '%', $arguments);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::ARGUMENTS, $arguments, $comparison);
    }

    /**
     * Filter the query on the options column
     *
     * Example usage:
     * <code>
     * $query->filterByOptions('fooValue');   // WHERE options = 'fooValue'
     * $query->filterByOptions('%fooValue%'); // WHERE options LIKE '%fooValue%'
     * </code>
     *
     * @param     string $options The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByOptions($options = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($options)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $options)) {
                $options = str_replace('*', '%', $options);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::OPTIONS, $options, $comparison);
    }

    /**
     * Filter the query on the count_processed column
     *
     * Example usage:
     * <code>
     * $query->filterByCountProcessed(1234); // WHERE count_processed = 1234
     * $query->filterByCountProcessed(array(12, 34)); // WHERE count_processed IN (12, 34)
     * $query->filterByCountProcessed(array('min' => 12)); // WHERE count_processed > 12
     * </code>
     *
     * @param     mixed $countProcessed The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByCountProcessed($countProcessed = null, $comparison = null)
    {
        if (is_array($countProcessed)) {
            $useMinMax = false;
            if (isset($countProcessed['min'])) {
                $this->addUsingAlias(tlTaskPeer::COUNT_PROCESSED, $countProcessed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countProcessed['max'])) {
                $this->addUsingAlias(tlTaskPeer::COUNT_PROCESSED, $countProcessed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::COUNT_PROCESSED, $countProcessed, $comparison);
    }

    /**
     * Filter the query on the count_not_processed column
     *
     * Example usage:
     * <code>
     * $query->filterByCountNotProcessed(1234); // WHERE count_not_processed = 1234
     * $query->filterByCountNotProcessed(array(12, 34)); // WHERE count_not_processed IN (12, 34)
     * $query->filterByCountNotProcessed(array('min' => 12)); // WHERE count_not_processed > 12
     * </code>
     *
     * @param     mixed $countNotProcessed The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByCountNotProcessed($countNotProcessed = null, $comparison = null)
    {
        if (is_array($countNotProcessed)) {
            $useMinMax = false;
            if (isset($countNotProcessed['min'])) {
                $this->addUsingAlias(tlTaskPeer::COUNT_NOT_PROCESSED, $countNotProcessed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countNotProcessed['max'])) {
                $this->addUsingAlias(tlTaskPeer::COUNT_NOT_PROCESSED, $countNotProcessed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::COUNT_NOT_PROCESSED, $countNotProcessed, $comparison);
    }

    /**
     * Filter the query on the is_running column
     *
     * Example usage:
     * <code>
     * $query->filterByIsRunning(true); // WHERE is_running = true
     * $query->filterByIsRunning('yes'); // WHERE is_running = true
     * </code>
     *
     * @param     boolean|string $isRunning The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByIsRunning($isRunning = null, $comparison = null)
    {
        if (is_string($isRunning)) {
            $is_running = in_array(strtolower($isRunning), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(tlTaskPeer::IS_RUNNING, $isRunning, $comparison);
    }

    /**
     * Filter the query on the last_id_processed column
     *
     * Example usage:
     * <code>
     * $query->filterByLastIdProcessed(1234); // WHERE last_id_processed = 1234
     * $query->filterByLastIdProcessed(array(12, 34)); // WHERE last_id_processed IN (12, 34)
     * $query->filterByLastIdProcessed(array('min' => 12)); // WHERE last_id_processed > 12
     * </code>
     *
     * @param     mixed $lastIdProcessed The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByLastIdProcessed($lastIdProcessed = null, $comparison = null)
    {
        if (is_array($lastIdProcessed)) {
            $useMinMax = false;
            if (isset($lastIdProcessed['min'])) {
                $this->addUsingAlias(tlTaskPeer::LAST_ID_PROCESSED, $lastIdProcessed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastIdProcessed['max'])) {
                $this->addUsingAlias(tlTaskPeer::LAST_ID_PROCESSED, $lastIdProcessed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::LAST_ID_PROCESSED, $lastIdProcessed, $comparison);
    }

    /**
     * Filter the query on the started_at column
     *
     * Example usage:
     * <code>
     * $query->filterByStartedAt('2011-03-14'); // WHERE started_at = '2011-03-14'
     * $query->filterByStartedAt('now'); // WHERE started_at = '2011-03-14'
     * $query->filterByStartedAt(array('max' => 'yesterday')); // WHERE started_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $startedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByStartedAt($startedAt = null, $comparison = null)
    {
        if (is_array($startedAt)) {
            $useMinMax = false;
            if (isset($startedAt['min'])) {
                $this->addUsingAlias(tlTaskPeer::STARTED_AT, $startedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startedAt['max'])) {
                $this->addUsingAlias(tlTaskPeer::STARTED_AT, $startedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::STARTED_AT, $startedAt, $comparison);
    }

    /**
     * Filter the query on the ended_at column
     *
     * Example usage:
     * <code>
     * $query->filterByEndedAt('2011-03-14'); // WHERE ended_at = '2011-03-14'
     * $query->filterByEndedAt('now'); // WHERE ended_at = '2011-03-14'
     * $query->filterByEndedAt(array('max' => 'yesterday')); // WHERE ended_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $endedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByEndedAt($endedAt = null, $comparison = null)
    {
        if (is_array($endedAt)) {
            $useMinMax = false;
            if (isset($endedAt['min'])) {
                $this->addUsingAlias(tlTaskPeer::ENDED_AT, $endedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endedAt['max'])) {
                $this->addUsingAlias(tlTaskPeer::ENDED_AT, $endedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::ENDED_AT, $endedAt, $comparison);
    }

    /**
     * Filter the query on the is_ok column
     *
     * Example usage:
     * <code>
     * $query->filterByIsOk(true); // WHERE is_ok = true
     * $query->filterByIsOk('yes'); // WHERE is_ok = true
     * </code>
     *
     * @param     boolean|string $isOk The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByIsOk($isOk = null, $comparison = null)
    {
        if (is_string($isOk)) {
            $is_ok = in_array(strtolower($isOk), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(tlTaskPeer::IS_OK, $isOk, $comparison);
    }

    /**
     * Filter the query on the error_code column
     *
     * Example usage:
     * <code>
     * $query->filterByErrorCode(1234); // WHERE error_code = 1234
     * $query->filterByErrorCode(array(12, 34)); // WHERE error_code IN (12, 34)
     * $query->filterByErrorCode(array('min' => 12)); // WHERE error_code > 12
     * </code>
     *
     * @param     mixed $errorCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByErrorCode($errorCode = null, $comparison = null)
    {
        if (is_array($errorCode)) {
            $useMinMax = false;
            if (isset($errorCode['min'])) {
                $this->addUsingAlias(tlTaskPeer::ERROR_CODE, $errorCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($errorCode['max'])) {
                $this->addUsingAlias(tlTaskPeer::ERROR_CODE, $errorCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::ERROR_CODE, $errorCode, $comparison);
    }

    /**
     * Filter the query on the log column
     *
     * Example usage:
     * <code>
     * $query->filterByLog('fooValue');   // WHERE log = 'fooValue'
     * $query->filterByLog('%fooValue%'); // WHERE log LIKE '%fooValue%'
     * </code>
     *
     * @param     string $log The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByLog($log = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($log)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $log)) {
                $log = str_replace('*', '%', $log);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::LOG, $log, $comparison);
    }

    /**
     * Filter the query on the log_file column
     *
     * Example usage:
     * <code>
     * $query->filterByLogFile('fooValue');   // WHERE log_file = 'fooValue'
     * $query->filterByLogFile('%fooValue%'); // WHERE log_file LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logFile The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByLogFile($logFile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logFile)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $logFile)) {
                $logFile = str_replace('*', '%', $logFile);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::LOG_FILE, $logFile, $comparison);
    }

    /**
     * Filter the query on the comments column
     *
     * Example usage:
     * <code>
     * $query->filterByComments('fooValue');   // WHERE comments = 'fooValue'
     * $query->filterByComments('%fooValue%'); // WHERE comments LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comments The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByComments($comments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comments)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comments)) {
                $comments = str_replace('*', '%', $comments);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::COMMENTS, $comments, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(tlTaskPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(tlTaskPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(tlTaskPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(tlTaskPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(tlTaskPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   tlTask $tlTask Object to remove from the list of results
     *
     * @return tlTaskQuery The current query, for fluid interface
     */
    public function prune($tlTask = null)
    {
        if ($tlTask) {
            $this->addUsingAlias(tlTaskPeer::ID, $tlTask->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
