<?php


/**
 * Base class that represents a query for the 'booking_archive' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue 13 May 2014 12:39:45 PM CEST
 *
 * @method BookingArchiveQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BookingArchiveQuery orderByBookingDate($order = Criteria::ASC) Order by the booking_date column
 * @method BookingArchiveQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method BookingArchiveQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method BookingArchiveQuery orderByAdult($order = Criteria::ASC) Order by the adult column
 * @method BookingArchiveQuery orderByChild($order = Criteria::ASC) Order by the child column
 * @method BookingArchiveQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method BookingArchiveQuery orderByRifFile($order = Criteria::ASC) Order by the rif_file column
 * @method BookingArchiveQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method BookingArchiveQuery orderByVehicleTypeId($order = Criteria::ASC) Order by the vehicle_type_id column
 * @method BookingArchiveQuery orderByIsConfirmed($order = Criteria::ASC) Order by the is_confirmed column
 * @method BookingArchiveQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method BookingArchiveQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method BookingArchiveQuery orderByArchivedAt($order = Criteria::ASC) Order by the archived_at column
 *
 * @method BookingArchiveQuery groupById() Group by the id column
 * @method BookingArchiveQuery groupByBookingDate() Group by the booking_date column
 * @method BookingArchiveQuery groupByYear() Group by the year column
 * @method BookingArchiveQuery groupByNumber() Group by the number column
 * @method BookingArchiveQuery groupByAdult() Group by the adult column
 * @method BookingArchiveQuery groupByChild() Group by the child column
 * @method BookingArchiveQuery groupByContact() Group by the contact column
 * @method BookingArchiveQuery groupByRifFile() Group by the rif_file column
 * @method BookingArchiveQuery groupByCustomerId() Group by the customer_id column
 * @method BookingArchiveQuery groupByVehicleTypeId() Group by the vehicle_type_id column
 * @method BookingArchiveQuery groupByIsConfirmed() Group by the is_confirmed column
 * @method BookingArchiveQuery groupByCreatedAt() Group by the created_at column
 * @method BookingArchiveQuery groupByUpdatedAt() Group by the updated_at column
 * @method BookingArchiveQuery groupByArchivedAt() Group by the archived_at column
 *
 * @method BookingArchiveQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BookingArchiveQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BookingArchiveQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BookingArchive findOne(PropelPDO $con = null) Return the first BookingArchive matching the query
 * @method BookingArchive findOneOrCreate(PropelPDO $con = null) Return the first BookingArchive matching the query, or a new BookingArchive object populated from the query conditions when no match is found
 *
 * @method BookingArchive findOneById(int $id) Return the first BookingArchive filtered by the id column
 * @method BookingArchive findOneByBookingDate(string $booking_date) Return the first BookingArchive filtered by the booking_date column
 * @method BookingArchive findOneByYear(int $year) Return the first BookingArchive filtered by the year column
 * @method BookingArchive findOneByNumber(int $number) Return the first BookingArchive filtered by the number column
 * @method BookingArchive findOneByAdult(int $adult) Return the first BookingArchive filtered by the adult column
 * @method BookingArchive findOneByChild(int $child) Return the first BookingArchive filtered by the child column
 * @method BookingArchive findOneByContact(string $contact) Return the first BookingArchive filtered by the contact column
 * @method BookingArchive findOneByRifFile(string $rif_file) Return the first BookingArchive filtered by the rif_file column
 * @method BookingArchive findOneByCustomerId(int $customer_id) Return the first BookingArchive filtered by the customer_id column
 * @method BookingArchive findOneByVehicleTypeId(int $vehicle_type_id) Return the first BookingArchive filtered by the vehicle_type_id column
 * @method BookingArchive findOneByIsConfirmed(boolean $is_confirmed) Return the first BookingArchive filtered by the is_confirmed column
 * @method BookingArchive findOneByCreatedAt(string $created_at) Return the first BookingArchive filtered by the created_at column
 * @method BookingArchive findOneByUpdatedAt(string $updated_at) Return the first BookingArchive filtered by the updated_at column
 * @method BookingArchive findOneByArchivedAt(string $archived_at) Return the first BookingArchive filtered by the archived_at column
 *
 * @method array findById(int $id) Return BookingArchive objects filtered by the id column
 * @method array findByBookingDate(string $booking_date) Return BookingArchive objects filtered by the booking_date column
 * @method array findByYear(int $year) Return BookingArchive objects filtered by the year column
 * @method array findByNumber(int $number) Return BookingArchive objects filtered by the number column
 * @method array findByAdult(int $adult) Return BookingArchive objects filtered by the adult column
 * @method array findByChild(int $child) Return BookingArchive objects filtered by the child column
 * @method array findByContact(string $contact) Return BookingArchive objects filtered by the contact column
 * @method array findByRifFile(string $rif_file) Return BookingArchive objects filtered by the rif_file column
 * @method array findByCustomerId(int $customer_id) Return BookingArchive objects filtered by the customer_id column
 * @method array findByVehicleTypeId(int $vehicle_type_id) Return BookingArchive objects filtered by the vehicle_type_id column
 * @method array findByIsConfirmed(boolean $is_confirmed) Return BookingArchive objects filtered by the is_confirmed column
 * @method array findByCreatedAt(string $created_at) Return BookingArchive objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return BookingArchive objects filtered by the updated_at column
 * @method array findByArchivedAt(string $archived_at) Return BookingArchive objects filtered by the archived_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBookingArchiveQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBookingArchiveQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'BookingArchive', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BookingArchiveQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     BookingArchiveQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BookingArchiveQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BookingArchiveQuery) {
            return $criteria;
        }
        $query = new BookingArchiveQuery();
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
     * @return   BookingArchive|BookingArchive[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BookingArchivePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BookingArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   BookingArchive A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `BOOKING_DATE`, `YEAR`, `NUMBER`, `ADULT`, `CHILD`, `CONTACT`, `RIF_FILE`, `CUSTOMER_ID`, `VEHICLE_TYPE_ID`, `IS_CONFIRMED`, `CREATED_AT`, `UPDATED_AT`, `ARCHIVED_AT` FROM `booking_archive` WHERE `ID` = :p0';
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
            $obj = new BookingArchive();
            $obj->hydrate($row);
            BookingArchivePeer::addInstanceToPool($obj, (string) $key);
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
     * @return BookingArchive|BookingArchive[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BookingArchive[]|mixed the list of results, formatted by the current formatter
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
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BookingArchivePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BookingArchivePeer::ID, $keys, Criteria::IN);
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
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(BookingArchivePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the booking_date column
     *
     * Example usage:
     * <code>
     * $query->filterByBookingDate('2011-03-14'); // WHERE booking_date = '2011-03-14'
     * $query->filterByBookingDate('now'); // WHERE booking_date = '2011-03-14'
     * $query->filterByBookingDate(array('max' => 'yesterday')); // WHERE booking_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $bookingDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByBookingDate($bookingDate = null, $comparison = null)
    {
        if (is_array($bookingDate)) {
            $useMinMax = false;
            if (isset($bookingDate['min'])) {
                $this->addUsingAlias(BookingArchivePeer::BOOKING_DATE, $bookingDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookingDate['max'])) {
                $this->addUsingAlias(BookingArchivePeer::BOOKING_DATE, $bookingDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::BOOKING_DATE, $bookingDate, $comparison);
    }

    /**
     * Filter the query on the year column
     *
     * Example usage:
     * <code>
     * $query->filterByYear(1234); // WHERE year = 1234
     * $query->filterByYear(array(12, 34)); // WHERE year IN (12, 34)
     * $query->filterByYear(array('min' => 12)); // WHERE year > 12
     * </code>
     *
     * @param     mixed $year The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByYear($year = null, $comparison = null)
    {
        if (is_array($year)) {
            $useMinMax = false;
            if (isset($year['min'])) {
                $this->addUsingAlias(BookingArchivePeer::YEAR, $year['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($year['max'])) {
                $this->addUsingAlias(BookingArchivePeer::YEAR, $year['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::YEAR, $year, $comparison);
    }

    /**
     * Filter the query on the number column
     *
     * Example usage:
     * <code>
     * $query->filterByNumber(1234); // WHERE number = 1234
     * $query->filterByNumber(array(12, 34)); // WHERE number IN (12, 34)
     * $query->filterByNumber(array('min' => 12)); // WHERE number > 12
     * </code>
     *
     * @param     mixed $number The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByNumber($number = null, $comparison = null)
    {
        if (is_array($number)) {
            $useMinMax = false;
            if (isset($number['min'])) {
                $this->addUsingAlias(BookingArchivePeer::NUMBER, $number['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($number['max'])) {
                $this->addUsingAlias(BookingArchivePeer::NUMBER, $number['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::NUMBER, $number, $comparison);
    }

    /**
     * Filter the query on the adult column
     *
     * Example usage:
     * <code>
     * $query->filterByAdult(1234); // WHERE adult = 1234
     * $query->filterByAdult(array(12, 34)); // WHERE adult IN (12, 34)
     * $query->filterByAdult(array('min' => 12)); // WHERE adult > 12
     * </code>
     *
     * @param     mixed $adult The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByAdult($adult = null, $comparison = null)
    {
        if (is_array($adult)) {
            $useMinMax = false;
            if (isset($adult['min'])) {
                $this->addUsingAlias(BookingArchivePeer::ADULT, $adult['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adult['max'])) {
                $this->addUsingAlias(BookingArchivePeer::ADULT, $adult['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::ADULT, $adult, $comparison);
    }

    /**
     * Filter the query on the child column
     *
     * Example usage:
     * <code>
     * $query->filterByChild(1234); // WHERE child = 1234
     * $query->filterByChild(array(12, 34)); // WHERE child IN (12, 34)
     * $query->filterByChild(array('min' => 12)); // WHERE child > 12
     * </code>
     *
     * @param     mixed $child The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByChild($child = null, $comparison = null)
    {
        if (is_array($child)) {
            $useMinMax = false;
            if (isset($child['min'])) {
                $this->addUsingAlias(BookingArchivePeer::CHILD, $child['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($child['max'])) {
                $this->addUsingAlias(BookingArchivePeer::CHILD, $child['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::CHILD, $child, $comparison);
    }

    /**
     * Filter the query on the contact column
     *
     * Example usage:
     * <code>
     * $query->filterByContact('fooValue');   // WHERE contact = 'fooValue'
     * $query->filterByContact('%fooValue%'); // WHERE contact LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contact The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByContact($contact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contact)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contact)) {
                $contact = str_replace('*', '%', $contact);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::CONTACT, $contact, $comparison);
    }

    /**
     * Filter the query on the rif_file column
     *
     * Example usage:
     * <code>
     * $query->filterByRifFile('fooValue');   // WHERE rif_file = 'fooValue'
     * $query->filterByRifFile('%fooValue%'); // WHERE rif_file LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rifFile The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByRifFile($rifFile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rifFile)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rifFile)) {
                $rifFile = str_replace('*', '%', $rifFile);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::RIF_FILE, $rifFile, $comparison);
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
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(BookingArchivePeer::CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(BookingArchivePeer::CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::CUSTOMER_ID, $customerId, $comparison);
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
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByVehicleTypeId($vehicleTypeId = null, $comparison = null)
    {
        if (is_array($vehicleTypeId)) {
            $useMinMax = false;
            if (isset($vehicleTypeId['min'])) {
                $this->addUsingAlias(BookingArchivePeer::VEHICLE_TYPE_ID, $vehicleTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vehicleTypeId['max'])) {
                $this->addUsingAlias(BookingArchivePeer::VEHICLE_TYPE_ID, $vehicleTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::VEHICLE_TYPE_ID, $vehicleTypeId, $comparison);
    }

    /**
     * Filter the query on the is_confirmed column
     *
     * Example usage:
     * <code>
     * $query->filterByIsConfirmed(true); // WHERE is_confirmed = true
     * $query->filterByIsConfirmed('yes'); // WHERE is_confirmed = true
     * </code>
     *
     * @param     boolean|string $isConfirmed The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByIsConfirmed($isConfirmed = null, $comparison = null)
    {
        if (is_string($isConfirmed)) {
            $is_confirmed = in_array(strtolower($isConfirmed), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(BookingArchivePeer::IS_CONFIRMED, $isConfirmed, $comparison);
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
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(BookingArchivePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(BookingArchivePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(BookingArchivePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(BookingArchivePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function filterByArchivedAt($archivedAt = null, $comparison = null)
    {
        if (is_array($archivedAt)) {
            $useMinMax = false;
            if (isset($archivedAt['min'])) {
                $this->addUsingAlias(BookingArchivePeer::ARCHIVED_AT, $archivedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($archivedAt['max'])) {
                $this->addUsingAlias(BookingArchivePeer::ARCHIVED_AT, $archivedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingArchivePeer::ARCHIVED_AT, $archivedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   BookingArchive $bookingArchive Object to remove from the list of results
     *
     * @return BookingArchiveQuery The current query, for fluid interface
     */
    public function prune($bookingArchive = null)
    {
        if ($bookingArchive) {
            $this->addUsingAlias(BookingArchivePeer::ID, $bookingArchive->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
