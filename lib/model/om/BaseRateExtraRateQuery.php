<?php


/**
 * Base class that represents a query for the 'rate_extra_rate' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sat Dec  6 09:58:27 2014
 *
 * @method RateExtraRateQuery orderByRateId($order = Criteria::ASC) Order by the rate_id column
 * @method RateExtraRateQuery orderByRateExtraId($order = Criteria::ASC) Order by the rate_extra_id column
 *
 * @method RateExtraRateQuery groupByRateId() Group by the rate_id column
 * @method RateExtraRateQuery groupByRateExtraId() Group by the rate_extra_id column
 *
 * @method RateExtraRateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RateExtraRateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RateExtraRateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RateExtraRateQuery leftJoinRate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rate relation
 * @method RateExtraRateQuery rightJoinRate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rate relation
 * @method RateExtraRateQuery innerJoinRate($relationAlias = null) Adds a INNER JOIN clause to the query using the Rate relation
 *
 * @method RateExtraRateQuery leftJoinRateExtra($relationAlias = null) Adds a LEFT JOIN clause to the query using the RateExtra relation
 * @method RateExtraRateQuery rightJoinRateExtra($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RateExtra relation
 * @method RateExtraRateQuery innerJoinRateExtra($relationAlias = null) Adds a INNER JOIN clause to the query using the RateExtra relation
 *
 * @method RateExtraRate findOne(PropelPDO $con = null) Return the first RateExtraRate matching the query
 * @method RateExtraRate findOneOrCreate(PropelPDO $con = null) Return the first RateExtraRate matching the query, or a new RateExtraRate object populated from the query conditions when no match is found
 *
 * @method RateExtraRate findOneByRateId(int $rate_id) Return the first RateExtraRate filtered by the rate_id column
 * @method RateExtraRate findOneByRateExtraId(int $rate_extra_id) Return the first RateExtraRate filtered by the rate_extra_id column
 *
 * @method array findByRateId(int $rate_id) Return RateExtraRate objects filtered by the rate_id column
 * @method array findByRateExtraId(int $rate_extra_id) Return RateExtraRate objects filtered by the rate_extra_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRateExtraRateQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRateExtraRateQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'RateExtraRate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RateExtraRateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     RateExtraRateQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RateExtraRateQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RateExtraRateQuery) {
            return $criteria;
        }
        $query = new RateExtraRateQuery();
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
                         A Primary key composition: [$rate_id, $rate_extra_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   RateExtraRate|RateExtraRate[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RateExtraRatePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RateExtraRatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   RateExtraRate A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `RATE_ID`, `RATE_EXTRA_ID` FROM `rate_extra_rate` WHERE `RATE_ID` = :p0 AND `RATE_EXTRA_ID` = :p1';
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
            $obj = new RateExtraRate();
            $obj->hydrate($row);
            RateExtraRatePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return RateExtraRate|RateExtraRate[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RateExtraRate[]|mixed the list of results, formatted by the current formatter
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
     * @return RateExtraRateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(RateExtraRatePeer::RATE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(RateExtraRatePeer::RATE_EXTRA_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RateExtraRateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(RateExtraRatePeer::RATE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(RateExtraRatePeer::RATE_EXTRA_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByRate()
     *
     * @param     mixed $rateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RateExtraRateQuery The current query, for fluid interface
     */
    public function filterByRateId($rateId = null, $comparison = null)
    {
        if (is_array($rateId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(RateExtraRatePeer::RATE_ID, $rateId, $comparison);
    }

    /**
     * Filter the query on the rate_extra_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRateExtraId(1234); // WHERE rate_extra_id = 1234
     * $query->filterByRateExtraId(array(12, 34)); // WHERE rate_extra_id IN (12, 34)
     * $query->filterByRateExtraId(array('min' => 12)); // WHERE rate_extra_id > 12
     * </code>
     *
     * @see       filterByRateExtra()
     *
     * @param     mixed $rateExtraId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RateExtraRateQuery The current query, for fluid interface
     */
    public function filterByRateExtraId($rateExtraId = null, $comparison = null)
    {
        if (is_array($rateExtraId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(RateExtraRatePeer::RATE_EXTRA_ID, $rateExtraId, $comparison);
    }

    /**
     * Filter the query by a related Rate object
     *
     * @param   Rate|PropelObjectCollection $rate The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   RateExtraRateQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRate($rate, $comparison = null)
    {
        if ($rate instanceof Rate) {
            return $this
                ->addUsingAlias(RateExtraRatePeer::RATE_ID, $rate->getId(), $comparison);
        } elseif ($rate instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RateExtraRatePeer::RATE_ID, $rate->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return RateExtraRateQuery The current query, for fluid interface
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
     * Filter the query by a related RateExtra object
     *
     * @param   RateExtra|PropelObjectCollection $rateExtra The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   RateExtraRateQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRateExtra($rateExtra, $comparison = null)
    {
        if ($rateExtra instanceof RateExtra) {
            return $this
                ->addUsingAlias(RateExtraRatePeer::RATE_EXTRA_ID, $rateExtra->getId(), $comparison);
        } elseif ($rateExtra instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RateExtraRatePeer::RATE_EXTRA_ID, $rateExtra->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRateExtra() only accepts arguments of type RateExtra or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RateExtra relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RateExtraRateQuery The current query, for fluid interface
     */
    public function joinRateExtra($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RateExtra');

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
            $this->addJoinObject($join, 'RateExtra');
        }

        return $this;
    }

    /**
     * Use the RateExtra relation RateExtra object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RateExtraQuery A secondary query class using the current class as primary query
     */
    public function useRateExtraQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRateExtra($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RateExtra', 'RateExtraQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RateExtraRate $rateExtraRate Object to remove from the list of results
     *
     * @return RateExtraRateQuery The current query, for fluid interface
     */
    public function prune($rateExtraRate = null)
    {
        if ($rateExtraRate) {
            $this->addCond('pruneCond0', $this->getAliasedColName(RateExtraRatePeer::RATE_ID), $rateExtraRate->getRateId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(RateExtraRatePeer::RATE_EXTRA_ID), $rateExtraRate->getRateExtraId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
