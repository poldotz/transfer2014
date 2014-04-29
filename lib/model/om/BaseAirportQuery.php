<?php


/**
 * Base class that represents a query for the 'airport' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Apr 29 15:24:44 2014
 *
 * @method AirportQuery orderById($order = Criteria::ASC) Order by the id column
 * @method AirportQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method AirportQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method AirportQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method AirportQuery orderByCountry($order = Criteria::ASC) Order by the country column
 * @method AirportQuery orderByLat($order = Criteria::ASC) Order by the lat column
 * @method AirportQuery orderByLng($order = Criteria::ASC) Order by the lng column
 * @method AirportQuery orderByTimezone($order = Criteria::ASC) Order by the timezone column
 * @method AirportQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method AirportQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method AirportQuery groupById() Group by the id column
 * @method AirportQuery groupByCode() Group by the code column
 * @method AirportQuery groupByName() Group by the name column
 * @method AirportQuery groupByCity() Group by the city column
 * @method AirportQuery groupByCountry() Group by the country column
 * @method AirportQuery groupByLat() Group by the lat column
 * @method AirportQuery groupByLng() Group by the lng column
 * @method AirportQuery groupByTimezone() Group by the timezone column
 * @method AirportQuery groupByCreatedAt() Group by the created_at column
 * @method AirportQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method AirportQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AirportQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AirportQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Airport findOne(PropelPDO $con = null) Return the first Airport matching the query
 * @method Airport findOneOrCreate(PropelPDO $con = null) Return the first Airport matching the query, or a new Airport object populated from the query conditions when no match is found
 *
 * @method Airport findOneById(int $id) Return the first Airport filtered by the id column
 * @method Airport findOneByCode(string $code) Return the first Airport filtered by the code column
 * @method Airport findOneByName(string $name) Return the first Airport filtered by the name column
 * @method Airport findOneByCity(string $city) Return the first Airport filtered by the city column
 * @method Airport findOneByCountry(string $country) Return the first Airport filtered by the country column
 * @method Airport findOneByLat(double $lat) Return the first Airport filtered by the lat column
 * @method Airport findOneByLng(double $lng) Return the first Airport filtered by the lng column
 * @method Airport findOneByTimezone(string $timezone) Return the first Airport filtered by the timezone column
 * @method Airport findOneByCreatedAt(string $created_at) Return the first Airport filtered by the created_at column
 * @method Airport findOneByUpdatedAt(string $updated_at) Return the first Airport filtered by the updated_at column
 *
 * @method array findById(int $id) Return Airport objects filtered by the id column
 * @method array findByCode(string $code) Return Airport objects filtered by the code column
 * @method array findByName(string $name) Return Airport objects filtered by the name column
 * @method array findByCity(string $city) Return Airport objects filtered by the city column
 * @method array findByCountry(string $country) Return Airport objects filtered by the country column
 * @method array findByLat(double $lat) Return Airport objects filtered by the lat column
 * @method array findByLng(double $lng) Return Airport objects filtered by the lng column
 * @method array findByTimezone(string $timezone) Return Airport objects filtered by the timezone column
 * @method array findByCreatedAt(string $created_at) Return Airport objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Airport objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAirportQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAirportQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Airport', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AirportQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     AirportQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AirportQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AirportQuery) {
            return $criteria;
        }
        $query = new AirportQuery();
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
     * @return   Airport|Airport[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AirportPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AirportPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Airport A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CODE`, `NAME`, `CITY`, `COUNTRY`, `LAT`, `LNG`, `TIMEZONE`, `CREATED_AT`, `UPDATED_AT` FROM `airport` WHERE `ID` = :p0';
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
            $obj = new Airport();
            $obj->hydrate($row);
            AirportPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Airport|Airport[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Airport[]|mixed the list of results, formatted by the current formatter
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
     * @return AirportQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AirportPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AirportQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AirportPeer::ID, $keys, Criteria::IN);
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
     * @return AirportQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(AirportPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AirportQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AirportPeer::CODE, $code, $comparison);
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
     * @return AirportQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AirportPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AirportQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $city)) {
                $city = str_replace('*', '%', $city);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AirportPeer::CITY, $city, $comparison);
    }

    /**
     * Filter the query on the country column
     *
     * Example usage:
     * <code>
     * $query->filterByCountry('fooValue');   // WHERE country = 'fooValue'
     * $query->filterByCountry('%fooValue%'); // WHERE country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $country The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AirportQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $country)) {
                $country = str_replace('*', '%', $country);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AirportPeer::COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the lat column
     *
     * Example usage:
     * <code>
     * $query->filterByLat(1234); // WHERE lat = 1234
     * $query->filterByLat(array(12, 34)); // WHERE lat IN (12, 34)
     * $query->filterByLat(array('min' => 12)); // WHERE lat > 12
     * </code>
     *
     * @param     mixed $lat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AirportQuery The current query, for fluid interface
     */
    public function filterByLat($lat = null, $comparison = null)
    {
        if (is_array($lat)) {
            $useMinMax = false;
            if (isset($lat['min'])) {
                $this->addUsingAlias(AirportPeer::LAT, $lat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lat['max'])) {
                $this->addUsingAlias(AirportPeer::LAT, $lat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AirportPeer::LAT, $lat, $comparison);
    }

    /**
     * Filter the query on the lng column
     *
     * Example usage:
     * <code>
     * $query->filterByLng(1234); // WHERE lng = 1234
     * $query->filterByLng(array(12, 34)); // WHERE lng IN (12, 34)
     * $query->filterByLng(array('min' => 12)); // WHERE lng > 12
     * </code>
     *
     * @param     mixed $lng The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AirportQuery The current query, for fluid interface
     */
    public function filterByLng($lng = null, $comparison = null)
    {
        if (is_array($lng)) {
            $useMinMax = false;
            if (isset($lng['min'])) {
                $this->addUsingAlias(AirportPeer::LNG, $lng['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lng['max'])) {
                $this->addUsingAlias(AirportPeer::LNG, $lng['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AirportPeer::LNG, $lng, $comparison);
    }

    /**
     * Filter the query on the timezone column
     *
     * Example usage:
     * <code>
     * $query->filterByTimezone('fooValue');   // WHERE timezone = 'fooValue'
     * $query->filterByTimezone('%fooValue%'); // WHERE timezone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $timezone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AirportQuery The current query, for fluid interface
     */
    public function filterByTimezone($timezone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($timezone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $timezone)) {
                $timezone = str_replace('*', '%', $timezone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AirportPeer::TIMEZONE, $timezone, $comparison);
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
     * @return AirportQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(AirportPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(AirportPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AirportPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return AirportQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(AirportPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(AirportPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AirportPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Airport $airport Object to remove from the list of results
     *
     * @return AirportQuery The current query, for fluid interface
     */
    public function prune($airport = null)
    {
        if ($airport) {
            $this->addUsingAlias(AirportPeer::ID, $airport->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // Timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     AirportQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(AirportPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     AirportQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(AirportPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     AirportQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(AirportPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     AirportQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(AirportPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     AirportQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(AirportPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     AirportQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(AirportPeer::CREATED_AT);
    }
}
