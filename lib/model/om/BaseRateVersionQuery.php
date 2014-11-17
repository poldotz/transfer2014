<?php


/**
 * Base class that represents a query for the 'rate_version' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon Nov 17 17:31:38 2014
 *
 * @method RateVersionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RateVersionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RateVersionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method RateVersionQuery orderByDay($order = Criteria::ASC) Order by the day column
 * @method RateVersionQuery orderByHourFrom($order = Criteria::ASC) Order by the hour_from column
 * @method RateVersionQuery orderByHourTo($order = Criteria::ASC) Order by the hour_to column
 * @method RateVersionQuery orderBySurcharge($order = Criteria::ASC) Order by the surcharge column
 * @method RateVersionQuery orderByReducedPercentage($order = Criteria::ASC) Order by the reduced_percentage column
 * @method RateVersionQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method RateVersionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method RateVersionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method RateVersionQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method RateVersionQuery orderByVersionCreatedAt($order = Criteria::ASC) Order by the version_created_at column
 * @method RateVersionQuery orderByVersionCreatedBy($order = Criteria::ASC) Order by the version_created_by column
 *
 * @method RateVersionQuery groupById() Group by the id column
 * @method RateVersionQuery groupByName() Group by the name column
 * @method RateVersionQuery groupByDescription() Group by the description column
 * @method RateVersionQuery groupByDay() Group by the day column
 * @method RateVersionQuery groupByHourFrom() Group by the hour_from column
 * @method RateVersionQuery groupByHourTo() Group by the hour_to column
 * @method RateVersionQuery groupBySurcharge() Group by the surcharge column
 * @method RateVersionQuery groupByReducedPercentage() Group by the reduced_percentage column
 * @method RateVersionQuery groupByNote() Group by the note column
 * @method RateVersionQuery groupByCreatedAt() Group by the created_at column
 * @method RateVersionQuery groupByUpdatedAt() Group by the updated_at column
 * @method RateVersionQuery groupByVersion() Group by the version column
 * @method RateVersionQuery groupByVersionCreatedAt() Group by the version_created_at column
 * @method RateVersionQuery groupByVersionCreatedBy() Group by the version_created_by column
 *
 * @method RateVersionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RateVersionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RateVersionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RateVersionQuery leftJoinRate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rate relation
 * @method RateVersionQuery rightJoinRate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rate relation
 * @method RateVersionQuery innerJoinRate($relationAlias = null) Adds a INNER JOIN clause to the query using the Rate relation
 *
 * @method RateVersion findOne(PropelPDO $con = null) Return the first RateVersion matching the query
 * @method RateVersion findOneOrCreate(PropelPDO $con = null) Return the first RateVersion matching the query, or a new RateVersion object populated from the query conditions when no match is found
 *
 * @method RateVersion findOneById(int $id) Return the first RateVersion filtered by the id column
 * @method RateVersion findOneByName(string $name) Return the first RateVersion filtered by the name column
 * @method RateVersion findOneByDescription(string $description) Return the first RateVersion filtered by the description column
 * @method RateVersion findOneByDay(string $day) Return the first RateVersion filtered by the day column
 * @method RateVersion findOneByHourFrom(string $hour_from) Return the first RateVersion filtered by the hour_from column
 * @method RateVersion findOneByHourTo(string $hour_to) Return the first RateVersion filtered by the hour_to column
 * @method RateVersion findOneBySurcharge(int $surcharge) Return the first RateVersion filtered by the surcharge column
 * @method RateVersion findOneByReducedPercentage(int $reduced_percentage) Return the first RateVersion filtered by the reduced_percentage column
 * @method RateVersion findOneByNote(string $note) Return the first RateVersion filtered by the note column
 * @method RateVersion findOneByCreatedAt(string $created_at) Return the first RateVersion filtered by the created_at column
 * @method RateVersion findOneByUpdatedAt(string $updated_at) Return the first RateVersion filtered by the updated_at column
 * @method RateVersion findOneByVersion(int $version) Return the first RateVersion filtered by the version column
 * @method RateVersion findOneByVersionCreatedAt(string $version_created_at) Return the first RateVersion filtered by the version_created_at column
 * @method RateVersion findOneByVersionCreatedBy(string $version_created_by) Return the first RateVersion filtered by the version_created_by column
 *
 * @method array findById(int $id) Return RateVersion objects filtered by the id column
 * @method array findByName(string $name) Return RateVersion objects filtered by the name column
 * @method array findByDescription(string $description) Return RateVersion objects filtered by the description column
 * @method array findByDay(string $day) Return RateVersion objects filtered by the day column
 * @method array findByHourFrom(string $hour_from) Return RateVersion objects filtered by the hour_from column
 * @method array findByHourTo(string $hour_to) Return RateVersion objects filtered by the hour_to column
 * @method array findBySurcharge(int $surcharge) Return RateVersion objects filtered by the surcharge column
 * @method array findByReducedPercentage(int $reduced_percentage) Return RateVersion objects filtered by the reduced_percentage column
 * @method array findByNote(string $note) Return RateVersion objects filtered by the note column
 * @method array findByCreatedAt(string $created_at) Return RateVersion objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return RateVersion objects filtered by the updated_at column
 * @method array findByVersion(int $version) Return RateVersion objects filtered by the version column
 * @method array findByVersionCreatedAt(string $version_created_at) Return RateVersion objects filtered by the version_created_at column
 * @method array findByVersionCreatedBy(string $version_created_by) Return RateVersion objects filtered by the version_created_by column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRateVersionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRateVersionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'RateVersion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RateVersionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     RateVersionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RateVersionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RateVersionQuery) {
            return $criteria;
        }
        $query = new RateVersionQuery();
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
     * @return   RateVersion|RateVersion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RateVersionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RateVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   RateVersion A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `NAME`, `DESCRIPTION`, `DAY`, `HOUR_FROM`, `HOUR_TO`, `SURCHARGE`, `REDUCED_PERCENTAGE`, `NOTE`, `CREATED_AT`, `UPDATED_AT`, `VERSION`, `VERSION_CREATED_AT`, `VERSION_CREATED_BY` FROM `rate_version` WHERE `ID` = :p0 AND `VERSION` = :p1';
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
            $obj = new RateVersion();
            $obj->hydrate($row);
            RateVersionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return RateVersion|RateVersion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RateVersion[]|mixed the list of results, formatted by the current formatter
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
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(RateVersionPeer::ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(RateVersionPeer::VERSION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(RateVersionPeer::ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(RateVersionPeer::VERSION, $key[1], Criteria::EQUAL);
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
     * @see       filterByRate()
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(RateVersionPeer::ID, $id, $comparison);
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
     * @return RateVersionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RateVersionPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RateVersionPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the day column
     *
     * Example usage:
     * <code>
     * $query->filterByDay('fooValue');   // WHERE day = 'fooValue'
     * $query->filterByDay('%fooValue%'); // WHERE day LIKE '%fooValue%'
     * </code>
     *
     * @param     string $day The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterByDay($day = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($day)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $day)) {
                $day = str_replace('*', '%', $day);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RateVersionPeer::DAY, $day, $comparison);
    }

    /**
     * Filter the query on the hour_from column
     *
     * Example usage:
     * <code>
     * $query->filterByHourFrom('2011-03-14'); // WHERE hour_from = '2011-03-14'
     * $query->filterByHourFrom('now'); // WHERE hour_from = '2011-03-14'
     * $query->filterByHourFrom(array('max' => 'yesterday')); // WHERE hour_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $hourFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterByHourFrom($hourFrom = null, $comparison = null)
    {
        if (is_array($hourFrom)) {
            $useMinMax = false;
            if (isset($hourFrom['min'])) {
                $this->addUsingAlias(RateVersionPeer::HOUR_FROM, $hourFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hourFrom['max'])) {
                $this->addUsingAlias(RateVersionPeer::HOUR_FROM, $hourFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RateVersionPeer::HOUR_FROM, $hourFrom, $comparison);
    }

    /**
     * Filter the query on the hour_to column
     *
     * Example usage:
     * <code>
     * $query->filterByHourTo('2011-03-14'); // WHERE hour_to = '2011-03-14'
     * $query->filterByHourTo('now'); // WHERE hour_to = '2011-03-14'
     * $query->filterByHourTo(array('max' => 'yesterday')); // WHERE hour_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $hourTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterByHourTo($hourTo = null, $comparison = null)
    {
        if (is_array($hourTo)) {
            $useMinMax = false;
            if (isset($hourTo['min'])) {
                $this->addUsingAlias(RateVersionPeer::HOUR_TO, $hourTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hourTo['max'])) {
                $this->addUsingAlias(RateVersionPeer::HOUR_TO, $hourTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RateVersionPeer::HOUR_TO, $hourTo, $comparison);
    }

    /**
     * Filter the query on the surcharge column
     *
     * Example usage:
     * <code>
     * $query->filterBySurcharge(1234); // WHERE surcharge = 1234
     * $query->filterBySurcharge(array(12, 34)); // WHERE surcharge IN (12, 34)
     * $query->filterBySurcharge(array('min' => 12)); // WHERE surcharge > 12
     * </code>
     *
     * @param     mixed $surcharge The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterBySurcharge($surcharge = null, $comparison = null)
    {
        if (is_array($surcharge)) {
            $useMinMax = false;
            if (isset($surcharge['min'])) {
                $this->addUsingAlias(RateVersionPeer::SURCHARGE, $surcharge['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($surcharge['max'])) {
                $this->addUsingAlias(RateVersionPeer::SURCHARGE, $surcharge['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RateVersionPeer::SURCHARGE, $surcharge, $comparison);
    }

    /**
     * Filter the query on the reduced_percentage column
     *
     * Example usage:
     * <code>
     * $query->filterByReducedPercentage(1234); // WHERE reduced_percentage = 1234
     * $query->filterByReducedPercentage(array(12, 34)); // WHERE reduced_percentage IN (12, 34)
     * $query->filterByReducedPercentage(array('min' => 12)); // WHERE reduced_percentage > 12
     * </code>
     *
     * @param     mixed $reducedPercentage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterByReducedPercentage($reducedPercentage = null, $comparison = null)
    {
        if (is_array($reducedPercentage)) {
            $useMinMax = false;
            if (isset($reducedPercentage['min'])) {
                $this->addUsingAlias(RateVersionPeer::REDUCED_PERCENTAGE, $reducedPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reducedPercentage['max'])) {
                $this->addUsingAlias(RateVersionPeer::REDUCED_PERCENTAGE, $reducedPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RateVersionPeer::REDUCED_PERCENTAGE, $reducedPercentage, $comparison);
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
     * @return RateVersionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RateVersionPeer::NOTE, $note, $comparison);
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
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(RateVersionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(RateVersionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RateVersionPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(RateVersionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(RateVersionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RateVersionPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(RateVersionPeer::VERSION, $version, $comparison);
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
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedAt($versionCreatedAt = null, $comparison = null)
    {
        if (is_array($versionCreatedAt)) {
            $useMinMax = false;
            if (isset($versionCreatedAt['min'])) {
                $this->addUsingAlias(RateVersionPeer::VERSION_CREATED_AT, $versionCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedAt['max'])) {
                $this->addUsingAlias(RateVersionPeer::VERSION_CREATED_AT, $versionCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RateVersionPeer::VERSION_CREATED_AT, $versionCreatedAt, $comparison);
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
     * @return RateVersionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RateVersionPeer::VERSION_CREATED_BY, $versionCreatedBy, $comparison);
    }

    /**
     * Filter the query by a related Rate object
     *
     * @param   Rate|PropelObjectCollection $rate The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   RateVersionQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRate($rate, $comparison = null)
    {
        if ($rate instanceof Rate) {
            return $this
                ->addUsingAlias(RateVersionPeer::ID, $rate->getId(), $comparison);
        } elseif ($rate instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RateVersionPeer::ID, $rate->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRate() only accepts arguments of type Rate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function joinRate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rate');

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
            $this->addJoinObject($join, 'Rate');
        }

        return $this;
    }

    /**
     * Use the Rate relation Rate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RateQuery A secondary query class using the current class as primary query
     */
    public function useRateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rate', 'RateQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RateVersion $rateVersion Object to remove from the list of results
     *
     * @return RateVersionQuery The current query, for fluid interface
     */
    public function prune($rateVersion = null)
    {
        if ($rateVersion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(RateVersionPeer::ID), $rateVersion->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(RateVersionPeer::VERSION), $rateVersion->getVersion(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
