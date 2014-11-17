<?php


/**
 * Base class that represents a query for the 'rate_extra' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon Nov 17 17:31:37 2014
 *
 * @method RateExtraQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RateExtraQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RateExtraQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method RateExtraQuery groupById() Group by the id column
 * @method RateExtraQuery groupByName() Group by the name column
 * @method RateExtraQuery groupByValue() Group by the value column
 *
 * @method RateExtraQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RateExtraQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RateExtraQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RateExtraQuery leftJoinRateExtraRate($relationAlias = null) Adds a LEFT JOIN clause to the query using the RateExtraRate relation
 * @method RateExtraQuery rightJoinRateExtraRate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RateExtraRate relation
 * @method RateExtraQuery innerJoinRateExtraRate($relationAlias = null) Adds a INNER JOIN clause to the query using the RateExtraRate relation
 *
 * @method RateExtra findOne(PropelPDO $con = null) Return the first RateExtra matching the query
 * @method RateExtra findOneOrCreate(PropelPDO $con = null) Return the first RateExtra matching the query, or a new RateExtra object populated from the query conditions when no match is found
 *
 * @method RateExtra findOneById(int $id) Return the first RateExtra filtered by the id column
 * @method RateExtra findOneByName(string $name) Return the first RateExtra filtered by the name column
 * @method RateExtra findOneByValue(int $value) Return the first RateExtra filtered by the value column
 *
 * @method array findById(int $id) Return RateExtra objects filtered by the id column
 * @method array findByName(string $name) Return RateExtra objects filtered by the name column
 * @method array findByValue(int $value) Return RateExtra objects filtered by the value column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRateExtraQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRateExtraQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'RateExtra', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RateExtraQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     RateExtraQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RateExtraQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RateExtraQuery) {
            return $criteria;
        }
        $query = new RateExtraQuery();
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
     * @return   RateExtra|RateExtra[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RateExtraPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RateExtraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   RateExtra A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `NAME`, `VALUE` FROM `rate_extra` WHERE `ID` = :p0';
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
            $obj = new RateExtra();
            $obj->hydrate($row);
            RateExtraPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RateExtra|RateExtra[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RateExtra[]|mixed the list of results, formatted by the current formatter
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
     * @return RateExtraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RateExtraPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RateExtraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RateExtraPeer::ID, $keys, Criteria::IN);
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
     * @return RateExtraQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(RateExtraPeer::ID, $id, $comparison);
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
     * @return RateExtraQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RateExtraPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value > 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RateExtraQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(RateExtraPeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(RateExtraPeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RateExtraPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related RateExtraRate object
     *
     * @param   RateExtraRate|PropelObjectCollection $rateExtraRate  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   RateExtraQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRateExtraRate($rateExtraRate, $comparison = null)
    {
        if ($rateExtraRate instanceof RateExtraRate) {
            return $this
                ->addUsingAlias(RateExtraPeer::ID, $rateExtraRate->getRateExtraId(), $comparison);
        } elseif ($rateExtraRate instanceof PropelObjectCollection) {
            return $this
                ->useRateExtraRateQuery()
                ->filterByPrimaryKeys($rateExtraRate->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRateExtraRate() only accepts arguments of type RateExtraRate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RateExtraRate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RateExtraQuery The current query, for fluid interface
     */
    public function joinRateExtraRate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RateExtraRate');

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
            $this->addJoinObject($join, 'RateExtraRate');
        }

        return $this;
    }

    /**
     * Use the RateExtraRate relation RateExtraRate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RateExtraRateQuery A secondary query class using the current class as primary query
     */
    public function useRateExtraRateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRateExtraRate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RateExtraRate', 'RateExtraRateQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RateExtra $rateExtra Object to remove from the list of results
     *
     * @return RateExtraQuery The current query, for fluid interface
     */
    public function prune($rateExtra = null)
    {
        if ($rateExtra) {
            $this->addUsingAlias(RateExtraPeer::ID, $rateExtra->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
