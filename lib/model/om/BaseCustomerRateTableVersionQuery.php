<?php


/**
 * Base class that represents a query for the 'customer_rate_table_version' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue 13 May 2014 04:36:07 PM CEST
 *
 * @method CustomerRateTableVersionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CustomerRateTableVersionQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method CustomerRateTableVersionQuery orderByRateId($order = Criteria::ASC) Order by the rate_id column
 * @method CustomerRateTableVersionQuery orderByVehicleTypeId($order = Criteria::ASC) Order by the vehicle_type_id column
 * @method CustomerRateTableVersionQuery orderByCost($order = Criteria::ASC) Order by the cost column
 * @method CustomerRateTableVersionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method CustomerRateTableVersionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method CustomerRateTableVersionQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method CustomerRateTableVersionQuery orderByVersionCreatedAt($order = Criteria::ASC) Order by the version_created_at column
 * @method CustomerRateTableVersionQuery orderByVersionCreatedBy($order = Criteria::ASC) Order by the version_created_by column
 * @method CustomerRateTableVersionQuery orderByRateIdVersion($order = Criteria::ASC) Order by the rate_id_version column
 *
 * @method CustomerRateTableVersionQuery groupById() Group by the id column
 * @method CustomerRateTableVersionQuery groupByCustomerId() Group by the customer_id column
 * @method CustomerRateTableVersionQuery groupByRateId() Group by the rate_id column
 * @method CustomerRateTableVersionQuery groupByVehicleTypeId() Group by the vehicle_type_id column
 * @method CustomerRateTableVersionQuery groupByCost() Group by the cost column
 * @method CustomerRateTableVersionQuery groupByCreatedAt() Group by the created_at column
 * @method CustomerRateTableVersionQuery groupByUpdatedAt() Group by the updated_at column
 * @method CustomerRateTableVersionQuery groupByVersion() Group by the version column
 * @method CustomerRateTableVersionQuery groupByVersionCreatedAt() Group by the version_created_at column
 * @method CustomerRateTableVersionQuery groupByVersionCreatedBy() Group by the version_created_by column
 * @method CustomerRateTableVersionQuery groupByRateIdVersion() Group by the rate_id_version column
 *
 * @method CustomerRateTableVersionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CustomerRateTableVersionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CustomerRateTableVersionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CustomerRateTableVersionQuery leftJoinCustomerRateTable($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerRateTable relation
 * @method CustomerRateTableVersionQuery rightJoinCustomerRateTable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerRateTable relation
 * @method CustomerRateTableVersionQuery innerJoinCustomerRateTable($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerRateTable relation
 *
 * @method CustomerRateTableVersion findOne(PropelPDO $con = null) Return the first CustomerRateTableVersion matching the query
 * @method CustomerRateTableVersion findOneOrCreate(PropelPDO $con = null) Return the first CustomerRateTableVersion matching the query, or a new CustomerRateTableVersion object populated from the query conditions when no match is found
 *
 * @method CustomerRateTableVersion findOneById(int $id) Return the first CustomerRateTableVersion filtered by the id column
 * @method CustomerRateTableVersion findOneByCustomerId(int $customer_id) Return the first CustomerRateTableVersion filtered by the customer_id column
 * @method CustomerRateTableVersion findOneByRateId(int $rate_id) Return the first CustomerRateTableVersion filtered by the rate_id column
 * @method CustomerRateTableVersion findOneByVehicleTypeId(int $vehicle_type_id) Return the first CustomerRateTableVersion filtered by the vehicle_type_id column
 * @method CustomerRateTableVersion findOneByCost(string $cost) Return the first CustomerRateTableVersion filtered by the cost column
 * @method CustomerRateTableVersion findOneByCreatedAt(string $created_at) Return the first CustomerRateTableVersion filtered by the created_at column
 * @method CustomerRateTableVersion findOneByUpdatedAt(string $updated_at) Return the first CustomerRateTableVersion filtered by the updated_at column
 * @method CustomerRateTableVersion findOneByVersion(int $version) Return the first CustomerRateTableVersion filtered by the version column
 * @method CustomerRateTableVersion findOneByVersionCreatedAt(string $version_created_at) Return the first CustomerRateTableVersion filtered by the version_created_at column
 * @method CustomerRateTableVersion findOneByVersionCreatedBy(string $version_created_by) Return the first CustomerRateTableVersion filtered by the version_created_by column
 * @method CustomerRateTableVersion findOneByRateIdVersion(int $rate_id_version) Return the first CustomerRateTableVersion filtered by the rate_id_version column
 *
 * @method array findById(int $id) Return CustomerRateTableVersion objects filtered by the id column
 * @method array findByCustomerId(int $customer_id) Return CustomerRateTableVersion objects filtered by the customer_id column
 * @method array findByRateId(int $rate_id) Return CustomerRateTableVersion objects filtered by the rate_id column
 * @method array findByVehicleTypeId(int $vehicle_type_id) Return CustomerRateTableVersion objects filtered by the vehicle_type_id column
 * @method array findByCost(string $cost) Return CustomerRateTableVersion objects filtered by the cost column
 * @method array findByCreatedAt(string $created_at) Return CustomerRateTableVersion objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return CustomerRateTableVersion objects filtered by the updated_at column
 * @method array findByVersion(int $version) Return CustomerRateTableVersion objects filtered by the version column
 * @method array findByVersionCreatedAt(string $version_created_at) Return CustomerRateTableVersion objects filtered by the version_created_at column
 * @method array findByVersionCreatedBy(string $version_created_by) Return CustomerRateTableVersion objects filtered by the version_created_by column
 * @method array findByRateIdVersion(int $rate_id_version) Return CustomerRateTableVersion objects filtered by the rate_id_version column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCustomerRateTableVersionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCustomerRateTableVersionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'CustomerRateTableVersion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CustomerRateTableVersionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CustomerRateTableVersionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CustomerRateTableVersionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CustomerRateTableVersionQuery) {
            return $criteria;
        }
        $query = new CustomerRateTableVersionQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$id, $version]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   CustomerRateTableVersion|CustomerRateTableVersion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CustomerRateTableVersionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CustomerRateTableVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   CustomerRateTableVersion A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CUSTOMER_ID`, `RATE_ID`, `VEHICLE_TYPE_ID`, `COST`, `CREATED_AT`, `UPDATED_AT`, `VERSION`, `VERSION_CREATED_AT`, `VERSION_CREATED_BY`, `RATE_ID_VERSION` FROM `customer_rate_table_version` WHERE `ID` = :p0 AND `VERSION` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new CustomerRateTableVersion();
            $obj->hydrate($row);
            CustomerRateTableVersionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return CustomerRateTableVersion|CustomerRateTableVersion[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|CustomerRateTableVersion[]|mixed the list of results, formatted by the current formatter
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
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CustomerRateTableVersionPeer::ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CustomerRateTableVersionPeer::VERSION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CustomerRateTableVersionPeer::ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CustomerRateTableVersionPeer::VERSION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByCustomerRateTable()
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CustomerRateTableVersionPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
     * </code>
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerRateTableVersionPeer::CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the rate_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRateId(1234); // WHERE rate_id = 1234
     * $query->filterByRateId(array(12, 34)); // WHERE rate_id IN (12, 34)
     * $query->filterByRateId(array('min' => 12)); // WHERE rate_id > 12
     * </code>
     *
     * @param     mixed $rateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByRateId($rateId = null, $comparison = null)
    {
        if (is_array($rateId)) {
            $useMinMax = false;
            if (isset($rateId['min'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::RATE_ID, $rateId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rateId['max'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::RATE_ID, $rateId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerRateTableVersionPeer::RATE_ID, $rateId, $comparison);
    }

    /**
     * Filter the query on the vehicle_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVehicleTypeId(1234); // WHERE vehicle_type_id = 1234
     * $query->filterByVehicleTypeId(array(12, 34)); // WHERE vehicle_type_id IN (12, 34)
     * $query->filterByVehicleTypeId(array('min' => 12)); // WHERE vehicle_type_id > 12
     * </code>
     *
     * @param     mixed $vehicleTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByVehicleTypeId($vehicleTypeId = null, $comparison = null)
    {
        if (is_array($vehicleTypeId)) {
            $useMinMax = false;
            if (isset($vehicleTypeId['min'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::VEHICLE_TYPE_ID, $vehicleTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vehicleTypeId['max'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::VEHICLE_TYPE_ID, $vehicleTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerRateTableVersionPeer::VEHICLE_TYPE_ID, $vehicleTypeId, $comparison);
    }

    /**
     * Filter the query on the cost column
     *
     * Example usage:
     * <code>
     * $query->filterByCost(1234); // WHERE cost = 1234
     * $query->filterByCost(array(12, 34)); // WHERE cost IN (12, 34)
     * $query->filterByCost(array('min' => 12)); // WHERE cost > 12
     * </code>
     *
     * @param     mixed $cost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (is_array($cost)) {
            $useMinMax = false;
            if (isset($cost['min'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::COST, $cost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cost['max'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::COST, $cost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerRateTableVersionPeer::COST, $cost, $comparison);
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
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerRateTableVersionPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerRateTableVersionPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version > 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CustomerRateTableVersionPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the version_created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedAt('2011-03-14'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt('now'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt(array('max' => 'yesterday')); // WHERE version_created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $versionCreatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedAt($versionCreatedAt = null, $comparison = null)
    {
        if (is_array($versionCreatedAt)) {
            $useMinMax = false;
            if (isset($versionCreatedAt['min'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::VERSION_CREATED_AT, $versionCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedAt['max'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::VERSION_CREATED_AT, $versionCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerRateTableVersionPeer::VERSION_CREATED_AT, $versionCreatedAt, $comparison);
    }

    /**
     * Filter the query on the version_created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedBy('fooValue');   // WHERE version_created_by = 'fooValue'
     * $query->filterByVersionCreatedBy('%fooValue%'); // WHERE version_created_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $versionCreatedBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedBy($versionCreatedBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($versionCreatedBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $versionCreatedBy)) {
                $versionCreatedBy = str_replace('*', '%', $versionCreatedBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CustomerRateTableVersionPeer::VERSION_CREATED_BY, $versionCreatedBy, $comparison);
    }

    /**
     * Filter the query on the rate_id_version column
     *
     * Example usage:
     * <code>
     * $query->filterByRateIdVersion(1234); // WHERE rate_id_version = 1234
     * $query->filterByRateIdVersion(array(12, 34)); // WHERE rate_id_version IN (12, 34)
     * $query->filterByRateIdVersion(array('min' => 12)); // WHERE rate_id_version > 12
     * </code>
     *
     * @param     mixed $rateIdVersion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function filterByRateIdVersion($rateIdVersion = null, $comparison = null)
    {
        if (is_array($rateIdVersion)) {
            $useMinMax = false;
            if (isset($rateIdVersion['min'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::RATE_ID_VERSION, $rateIdVersion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rateIdVersion['max'])) {
                $this->addUsingAlias(CustomerRateTableVersionPeer::RATE_ID_VERSION, $rateIdVersion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerRateTableVersionPeer::RATE_ID_VERSION, $rateIdVersion, $comparison);
    }

    /**
     * Filter the query by a related CustomerRateTable object
     *
     * @param   CustomerRateTable|PropelObjectCollection $customerRateTable The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CustomerRateTableVersionQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCustomerRateTable($customerRateTable, $comparison = null)
    {
        if ($customerRateTable instanceof CustomerRateTable) {
            return $this
                ->addUsingAlias(CustomerRateTableVersionPeer::ID, $customerRateTable->getId(), $comparison);
        } elseif ($customerRateTable instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CustomerRateTableVersionPeer::ID, $customerRateTable->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCustomerRateTable() only accepts arguments of type CustomerRateTable or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerRateTable relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function joinCustomerRateTable($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerRateTable');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CustomerRateTable');
        }

        return $this;
    }

    /**
     * Use the CustomerRateTable relation CustomerRateTable object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CustomerRateTableQuery A secondary query class using the current class as primary query
     */
    public function useCustomerRateTableQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomerRateTable($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerRateTable', 'CustomerRateTableQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   CustomerRateTableVersion $customerRateTableVersion Object to remove from the list of results
     *
     * @return CustomerRateTableVersionQuery The current query, for fluid interface
     */
    public function prune($customerRateTableVersion = null)
    {
        if ($customerRateTableVersion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CustomerRateTableVersionPeer::ID), $customerRateTableVersion->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CustomerRateTableVersionPeer::VERSION), $customerRateTableVersion->getVersion(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
