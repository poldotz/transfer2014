<?php


/**
 * Base class that represents a query for the 'route' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Dec  3 16:02:41 2014
 *
 * @method RouteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RouteQuery orderByLocalityFrom($order = Criteria::ASC) Order by the locality_from column
 * @method RouteQuery orderByLocalityTo($order = Criteria::ASC) Order by the locality_to column
 * @method RouteQuery orderByDuration($order = Criteria::ASC) Order by the duration column
 * @method RouteQuery orderByDistance($order = Criteria::ASC) Order by the distance column
 *
 * @method RouteQuery groupById() Group by the id column
 * @method RouteQuery groupByLocalityFrom() Group by the locality_from column
 * @method RouteQuery groupByLocalityTo() Group by the locality_to column
 * @method RouteQuery groupByDuration() Group by the duration column
 * @method RouteQuery groupByDistance() Group by the distance column
 *
 * @method RouteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RouteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RouteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RouteQuery leftJoinLocalityRelatedByLocalityFrom($relationAlias = null) Adds a LEFT JOIN clause to the query using the LocalityRelatedByLocalityFrom relation
 * @method RouteQuery rightJoinLocalityRelatedByLocalityFrom($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LocalityRelatedByLocalityFrom relation
 * @method RouteQuery innerJoinLocalityRelatedByLocalityFrom($relationAlias = null) Adds a INNER JOIN clause to the query using the LocalityRelatedByLocalityFrom relation
 *
 * @method RouteQuery leftJoinLocalityRelatedByLocalityTo($relationAlias = null) Adds a LEFT JOIN clause to the query using the LocalityRelatedByLocalityTo relation
 * @method RouteQuery rightJoinLocalityRelatedByLocalityTo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LocalityRelatedByLocalityTo relation
 * @method RouteQuery innerJoinLocalityRelatedByLocalityTo($relationAlias = null) Adds a INNER JOIN clause to the query using the LocalityRelatedByLocalityTo relation
 *
 * @method Route findOne(PropelPDO $con = null) Return the first Route matching the query
 * @method Route findOneOrCreate(PropelPDO $con = null) Return the first Route matching the query, or a new Route object populated from the query conditions when no match is found
 *
 * @method Route findOneById(int $id) Return the first Route filtered by the id column
 * @method Route findOneByLocalityFrom(int $locality_from) Return the first Route filtered by the locality_from column
 * @method Route findOneByLocalityTo(int $locality_to) Return the first Route filtered by the locality_to column
 * @method Route findOneByDuration(string $duration) Return the first Route filtered by the duration column
 * @method Route findOneByDistance(int $distance) Return the first Route filtered by the distance column
 *
 * @method array findById(int $id) Return Route objects filtered by the id column
 * @method array findByLocalityFrom(int $locality_from) Return Route objects filtered by the locality_from column
 * @method array findByLocalityTo(int $locality_to) Return Route objects filtered by the locality_to column
 * @method array findByDuration(string $duration) Return Route objects filtered by the duration column
 * @method array findByDistance(int $distance) Return Route objects filtered by the distance column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRouteQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRouteQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Route', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RouteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     RouteQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RouteQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RouteQuery) {
            return $criteria;
        }
        $query = new RouteQuery();
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
     * @return   Route|Route[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RoutePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RoutePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Route A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `LOCALITY_FROM`, `LOCALITY_TO`, `DURATION`, `DISTANCE` FROM `route` WHERE `ID` = :p0';
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
            $obj = new Route();
            $obj->hydrate($row);
            RoutePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Route|Route[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Route[]|mixed the list of results, formatted by the current formatter
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
     * @return RouteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RoutePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RouteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RoutePeer::ID, $keys, Criteria::IN);
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
     * @return RouteQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(RoutePeer::ID, $id, $comparison);
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
     * @see       filterByLocalityRelatedByLocalityFrom()
     *
     * @param     mixed $localityFrom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RouteQuery The current query, for fluid interface
     */
    public function filterByLocalityFrom($localityFrom = null, $comparison = null)
    {
        if (is_array($localityFrom)) {
            $useMinMax = false;
            if (isset($localityFrom['min'])) {
                $this->addUsingAlias(RoutePeer::LOCALITY_FROM, $localityFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($localityFrom['max'])) {
                $this->addUsingAlias(RoutePeer::LOCALITY_FROM, $localityFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RoutePeer::LOCALITY_FROM, $localityFrom, $comparison);
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
     * @see       filterByLocalityRelatedByLocalityTo()
     *
     * @param     mixed $localityTo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RouteQuery The current query, for fluid interface
     */
    public function filterByLocalityTo($localityTo = null, $comparison = null)
    {
        if (is_array($localityTo)) {
            $useMinMax = false;
            if (isset($localityTo['min'])) {
                $this->addUsingAlias(RoutePeer::LOCALITY_TO, $localityTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($localityTo['max'])) {
                $this->addUsingAlias(RoutePeer::LOCALITY_TO, $localityTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RoutePeer::LOCALITY_TO, $localityTo, $comparison);
    }

    /**
     * Filter the query on the duration column
     *
     * Example usage:
     * <code>
     * $query->filterByDuration('2011-03-14'); // WHERE duration = '2011-03-14'
     * $query->filterByDuration('now'); // WHERE duration = '2011-03-14'
     * $query->filterByDuration(array('max' => 'yesterday')); // WHERE duration > '2011-03-13'
     * </code>
     *
     * @param     mixed $duration The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RouteQuery The current query, for fluid interface
     */
    public function filterByDuration($duration = null, $comparison = null)
    {
        if (is_array($duration)) {
            $useMinMax = false;
            if (isset($duration['min'])) {
                $this->addUsingAlias(RoutePeer::DURATION, $duration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($duration['max'])) {
                $this->addUsingAlias(RoutePeer::DURATION, $duration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RoutePeer::DURATION, $duration, $comparison);
    }

    /**
     * Filter the query on the distance column
     *
     * Example usage:
     * <code>
     * $query->filterByDistance(1234); // WHERE distance = 1234
     * $query->filterByDistance(array(12, 34)); // WHERE distance IN (12, 34)
     * $query->filterByDistance(array('min' => 12)); // WHERE distance > 12
     * </code>
     *
     * @param     mixed $distance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RouteQuery The current query, for fluid interface
     */
    public function filterByDistance($distance = null, $comparison = null)
    {
        if (is_array($distance)) {
            $useMinMax = false;
            if (isset($distance['min'])) {
                $this->addUsingAlias(RoutePeer::DISTANCE, $distance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($distance['max'])) {
                $this->addUsingAlias(RoutePeer::DISTANCE, $distance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RoutePeer::DISTANCE, $distance, $comparison);
    }

    /**
     * Filter the query by a related Locality object
     *
     * @param   Locality|PropelObjectCollection $locality The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   RouteQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByLocalityRelatedByLocalityFrom($locality, $comparison = null)
    {
        if ($locality instanceof Locality) {
            return $this
                ->addUsingAlias(RoutePeer::LOCALITY_FROM, $locality->getId(), $comparison);
        } elseif ($locality instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RoutePeer::LOCALITY_FROM, $locality->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByLocalityRelatedByLocalityFrom() only accepts arguments of type Locality or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LocalityRelatedByLocalityFrom relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RouteQuery The current query, for fluid interface
     */
    public function joinLocalityRelatedByLocalityFrom($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LocalityRelatedByLocalityFrom');

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
            $this->addJoinObject($join, 'LocalityRelatedByLocalityFrom');
        }

        return $this;
    }

    /**
     * Use the LocalityRelatedByLocalityFrom relation Locality object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   LocalityQuery A secondary query class using the current class as primary query
     */
    public function useLocalityRelatedByLocalityFromQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLocalityRelatedByLocalityFrom($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LocalityRelatedByLocalityFrom', 'LocalityQuery');
    }

    /**
     * Filter the query by a related Locality object
     *
     * @param   Locality|PropelObjectCollection $locality The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   RouteQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByLocalityRelatedByLocalityTo($locality, $comparison = null)
    {
        if ($locality instanceof Locality) {
            return $this
                ->addUsingAlias(RoutePeer::LOCALITY_TO, $locality->getId(), $comparison);
        } elseif ($locality instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RoutePeer::LOCALITY_TO, $locality->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByLocalityRelatedByLocalityTo() only accepts arguments of type Locality or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LocalityRelatedByLocalityTo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RouteQuery The current query, for fluid interface
     */
    public function joinLocalityRelatedByLocalityTo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LocalityRelatedByLocalityTo');

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
            $this->addJoinObject($join, 'LocalityRelatedByLocalityTo');
        }

        return $this;
    }

    /**
     * Use the LocalityRelatedByLocalityTo relation Locality object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   LocalityQuery A secondary query class using the current class as primary query
     */
    public function useLocalityRelatedByLocalityToQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLocalityRelatedByLocalityTo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LocalityRelatedByLocalityTo', 'LocalityQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Route $route Object to remove from the list of results
     *
     * @return RouteQuery The current query, for fluid interface
     */
    public function prune($route = null)
    {
        if ($route) {
            $this->addUsingAlias(RoutePeer::ID, $route->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
