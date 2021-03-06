<?php


/**
 * Base class that represents a query for the 'vehicle_type' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sat Dec  6 11:52:05 2014
 *
 * @method VehicleTypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method VehicleTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method VehicleTypeQuery orderByPerPerson($order = Criteria::ASC) Order by the per_person column
 * @method VehicleTypeQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method VehicleTypeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method VehicleTypeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method VehicleTypeQuery groupById() Group by the id column
 * @method VehicleTypeQuery groupByName() Group by the name column
 * @method VehicleTypeQuery groupByPerPerson() Group by the per_person column
 * @method VehicleTypeQuery groupByIsActive() Group by the is_active column
 * @method VehicleTypeQuery groupByCreatedAt() Group by the created_at column
 * @method VehicleTypeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method VehicleTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VehicleTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VehicleTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method VehicleTypeQuery leftJoinVehicle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Vehicle relation
 * @method VehicleTypeQuery rightJoinVehicle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Vehicle relation
 * @method VehicleTypeQuery innerJoinVehicle($relationAlias = null) Adds a INNER JOIN clause to the query using the Vehicle relation
 *
 * @method VehicleTypeQuery leftJoinAreaVehicleRateTable($relationAlias = null) Adds a LEFT JOIN clause to the query using the AreaVehicleRateTable relation
 * @method VehicleTypeQuery rightJoinAreaVehicleRateTable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AreaVehicleRateTable relation
 * @method VehicleTypeQuery innerJoinAreaVehicleRateTable($relationAlias = null) Adds a INNER JOIN clause to the query using the AreaVehicleRateTable relation
 *
 * @method VehicleTypeQuery leftJoinBooking($relationAlias = null) Adds a LEFT JOIN clause to the query using the Booking relation
 * @method VehicleTypeQuery rightJoinBooking($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Booking relation
 * @method VehicleTypeQuery innerJoinBooking($relationAlias = null) Adds a INNER JOIN clause to the query using the Booking relation
 *
 * @method VehicleType findOne(PropelPDO $con = null) Return the first VehicleType matching the query
 * @method VehicleType findOneOrCreate(PropelPDO $con = null) Return the first VehicleType matching the query, or a new VehicleType object populated from the query conditions when no match is found
 *
 * @method VehicleType findOneById(int $id) Return the first VehicleType filtered by the id column
 * @method VehicleType findOneByName(string $name) Return the first VehicleType filtered by the name column
 * @method VehicleType findOneByPerPerson(boolean $per_person) Return the first VehicleType filtered by the per_person column
 * @method VehicleType findOneByIsActive(boolean $is_active) Return the first VehicleType filtered by the is_active column
 * @method VehicleType findOneByCreatedAt(string $created_at) Return the first VehicleType filtered by the created_at column
 * @method VehicleType findOneByUpdatedAt(string $updated_at) Return the first VehicleType filtered by the updated_at column
 *
 * @method array findById(int $id) Return VehicleType objects filtered by the id column
 * @method array findByName(string $name) Return VehicleType objects filtered by the name column
 * @method array findByPerPerson(boolean $per_person) Return VehicleType objects filtered by the per_person column
 * @method array findByIsActive(boolean $is_active) Return VehicleType objects filtered by the is_active column
 * @method array findByCreatedAt(string $created_at) Return VehicleType objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return VehicleType objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseVehicleTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVehicleTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'VehicleType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VehicleTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     VehicleTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VehicleTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VehicleTypeQuery) {
            return $criteria;
        }
        $query = new VehicleTypeQuery();
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
     * @return   VehicleType|VehicleType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VehicleTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VehicleTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   VehicleType A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `NAME`, `PER_PERSON`, `IS_ACTIVE`, `CREATED_AT`, `UPDATED_AT` FROM `vehicle_type` WHERE `ID` = :p0';
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
            $obj = new VehicleType();
            $obj->hydrate($row);
            VehicleTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return VehicleType|VehicleType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|VehicleType[]|mixed the list of results, formatted by the current formatter
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
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VehicleTypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VehicleTypePeer::ID, $keys, Criteria::IN);
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
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(VehicleTypePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VehicleTypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the per_person column
     *
     * Example usage:
     * <code>
     * $query->filterByPerPerson(true); // WHERE per_person = true
     * $query->filterByPerPerson('yes'); // WHERE per_person = true
     * </code>
     *
     * @param     boolean|string $perPerson The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function filterByPerPerson($perPerson = null, $comparison = null)
    {
        if (is_string($perPerson)) {
            $per_person = in_array(strtolower($perPerson), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(VehicleTypePeer::PER_PERSON, $perPerson, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $is_active = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(VehicleTypePeer::IS_ACTIVE, $isActive, $comparison);
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
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(VehicleTypePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(VehicleTypePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VehicleTypePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(VehicleTypePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(VehicleTypePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VehicleTypePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Vehicle object
     *
     * @param   Vehicle|PropelObjectCollection $vehicle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   VehicleTypeQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByVehicle($vehicle, $comparison = null)
    {
        if ($vehicle instanceof Vehicle) {
            return $this
                ->addUsingAlias(VehicleTypePeer::ID, $vehicle->getVehicleTypeId(), $comparison);
        } elseif ($vehicle instanceof PropelObjectCollection) {
            return $this
                ->useVehicleQuery()
                ->filterByPrimaryKeys($vehicle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVehicle() only accepts arguments of type Vehicle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Vehicle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function joinVehicle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Vehicle');

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
            $this->addJoinObject($join, 'Vehicle');
        }

        return $this;
    }

    /**
     * Use the Vehicle relation Vehicle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   VehicleQuery A secondary query class using the current class as primary query
     */
    public function useVehicleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVehicle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Vehicle', 'VehicleQuery');
    }

    /**
     * Filter the query by a related AreaVehicleRateTable object
     *
     * @param   AreaVehicleRateTable|PropelObjectCollection $areaVehicleRateTable  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   VehicleTypeQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAreaVehicleRateTable($areaVehicleRateTable, $comparison = null)
    {
        if ($areaVehicleRateTable instanceof AreaVehicleRateTable) {
            return $this
                ->addUsingAlias(VehicleTypePeer::ID, $areaVehicleRateTable->getVehicleTypeId(), $comparison);
        } elseif ($areaVehicleRateTable instanceof PropelObjectCollection) {
            return $this
                ->useAreaVehicleRateTableQuery()
                ->filterByPrimaryKeys($areaVehicleRateTable->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAreaVehicleRateTable() only accepts arguments of type AreaVehicleRateTable or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AreaVehicleRateTable relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function joinAreaVehicleRateTable($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AreaVehicleRateTable');

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
            $this->addJoinObject($join, 'AreaVehicleRateTable');
        }

        return $this;
    }

    /**
     * Use the AreaVehicleRateTable relation AreaVehicleRateTable object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AreaVehicleRateTableQuery A secondary query class using the current class as primary query
     */
    public function useAreaVehicleRateTableQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAreaVehicleRateTable($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AreaVehicleRateTable', 'AreaVehicleRateTableQuery');
    }

    /**
     * Filter the query by a related Booking object
     *
     * @param   Booking|PropelObjectCollection $booking  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   VehicleTypeQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByBooking($booking, $comparison = null)
    {
        if ($booking instanceof Booking) {
            return $this
                ->addUsingAlias(VehicleTypePeer::ID, $booking->getVehicleTypeId(), $comparison);
        } elseif ($booking instanceof PropelObjectCollection) {
            return $this
                ->useBookingQuery()
                ->filterByPrimaryKeys($booking->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBooking() only accepts arguments of type Booking or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Booking relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function joinBooking($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Booking');

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
            $this->addJoinObject($join, 'Booking');
        }

        return $this;
    }

    /**
     * Use the Booking relation Booking object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BookingQuery A secondary query class using the current class as primary query
     */
    public function useBookingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBooking($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Booking', 'BookingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   VehicleType $vehicleType Object to remove from the list of results
     *
     * @return VehicleTypeQuery The current query, for fluid interface
     */
    public function prune($vehicleType = null)
    {
        if ($vehicleType) {
            $this->addUsingAlias(VehicleTypePeer::ID, $vehicleType->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // Timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     VehicleTypeQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(VehicleTypePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     VehicleTypeQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(VehicleTypePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     VehicleTypeQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(VehicleTypePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     VehicleTypeQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(VehicleTypePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     VehicleTypeQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(VehicleTypePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     VehicleTypeQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(VehicleTypePeer::CREATED_AT);
    }
}
