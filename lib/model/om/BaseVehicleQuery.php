<?php


/**
 * Base class that represents a query for the 'vehicle' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon Nov 17 17:31:37 2014
 *
 * @method VehicleQuery orderById($order = Criteria::ASC) Order by the id column
 * @method VehicleQuery orderByVehicleTypeId($order = Criteria::ASC) Order by the vehicle_type_id column
 * @method VehicleQuery orderByModel($order = Criteria::ASC) Order by the model column
 * @method VehicleQuery orderByPlateNumber($order = Criteria::ASC) Order by the plate_number column
 * @method VehicleQuery orderByFrameNumber($order = Criteria::ASC) Order by the frame_number column
 * @method VehicleQuery orderByMileage($order = Criteria::ASC) Order by the mileage column
 * @method VehicleQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method VehicleQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method VehicleQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method VehicleQuery groupById() Group by the id column
 * @method VehicleQuery groupByVehicleTypeId() Group by the vehicle_type_id column
 * @method VehicleQuery groupByModel() Group by the model column
 * @method VehicleQuery groupByPlateNumber() Group by the plate_number column
 * @method VehicleQuery groupByFrameNumber() Group by the frame_number column
 * @method VehicleQuery groupByMileage() Group by the mileage column
 * @method VehicleQuery groupByNote() Group by the note column
 * @method VehicleQuery groupByCreatedAt() Group by the created_at column
 * @method VehicleQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method VehicleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VehicleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VehicleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method VehicleQuery leftJoinVehicleType($relationAlias = null) Adds a LEFT JOIN clause to the query using the VehicleType relation
 * @method VehicleQuery rightJoinVehicleType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VehicleType relation
 * @method VehicleQuery innerJoinVehicleType($relationAlias = null) Adds a INNER JOIN clause to the query using the VehicleType relation
 *
 * @method VehicleQuery leftJoinArrival($relationAlias = null) Adds a LEFT JOIN clause to the query using the Arrival relation
 * @method VehicleQuery rightJoinArrival($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Arrival relation
 * @method VehicleQuery innerJoinArrival($relationAlias = null) Adds a INNER JOIN clause to the query using the Arrival relation
 *
 * @method VehicleQuery leftJoinDeparture($relationAlias = null) Adds a LEFT JOIN clause to the query using the Departure relation
 * @method VehicleQuery rightJoinDeparture($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Departure relation
 * @method VehicleQuery innerJoinDeparture($relationAlias = null) Adds a INNER JOIN clause to the query using the Departure relation
 *
 * @method Vehicle findOne(PropelPDO $con = null) Return the first Vehicle matching the query
 * @method Vehicle findOneOrCreate(PropelPDO $con = null) Return the first Vehicle matching the query, or a new Vehicle object populated from the query conditions when no match is found
 *
 * @method Vehicle findOneById(int $id) Return the first Vehicle filtered by the id column
 * @method Vehicle findOneByVehicleTypeId(int $vehicle_type_id) Return the first Vehicle filtered by the vehicle_type_id column
 * @method Vehicle findOneByModel(string $model) Return the first Vehicle filtered by the model column
 * @method Vehicle findOneByPlateNumber(string $plate_number) Return the first Vehicle filtered by the plate_number column
 * @method Vehicle findOneByFrameNumber(string $frame_number) Return the first Vehicle filtered by the frame_number column
 * @method Vehicle findOneByMileage(string $mileage) Return the first Vehicle filtered by the mileage column
 * @method Vehicle findOneByNote(string $note) Return the first Vehicle filtered by the note column
 * @method Vehicle findOneByCreatedAt(string $created_at) Return the first Vehicle filtered by the created_at column
 * @method Vehicle findOneByUpdatedAt(string $updated_at) Return the first Vehicle filtered by the updated_at column
 *
 * @method array findById(int $id) Return Vehicle objects filtered by the id column
 * @method array findByVehicleTypeId(int $vehicle_type_id) Return Vehicle objects filtered by the vehicle_type_id column
 * @method array findByModel(string $model) Return Vehicle objects filtered by the model column
 * @method array findByPlateNumber(string $plate_number) Return Vehicle objects filtered by the plate_number column
 * @method array findByFrameNumber(string $frame_number) Return Vehicle objects filtered by the frame_number column
 * @method array findByMileage(string $mileage) Return Vehicle objects filtered by the mileage column
 * @method array findByNote(string $note) Return Vehicle objects filtered by the note column
 * @method array findByCreatedAt(string $created_at) Return Vehicle objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Vehicle objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseVehicleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVehicleQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Vehicle', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VehicleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     VehicleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VehicleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VehicleQuery) {
            return $criteria;
        }
        $query = new VehicleQuery();
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
     * @return   Vehicle|Vehicle[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VehiclePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VehiclePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Vehicle A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `VEHICLE_TYPE_ID`, `MODEL`, `PLATE_NUMBER`, `FRAME_NUMBER`, `MILEAGE`, `NOTE`, `CREATED_AT`, `UPDATED_AT` FROM `vehicle` WHERE `ID` = :p0';
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
            $obj = new Vehicle();
            $obj->hydrate($row);
            VehiclePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Vehicle|Vehicle[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Vehicle[]|mixed the list of results, formatted by the current formatter
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
     * @return VehicleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VehiclePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VehicleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VehiclePeer::ID, $keys, Criteria::IN);
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
     * @return VehicleQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(VehiclePeer::ID, $id, $comparison);
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
     * @see       filterByVehicleType()
     *
     * @param     mixed $vehicleTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VehicleQuery The current query, for fluid interface
     */
    public function filterByVehicleTypeId($vehicleTypeId = null, $comparison = null)
    {
        if (is_array($vehicleTypeId)) {
            $useMinMax = false;
            if (isset($vehicleTypeId['min'])) {
                $this->addUsingAlias(VehiclePeer::VEHICLE_TYPE_ID, $vehicleTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vehicleTypeId['max'])) {
                $this->addUsingAlias(VehiclePeer::VEHICLE_TYPE_ID, $vehicleTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VehiclePeer::VEHICLE_TYPE_ID, $vehicleTypeId, $comparison);
    }

    /**
     * Filter the query on the model column
     *
     * Example usage:
     * <code>
     * $query->filterByModel('fooValue');   // WHERE model = 'fooValue'
     * $query->filterByModel('%fooValue%'); // WHERE model LIKE '%fooValue%'
     * </code>
     *
     * @param     string $model The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VehicleQuery The current query, for fluid interface
     */
    public function filterByModel($model = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($model)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $model)) {
                $model = str_replace('*', '%', $model);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VehiclePeer::MODEL, $model, $comparison);
    }

    /**
     * Filter the query on the plate_number column
     *
     * Example usage:
     * <code>
     * $query->filterByPlateNumber('fooValue');   // WHERE plate_number = 'fooValue'
     * $query->filterByPlateNumber('%fooValue%'); // WHERE plate_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $plateNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VehicleQuery The current query, for fluid interface
     */
    public function filterByPlateNumber($plateNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($plateNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $plateNumber)) {
                $plateNumber = str_replace('*', '%', $plateNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VehiclePeer::PLATE_NUMBER, $plateNumber, $comparison);
    }

    /**
     * Filter the query on the frame_number column
     *
     * Example usage:
     * <code>
     * $query->filterByFrameNumber('fooValue');   // WHERE frame_number = 'fooValue'
     * $query->filterByFrameNumber('%fooValue%'); // WHERE frame_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $frameNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VehicleQuery The current query, for fluid interface
     */
    public function filterByFrameNumber($frameNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($frameNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $frameNumber)) {
                $frameNumber = str_replace('*', '%', $frameNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VehiclePeer::FRAME_NUMBER, $frameNumber, $comparison);
    }

    /**
     * Filter the query on the mileage column
     *
     * Example usage:
     * <code>
     * $query->filterByMileage(1234); // WHERE mileage = 1234
     * $query->filterByMileage(array(12, 34)); // WHERE mileage IN (12, 34)
     * $query->filterByMileage(array('min' => 12)); // WHERE mileage > 12
     * </code>
     *
     * @param     mixed $mileage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VehicleQuery The current query, for fluid interface
     */
    public function filterByMileage($mileage = null, $comparison = null)
    {
        if (is_array($mileage)) {
            $useMinMax = false;
            if (isset($mileage['min'])) {
                $this->addUsingAlias(VehiclePeer::MILEAGE, $mileage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mileage['max'])) {
                $this->addUsingAlias(VehiclePeer::MILEAGE, $mileage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VehiclePeer::MILEAGE, $mileage, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote('fooValue');   // WHERE note = 'fooValue'
     * $query->filterByNote('%fooValue%'); // WHERE note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $note The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VehicleQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($note)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $note)) {
                $note = str_replace('*', '%', $note);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VehiclePeer::NOTE, $note, $comparison);
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
     * @return VehicleQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(VehiclePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(VehiclePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VehiclePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return VehicleQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(VehiclePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(VehiclePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VehiclePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related VehicleType object
     *
     * @param   VehicleType|PropelObjectCollection $vehicleType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   VehicleQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByVehicleType($vehicleType, $comparison = null)
    {
        if ($vehicleType instanceof VehicleType) {
            return $this
                ->addUsingAlias(VehiclePeer::VEHICLE_TYPE_ID, $vehicleType->getId(), $comparison);
        } elseif ($vehicleType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VehiclePeer::VEHICLE_TYPE_ID, $vehicleType->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByVehicleType() only accepts arguments of type VehicleType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VehicleType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VehicleQuery The current query, for fluid interface
     */
    public function joinVehicleType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VehicleType');

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
            $this->addJoinObject($join, 'VehicleType');
        }

        return $this;
    }

    /**
     * Use the VehicleType relation VehicleType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   VehicleTypeQuery A secondary query class using the current class as primary query
     */
    public function useVehicleTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVehicleType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VehicleType', 'VehicleTypeQuery');
    }

    /**
     * Filter the query by a related Arrival object
     *
     * @param   Arrival|PropelObjectCollection $arrival  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   VehicleQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByArrival($arrival, $comparison = null)
    {
        if ($arrival instanceof Arrival) {
            return $this
                ->addUsingAlias(VehiclePeer::ID, $arrival->getVehicleId(), $comparison);
        } elseif ($arrival instanceof PropelObjectCollection) {
            return $this
                ->useArrivalQuery()
                ->filterByPrimaryKeys($arrival->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArrival() only accepts arguments of type Arrival or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Arrival relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VehicleQuery The current query, for fluid interface
     */
    public function joinArrival($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Arrival');

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
            $this->addJoinObject($join, 'Arrival');
        }

        return $this;
    }

    /**
     * Use the Arrival relation Arrival object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ArrivalQuery A secondary query class using the current class as primary query
     */
    public function useArrivalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinArrival($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Arrival', 'ArrivalQuery');
    }

    /**
     * Filter the query by a related Departure object
     *
     * @param   Departure|PropelObjectCollection $departure  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   VehicleQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDeparture($departure, $comparison = null)
    {
        if ($departure instanceof Departure) {
            return $this
                ->addUsingAlias(VehiclePeer::ID, $departure->getVehicleId(), $comparison);
        } elseif ($departure instanceof PropelObjectCollection) {
            return $this
                ->useDepartureQuery()
                ->filterByPrimaryKeys($departure->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDeparture() only accepts arguments of type Departure or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Departure relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VehicleQuery The current query, for fluid interface
     */
    public function joinDeparture($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Departure');

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
            $this->addJoinObject($join, 'Departure');
        }

        return $this;
    }

    /**
     * Use the Departure relation Departure object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DepartureQuery A secondary query class using the current class as primary query
     */
    public function useDepartureQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDeparture($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Departure', 'DepartureQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Vehicle $vehicle Object to remove from the list of results
     *
     * @return VehicleQuery The current query, for fluid interface
     */
    public function prune($vehicle = null)
    {
        if ($vehicle) {
            $this->addUsingAlias(VehiclePeer::ID, $vehicle->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // Timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     VehicleQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(VehiclePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     VehicleQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(VehiclePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     VehicleQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(VehiclePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     VehicleQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(VehiclePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     VehicleQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(VehiclePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     VehicleQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(VehiclePeer::CREATED_AT);
    }
}
