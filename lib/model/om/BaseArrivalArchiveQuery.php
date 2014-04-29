<?php


/**
 * Base class that represents a query for the 'arrival_archive' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 29 15:24:45 2014
 *
 * @method ArrivalArchiveQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ArrivalArchiveQuery orderByBookingId($order = Criteria::ASC) Order by the booking_id column
 * @method ArrivalArchiveQuery orderByDay($order = Criteria::ASC) Order by the day column
 * @method ArrivalArchiveQuery orderByHour($order = Criteria::ASC) Order by the hour column
 * @method ArrivalArchiveQuery orderByFlight($order = Criteria::ASC) Order by the flight column
 * @method ArrivalArchiveQuery orderByCost($order = Criteria::ASC) Order by the cost column
 * @method ArrivalArchiveQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method ArrivalArchiveQuery orderByPaymentMethodId($order = Criteria::ASC) Order by the payment_method_id column
 * @method ArrivalArchiveQuery orderByLocalityFrom($order = Criteria::ASC) Order by the locality_from column
 * @method ArrivalArchiveQuery orderByLocalityTo($order = Criteria::ASC) Order by the locality_to column
 * @method ArrivalArchiveQuery orderByDriverId($order = Criteria::ASC) Order by the driver_id column
 * @method ArrivalArchiveQuery orderByVehicleId($order = Criteria::ASC) Order by the vehicle_id column
 * @method ArrivalArchiveQuery orderByCancelled($order = Criteria::ASC) Order by the cancelled column
 * @method ArrivalArchiveQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ArrivalArchiveQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method ArrivalArchiveQuery orderByArchivedAt($order = Criteria::ASC) Order by the archived_at column
 *
 * @method ArrivalArchiveQuery groupById() Group by the id column
 * @method ArrivalArchiveQuery groupByBookingId() Group by the booking_id column
 * @method ArrivalArchiveQuery groupByDay() Group by the day column
 * @method ArrivalArchiveQuery groupByHour() Group by the hour column
 * @method ArrivalArchiveQuery groupByFlight() Group by the flight column
 * @method ArrivalArchiveQuery groupByCost() Group by the cost column
 * @method ArrivalArchiveQuery groupByNote() Group by the note column
 * @method ArrivalArchiveQuery groupByPaymentMethodId() Group by the payment_method_id column
 * @method ArrivalArchiveQuery groupByLocalityFrom() Group by the locality_from column
 * @method ArrivalArchiveQuery groupByLocalityTo() Group by the locality_to column
 * @method ArrivalArchiveQuery groupByDriverId() Group by the driver_id column
 * @method ArrivalArchiveQuery groupByVehicleId() Group by the vehicle_id column
 * @method ArrivalArchiveQuery groupByCancelled() Group by the cancelled column
 * @method ArrivalArchiveQuery groupByCreatedAt() Group by the created_at column
 * @method ArrivalArchiveQuery groupByUpdatedAt() Group by the updated_at column
 * @method ArrivalArchiveQuery groupByArchivedAt() Group by the archived_at column
 *
 * @method ArrivalArchiveQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ArrivalArchiveQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ArrivalArchiveQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ArrivalArchive findOne(PropelPDO $con = null) Return the first ArrivalArchive matching the query
 * @method ArrivalArchive findOneOrCreate(PropelPDO $con = null) Return the first ArrivalArchive matching the query, or a new ArrivalArchive object populated from the query conditions when no match is found
 *
 * @method ArrivalArchive findOneById(int $id) Return the first ArrivalArchive filtered by the id column
 * @method ArrivalArchive findOneByBookingId(int $booking_id) Return the first ArrivalArchive filtered by the booking_id column
 * @method ArrivalArchive findOneByDay(string $day) Return the first ArrivalArchive filtered by the day column
 * @method ArrivalArchive findOneByHour(string $hour) Return the first ArrivalArchive filtered by the hour column
 * @method ArrivalArchive findOneByFlight(string $flight) Return the first ArrivalArchive filtered by the flight column
 * @method ArrivalArchive findOneByCost(string $cost) Return the first ArrivalArchive filtered by the cost column
 * @method ArrivalArchive findOneByNote(string $note) Return the first ArrivalArchive filtered by the note column
 * @method ArrivalArchive findOneByPaymentMethodId(int $payment_method_id) Return the first ArrivalArchive filtered by the payment_method_id column
 * @method ArrivalArchive findOneByLocalityFrom(int $locality_from) Return the first ArrivalArchive filtered by the locality_from column
 * @method ArrivalArchive findOneByLocalityTo(int $locality_to) Return the first ArrivalArchive filtered by the locality_to column
 * @method ArrivalArchive findOneByDriverId(int $driver_id) Return the first ArrivalArchive filtered by the driver_id column
 * @method ArrivalArchive findOneByVehicleId(int $vehicle_id) Return the first ArrivalArchive filtered by the vehicle_id column
 * @method ArrivalArchive findOneByCancelled(boolean $cancelled) Return the first ArrivalArchive filtered by the cancelled column
 * @method ArrivalArchive findOneByCreatedAt(string $created_at) Return the first ArrivalArchive filtered by the created_at column
 * @method ArrivalArchive findOneByUpdatedAt(string $updated_at) Return the first ArrivalArchive filtered by the updated_at column
 * @method ArrivalArchive findOneByArchivedAt(string $archived_at) Return the first ArrivalArchive filtered by the archived_at column
 *
 * @method array findById(int $id) Return ArrivalArchive objects filtered by the id column
 * @method array findByBookingId(int $booking_id) Return ArrivalArchive objects filtered by the booking_id column
 * @method array findByDay(string $day) Return ArrivalArchive objects filtered by the day column
 * @method array findByHour(string $hour) Return ArrivalArchive objects filtered by the hour column
 * @method array findByFlight(string $flight) Return ArrivalArchive objects filtered by the flight column
 * @method array findByCost(string $cost) Return ArrivalArchive objects filtered by the cost column
 * @method array findByNote(string $note) Return ArrivalArchive objects filtered by the note column
 * @method array findByPaymentMethodId(int $payment_method_id) Return ArrivalArchive objects filtered by the payment_method_id column
 * @method array findByLocalityFrom(int $locality_from) Return ArrivalArchive objects filtered by the locality_from column
 * @method array findByLocalityTo(int $locality_to) Return ArrivalArchive objects filtered by the locality_to column
 * @method array findByDriverId(int $driver_id) Return ArrivalArchive objects filtered by the driver_id column
 * @method array findByVehicleId(int $vehicle_id) Return ArrivalArchive objects filtered by the vehicle_id column
 * @method array findByCancelled(boolean $cancelled) Return ArrivalArchive objects filtered by the cancelled column
 * @method array findByCreatedAt(string $created_at) Return ArrivalArchive objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ArrivalArchive objects filtered by the updated_at column
 * @method array findByArchivedAt(string $archived_at) Return ArrivalArchive objects filtered by the archived_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseArrivalArchiveQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseArrivalArchiveQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'ArrivalArchive', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ArrivalArchiveQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ArrivalArchiveQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ArrivalArchiveQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ArrivalArchiveQuery) {
            return $criteria;
        }
        $query = new ArrivalArchiveQuery();
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
     * @return   ArrivalArchive|ArrivalArchive[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ArrivalArchivePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ArrivalArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ArrivalArchive A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `BOOKING_ID`, `DAY`, `HOUR`, `FLIGHT`, `COST`, `NOTE`, `PAYMENT_METHOD_ID`, `LOCALITY_FROM`, `LOCALITY_TO`, `DRIVER_ID`, `VEHICLE_ID`, `CANCELLED`, `CREATED_AT`, `UPDATED_AT`, `ARCHIVED_AT` FROM `arrival_archive` WHERE `ID` = :p0';
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
            $obj = new ArrivalArchive();
            $obj->hydrate($row);
            ArrivalArchivePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ArrivalArchive|ArrivalArchive[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ArrivalArchive[]|mixed the list of results, formatted by the current formatter
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
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ArrivalArchivePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ArrivalArchivePeer::ID, $keys, Criteria::IN);
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
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ArrivalArchivePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the booking_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBookingId(1234); // WHERE booking_id = 1234
     * $query->filterByBookingId(array(12, 34)); // WHERE booking_id IN (12, 34)
     * $query->filterByBookingId(array('min' => 12)); // WHERE booking_id > 12
     * </code>
     *
     * @param     mixed $bookingId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByBookingId($bookingId = null, $comparison = null)
    {
        if (is_array($bookingId)) {
            $useMinMax = false;
            if (isset($bookingId['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::BOOKING_ID, $bookingId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookingId['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::BOOKING_ID, $bookingId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::BOOKING_ID, $bookingId, $comparison);
    }

    /**
     * Filter the query on the day column
     *
     * Example usage:
     * <code>
     * $query->filterByDay('2011-03-14'); // WHERE day = '2011-03-14'
     * $query->filterByDay('now'); // WHERE day = '2011-03-14'
     * $query->filterByDay(array('max' => 'yesterday')); // WHERE day > '2011-03-13'
     * </code>
     *
     * @param     mixed $day The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByDay($day = null, $comparison = null)
    {
        if (is_array($day)) {
            $useMinMax = false;
            if (isset($day['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::DAY, $day['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($day['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::DAY, $day['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::DAY, $day, $comparison);
    }

    /**
     * Filter the query on the hour column
     *
     * Example usage:
     * <code>
     * $query->filterByHour('2011-03-14'); // WHERE hour = '2011-03-14'
     * $query->filterByHour('now'); // WHERE hour = '2011-03-14'
     * $query->filterByHour(array('max' => 'yesterday')); // WHERE hour > '2011-03-13'
     * </code>
     *
     * @param     mixed $hour The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByHour($hour = null, $comparison = null)
    {
        if (is_array($hour)) {
            $useMinMax = false;
            if (isset($hour['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::HOUR, $hour['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hour['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::HOUR, $hour['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::HOUR, $hour, $comparison);
    }

    /**
     * Filter the query on the flight column
     *
     * Example usage:
     * <code>
     * $query->filterByFlight('fooValue');   // WHERE flight = 'fooValue'
     * $query->filterByFlight('%fooValue%'); // WHERE flight LIKE '%fooValue%'
     * </code>
     *
     * @param     string $flight The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByFlight($flight = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($flight)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $flight)) {
                $flight = str_replace('*', '%', $flight);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::FLIGHT, $flight, $comparison);
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
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (is_array($cost)) {
            $useMinMax = false;
            if (isset($cost['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::COST, $cost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cost['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::COST, $cost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::COST, $cost, $comparison);
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
     * @return ArrivalArchiveQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ArrivalArchivePeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the payment_method_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentMethodId(1234); // WHERE payment_method_id = 1234
     * $query->filterByPaymentMethodId(array(12, 34)); // WHERE payment_method_id IN (12, 34)
     * $query->filterByPaymentMethodId(array('min' => 12)); // WHERE payment_method_id > 12
     * </code>
     *
     * @param     mixed $paymentMethodId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByPaymentMethodId($paymentMethodId = null, $comparison = null)
    {
        if (is_array($paymentMethodId)) {
            $useMinMax = false;
            if (isset($paymentMethodId['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::PAYMENT_METHOD_ID, $paymentMethodId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentMethodId['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::PAYMENT_METHOD_ID, $paymentMethodId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::PAYMENT_METHOD_ID, $paymentMethodId, $comparison);
    }

    /**
     * Filter the query on the locality_from column
     *
     * Example usage:
     * <code>
     * $query->filterByLocalityFrom(1234); // WHERE locality_from = 1234
     * $query->filterByLocalityFrom(array(12, 34)); // WHERE locality_from IN (12, 34)
     * $query->filterByLocalityFrom(array('min' => 12)); // WHERE locality_from > 12
     * </code>
     *
     * @param     mixed $localityFrom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByLocalityFrom($localityFrom = null, $comparison = null)
    {
        if (is_array($localityFrom)) {
            $useMinMax = false;
            if (isset($localityFrom['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::LOCALITY_FROM, $localityFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($localityFrom['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::LOCALITY_FROM, $localityFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::LOCALITY_FROM, $localityFrom, $comparison);
    }

    /**
     * Filter the query on the locality_to column
     *
     * Example usage:
     * <code>
     * $query->filterByLocalityTo(1234); // WHERE locality_to = 1234
     * $query->filterByLocalityTo(array(12, 34)); // WHERE locality_to IN (12, 34)
     * $query->filterByLocalityTo(array('min' => 12)); // WHERE locality_to > 12
     * </code>
     *
     * @param     mixed $localityTo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByLocalityTo($localityTo = null, $comparison = null)
    {
        if (is_array($localityTo)) {
            $useMinMax = false;
            if (isset($localityTo['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::LOCALITY_TO, $localityTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($localityTo['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::LOCALITY_TO, $localityTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::LOCALITY_TO, $localityTo, $comparison);
    }

    /**
     * Filter the query on the driver_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDriverId(1234); // WHERE driver_id = 1234
     * $query->filterByDriverId(array(12, 34)); // WHERE driver_id IN (12, 34)
     * $query->filterByDriverId(array('min' => 12)); // WHERE driver_id > 12
     * </code>
     *
     * @param     mixed $driverId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByDriverId($driverId = null, $comparison = null)
    {
        if (is_array($driverId)) {
            $useMinMax = false;
            if (isset($driverId['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::DRIVER_ID, $driverId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($driverId['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::DRIVER_ID, $driverId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::DRIVER_ID, $driverId, $comparison);
    }

    /**
     * Filter the query on the vehicle_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVehicleId(1234); // WHERE vehicle_id = 1234
     * $query->filterByVehicleId(array(12, 34)); // WHERE vehicle_id IN (12, 34)
     * $query->filterByVehicleId(array('min' => 12)); // WHERE vehicle_id > 12
     * </code>
     *
     * @param     mixed $vehicleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByVehicleId($vehicleId = null, $comparison = null)
    {
        if (is_array($vehicleId)) {
            $useMinMax = false;
            if (isset($vehicleId['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::VEHICLE_ID, $vehicleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vehicleId['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::VEHICLE_ID, $vehicleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::VEHICLE_ID, $vehicleId, $comparison);
    }

    /**
     * Filter the query on the cancelled column
     *
     * Example usage:
     * <code>
     * $query->filterByCancelled(true); // WHERE cancelled = true
     * $query->filterByCancelled('yes'); // WHERE cancelled = true
     * </code>
     *
     * @param     boolean|string $cancelled The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByCancelled($cancelled = null, $comparison = null)
    {
        if (is_string($cancelled)) {
            $cancelled = in_array(strtolower($cancelled), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ArrivalArchivePeer::CANCELLED, $cancelled, $comparison);
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
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the archived_at column
     *
     * Example usage:
     * <code>
     * $query->filterByArchivedAt('2011-03-14'); // WHERE archived_at = '2011-03-14'
     * $query->filterByArchivedAt('now'); // WHERE archived_at = '2011-03-14'
     * $query->filterByArchivedAt(array('max' => 'yesterday')); // WHERE archived_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $archivedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function filterByArchivedAt($archivedAt = null, $comparison = null)
    {
        if (is_array($archivedAt)) {
            $useMinMax = false;
            if (isset($archivedAt['min'])) {
                $this->addUsingAlias(ArrivalArchivePeer::ARCHIVED_AT, $archivedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($archivedAt['max'])) {
                $this->addUsingAlias(ArrivalArchivePeer::ARCHIVED_AT, $archivedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalArchivePeer::ARCHIVED_AT, $archivedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ArrivalArchive $arrivalArchive Object to remove from the list of results
     *
     * @return ArrivalArchiveQuery The current query, for fluid interface
     */
    public function prune($arrivalArchive = null)
    {
        if ($arrivalArchive) {
            $this->addUsingAlias(ArrivalArchivePeer::ID, $arrivalArchive->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
