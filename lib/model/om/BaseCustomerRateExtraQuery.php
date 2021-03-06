<?php


/**
 * Base class that represents a query for the 'customer_rate_extra' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sat Dec  6 11:52:06 2014
 *
 * @method CustomerRateExtraQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method CustomerRateExtraQuery orderByRateExtraId($order = Criteria::ASC) Order by the rate_extra_id column
 * @method CustomerRateExtraQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method CustomerRateExtraQuery orderByTypology($order = Criteria::ASC) Order by the typology column
 *
 * @method CustomerRateExtraQuery groupByCustomerId() Group by the customer_id column
 * @method CustomerRateExtraQuery groupByRateExtraId() Group by the rate_extra_id column
 * @method CustomerRateExtraQuery groupByValue() Group by the value column
 * @method CustomerRateExtraQuery groupByTypology() Group by the typology column
 *
 * @method CustomerRateExtraQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CustomerRateExtraQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CustomerRateExtraQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CustomerRateExtraQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method CustomerRateExtraQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method CustomerRateExtraQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method CustomerRateExtraQuery leftJoinRateExtra($relationAlias = null) Adds a LEFT JOIN clause to the query using the RateExtra relation
 * @method CustomerRateExtraQuery rightJoinRateExtra($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RateExtra relation
 * @method CustomerRateExtraQuery innerJoinRateExtra($relationAlias = null) Adds a INNER JOIN clause to the query using the RateExtra relation
 *
 * @method CustomerRateExtra findOne(PropelPDO $con = null) Return the first CustomerRateExtra matching the query
 * @method CustomerRateExtra findOneOrCreate(PropelPDO $con = null) Return the first CustomerRateExtra matching the query, or a new CustomerRateExtra object populated from the query conditions when no match is found
 *
 * @method CustomerRateExtra findOneByCustomerId(int $customer_id) Return the first CustomerRateExtra filtered by the customer_id column
 * @method CustomerRateExtra findOneByRateExtraId(int $rate_extra_id) Return the first CustomerRateExtra filtered by the rate_extra_id column
 * @method CustomerRateExtra findOneByValue(string $value) Return the first CustomerRateExtra filtered by the value column
 * @method CustomerRateExtra findOneByTypology(int $typology) Return the first CustomerRateExtra filtered by the typology column
 *
 * @method array findByCustomerId(int $customer_id) Return CustomerRateExtra objects filtered by the customer_id column
 * @method array findByRateExtraId(int $rate_extra_id) Return CustomerRateExtra objects filtered by the rate_extra_id column
 * @method array findByValue(string $value) Return CustomerRateExtra objects filtered by the value column
 * @method array findByTypology(int $typology) Return CustomerRateExtra objects filtered by the typology column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCustomerRateExtraQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCustomerRateExtraQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'CustomerRateExtra', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CustomerRateExtraQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CustomerRateExtraQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CustomerRateExtraQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CustomerRateExtraQuery) {
            return $criteria;
        }
        $query = new CustomerRateExtraQuery();
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
                         A Primary key composition: [$customer_id, $rate_extra_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   CustomerRateExtra|CustomerRateExtra[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CustomerRateExtraPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CustomerRateExtraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   CustomerRateExtra A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `CUSTOMER_ID`, `RATE_EXTRA_ID`, `VALUE`, `TYPOLOGY` FROM `customer_rate_extra` WHERE `CUSTOMER_ID` = :p0 AND `RATE_EXTRA_ID` = :p1';
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
            $obj = new CustomerRateExtra();
            $obj->hydrate($row);
            CustomerRateExtraPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return CustomerRateExtra|CustomerRateExtra[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|CustomerRateExtra[]|mixed the list of results, formatted by the current formatter
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
     * @return CustomerRateExtraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CustomerRateExtraPeer::CUSTOMER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CustomerRateExtraPeer::RATE_EXTRA_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CustomerRateExtraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CustomerRateExtraPeer::CUSTOMER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CustomerRateExtraPeer::RATE_EXTRA_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByCustomer()
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerRateExtraQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CustomerRateExtraPeer::CUSTOMER_ID, $customerId, $comparison);
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
     * @return CustomerRateExtraQuery The current query, for fluid interface
     */
    public function filterByRateExtraId($rateExtraId = null, $comparison = null)
    {
        if (is_array($rateExtraId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CustomerRateExtraPeer::RATE_EXTRA_ID, $rateExtraId, $comparison);
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
     * @return CustomerRateExtraQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(CustomerRateExtraPeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(CustomerRateExtraPeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerRateExtraPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the typology column
     *
     * @param     mixed $typology The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CustomerRateExtraQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByTypology($typology = null, $comparison = null)
    {
        $valueSet = CustomerRateExtraPeer::getValueSet(CustomerRateExtraPeer::TYPOLOGY);
        if (is_scalar($typology)) {
            if (!in_array($typology, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $typology));
            }
            $typology = array_search($typology, $valueSet);
        } elseif (is_array($typology)) {
            $convertedValues = array();
            foreach ($typology as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $typology = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerRateExtraPeer::TYPOLOGY, $typology, $comparison);
    }

    /**
     * Filter the query by a related Customer object
     *
     * @param   Customer|PropelObjectCollection $customer The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CustomerRateExtraQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCustomer($customer, $comparison = null)
    {
        if ($customer instanceof Customer) {
            return $this
                ->addUsingAlias(CustomerRateExtraPeer::CUSTOMER_ID, $customer->getId(), $comparison);
        } elseif ($customer instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CustomerRateExtraPeer::CUSTOMER_ID, $customer->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCustomer() only accepts arguments of type Customer or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Customer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CustomerRateExtraQuery The current query, for fluid interface
     */
    public function joinCustomer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Customer');

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
            $this->addJoinObject($join, 'Customer');
        }

        return $this;
    }

    /**
     * Use the Customer relation Customer object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CustomerQuery A secondary query class using the current class as primary query
     */
    public function useCustomerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customer', 'CustomerQuery');
    }

    /**
     * Filter the query by a related RateExtra object
     *
     * @param   RateExtra|PropelObjectCollection $rateExtra The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CustomerRateExtraQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRateExtra($rateExtra, $comparison = null)
    {
        if ($rateExtra instanceof RateExtra) {
            return $this
                ->addUsingAlias(CustomerRateExtraPeer::RATE_EXTRA_ID, $rateExtra->getId(), $comparison);
        } elseif ($rateExtra instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CustomerRateExtraPeer::RATE_EXTRA_ID, $rateExtra->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return CustomerRateExtraQuery The current query, for fluid interface
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
     * @param   CustomerRateExtra $customerRateExtra Object to remove from the list of results
     *
     * @return CustomerRateExtraQuery The current query, for fluid interface
     */
    public function prune($customerRateExtra = null)
    {
        if ($customerRateExtra) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CustomerRateExtraPeer::CUSTOMER_ID), $customerRateExtra->getCustomerId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CustomerRateExtraPeer::RATE_EXTRA_ID), $customerRateExtra->getRateExtraId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
