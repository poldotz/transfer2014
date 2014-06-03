<?php


/**
 * Base class that represents a query for the 'company' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue 03 Jun 2014 03:49:25 PM CEST
 *
 * @method CompanyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CompanyQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method CompanyQuery orderByVatNumber($order = Criteria::ASC) Order by the vat_number column
 * @method CompanyQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method CompanyQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method CompanyQuery orderByMobile($order = Criteria::ASC) Order by the mobile column
 * @method CompanyQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method CompanyQuery orderBySite($order = Criteria::ASC) Order by the site column
 * @method CompanyQuery orderByFormattedAddress($order = Criteria::ASC) Order by the formatted_address column
 * @method CompanyQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method CompanyQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method CompanyQuery orderByLatitude($order = Criteria::ASC) Order by the latitude column
 * @method CompanyQuery orderByLongitude($order = Criteria::ASC) Order by the longitude column
 *
 * @method CompanyQuery groupById() Group by the id column
 * @method CompanyQuery groupByName() Group by the name column
 * @method CompanyQuery groupByVatNumber() Group by the vat_number column
 * @method CompanyQuery groupByPhone() Group by the phone column
 * @method CompanyQuery groupByFax() Group by the fax column
 * @method CompanyQuery groupByMobile() Group by the mobile column
 * @method CompanyQuery groupByEmail() Group by the email column
 * @method CompanyQuery groupBySite() Group by the site column
 * @method CompanyQuery groupByFormattedAddress() Group by the formatted_address column
 * @method CompanyQuery groupByCreatedAt() Group by the created_at column
 * @method CompanyQuery groupByUpdatedAt() Group by the updated_at column
 * @method CompanyQuery groupByLatitude() Group by the latitude column
 * @method CompanyQuery groupByLongitude() Group by the longitude column
 *
 * @method CompanyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CompanyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CompanyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Company findOne(PropelPDO $con = null) Return the first Company matching the query
 * @method Company findOneOrCreate(PropelPDO $con = null) Return the first Company matching the query, or a new Company object populated from the query conditions when no match is found
 *
 * @method Company findOneById(int $id) Return the first Company filtered by the id column
 * @method Company findOneByName(string $name) Return the first Company filtered by the name column
 * @method Company findOneByVatNumber(string $vat_number) Return the first Company filtered by the vat_number column
 * @method Company findOneByPhone(string $phone) Return the first Company filtered by the phone column
 * @method Company findOneByFax(string $fax) Return the first Company filtered by the fax column
 * @method Company findOneByMobile(string $mobile) Return the first Company filtered by the mobile column
 * @method Company findOneByEmail(string $email) Return the first Company filtered by the email column
 * @method Company findOneBySite(string $site) Return the first Company filtered by the site column
 * @method Company findOneByFormattedAddress(string $formatted_address) Return the first Company filtered by the formatted_address column
 * @method Company findOneByCreatedAt(string $created_at) Return the first Company filtered by the created_at column
 * @method Company findOneByUpdatedAt(string $updated_at) Return the first Company filtered by the updated_at column
 * @method Company findOneByLatitude(double $latitude) Return the first Company filtered by the latitude column
 * @method Company findOneByLongitude(double $longitude) Return the first Company filtered by the longitude column
 *
 * @method array findById(int $id) Return Company objects filtered by the id column
 * @method array findByName(string $name) Return Company objects filtered by the name column
 * @method array findByVatNumber(string $vat_number) Return Company objects filtered by the vat_number column
 * @method array findByPhone(string $phone) Return Company objects filtered by the phone column
 * @method array findByFax(string $fax) Return Company objects filtered by the fax column
 * @method array findByMobile(string $mobile) Return Company objects filtered by the mobile column
 * @method array findByEmail(string $email) Return Company objects filtered by the email column
 * @method array findBySite(string $site) Return Company objects filtered by the site column
 * @method array findByFormattedAddress(string $formatted_address) Return Company objects filtered by the formatted_address column
 * @method array findByCreatedAt(string $created_at) Return Company objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Company objects filtered by the updated_at column
 * @method array findByLatitude(double $latitude) Return Company objects filtered by the latitude column
 * @method array findByLongitude(double $longitude) Return Company objects filtered by the longitude column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCompanyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCompanyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Company', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CompanyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CompanyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CompanyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CompanyQuery) {
            return $criteria;
        }
        $query = new CompanyQuery();
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
     * @return   Company|Company[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CompanyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Company A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `NAME`, `VAT_NUMBER`, `PHONE`, `FAX`, `MOBILE`, `EMAIL`, `SITE`, `FORMATTED_ADDRESS`, `CREATED_AT`, `UPDATED_AT`, `LATITUDE`, `LONGITUDE` FROM `company` WHERE `ID` = :p0';
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
            $obj = new Company();
            $obj->hydrate($row);
            CompanyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Company|Company[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Company[]|mixed the list of results, formatted by the current formatter
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
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CompanyPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CompanyPeer::ID, $keys, Criteria::IN);
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
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CompanyPeer::ID, $id, $comparison);
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
     * @return CompanyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CompanyPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the vat_number column
     *
     * Example usage:
     * <code>
     * $query->filterByVatNumber('fooValue');   // WHERE vat_number = 'fooValue'
     * $query->filterByVatNumber('%fooValue%'); // WHERE vat_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vatNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByVatNumber($vatNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vatNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $vatNumber)) {
                $vatNumber = str_replace('*', '%', $vatNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyPeer::VAT_NUMBER, $vatNumber, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyPeer::PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the fax column
     *
     * Example usage:
     * <code>
     * $query->filterByFax('fooValue');   // WHERE fax = 'fooValue'
     * $query->filterByFax('%fooValue%'); // WHERE fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fax The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fax)) {
                $fax = str_replace('*', '%', $fax);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyPeer::FAX, $fax, $comparison);
    }

    /**
     * Filter the query on the mobile column
     *
     * Example usage:
     * <code>
     * $query->filterByMobile('fooValue');   // WHERE mobile = 'fooValue'
     * $query->filterByMobile('%fooValue%'); // WHERE mobile LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mobile The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByMobile($mobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobile)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mobile)) {
                $mobile = str_replace('*', '%', $mobile);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyPeer::MOBILE, $mobile, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the site column
     *
     * Example usage:
     * <code>
     * $query->filterBySite('fooValue');   // WHERE site = 'fooValue'
     * $query->filterBySite('%fooValue%'); // WHERE site LIKE '%fooValue%'
     * </code>
     *
     * @param     string $site The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterBySite($site = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($site)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $site)) {
                $site = str_replace('*', '%', $site);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyPeer::SITE, $site, $comparison);
    }

    /**
     * Filter the query on the formatted_address column
     *
     * Example usage:
     * <code>
     * $query->filterByFormattedAddress('fooValue');   // WHERE formatted_address = 'fooValue'
     * $query->filterByFormattedAddress('%fooValue%'); // WHERE formatted_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $formattedAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByFormattedAddress($formattedAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($formattedAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $formattedAddress)) {
                $formattedAddress = str_replace('*', '%', $formattedAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyPeer::FORMATTED_ADDRESS, $formattedAddress, $comparison);
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
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CompanyPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CompanyPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompanyPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CompanyPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CompanyPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompanyPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the latitude column
     *
     * Example usage:
     * <code>
     * $query->filterByLatitude(1234); // WHERE latitude = 1234
     * $query->filterByLatitude(array(12, 34)); // WHERE latitude IN (12, 34)
     * $query->filterByLatitude(array('min' => 12)); // WHERE latitude > 12
     * </code>
     *
     * @param     mixed $latitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByLatitude($latitude = null, $comparison = null)
    {
        if (is_array($latitude)) {
            $useMinMax = false;
            if (isset($latitude['min'])) {
                $this->addUsingAlias(CompanyPeer::LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($latitude['max'])) {
                $this->addUsingAlias(CompanyPeer::LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompanyPeer::LATITUDE, $latitude, $comparison);
    }

    /**
     * Filter the query on the longitude column
     *
     * Example usage:
     * <code>
     * $query->filterByLongitude(1234); // WHERE longitude = 1234
     * $query->filterByLongitude(array(12, 34)); // WHERE longitude IN (12, 34)
     * $query->filterByLongitude(array('min' => 12)); // WHERE longitude > 12
     * </code>
     *
     * @param     mixed $longitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByLongitude($longitude = null, $comparison = null)
    {
        if (is_array($longitude)) {
            $useMinMax = false;
            if (isset($longitude['min'])) {
                $this->addUsingAlias(CompanyPeer::LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($longitude['max'])) {
                $this->addUsingAlias(CompanyPeer::LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompanyPeer::LONGITUDE, $longitude, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Company $company Object to remove from the list of results
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function prune($company = null)
    {
        if ($company) {
            $this->addUsingAlias(CompanyPeer::ID, $company->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // Timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     CompanyQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(CompanyPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     CompanyQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(CompanyPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     CompanyQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(CompanyPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     CompanyQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(CompanyPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     CompanyQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(CompanyPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     CompanyQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(CompanyPeer::CREATED_AT);
    }
    // Geocodable behavior

    /**
     * Adds distance from a given origin column to query.
     *
     * @param double $latitude       The latitude of the origin point.
     * @param double $longitude      The longitude of the origin point.
     * @param double $unit           The unit measure.
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function withDistance($latitude, $longitude, $unit = CompanyPeer::KILOMETERS_UNIT)
    {
        if (CompanyPeer::MILES_UNIT === $unit) {
            $earthRadius = 3959;
        } elseif (CompanyPeer::NAUTICAL_MILES_UNIT === $unit) {
            $earthRadius = 3440;
        } else {
            $earthRadius = 6371;
        }

        $sql = 'ABS(%s * ACOS(%s * COS(RADIANS(%s)) * COS(RADIANS(%s) - %s) + %s * SIN(RADIANS(%s))))';
        $preparedSql = sprintf($sql,
            $earthRadius,
            cos(deg2rad($latitude)),
            $this->getAliasedColName(CompanyPeer::LATITUDE),
            $this->getAliasedColName(CompanyPeer::LONGITUDE),
            deg2rad($longitude),
            sin(deg2rad($latitude)),
            $this->getAliasedColName(CompanyPeer::LATITUDE)
        );

        return $this
            ->withColumn($preparedSql, 'Distance');
    }

    /**
     * Filters objects by distance from a given origin.
     *
     * @param double $latitude       The latitude of the origin point.
     * @param double $longitude      The longitude of the origin point.
     * @param double $distance       The distance between the origin and the objects to find.
     * @param double $unit           The unit measure.
     * @param Criteria $comparison   Comparison sign (default is: `<`).
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByDistanceFrom($latitude, $longitude, $distance, $unit = CompanyPeer::KILOMETERS_UNIT, $comparison = Criteria::LESS_THAN)
    {
        return $this
            ->withDistance($latitude, $longitude, $unit)
            ->where(sprintf('Distance %s ?', $comparison), $distance, PDO::PARAM_STR)
            ;
    }
    /**
     * Filters objects near a given Company object.
     *
     * @param Company $company A Company object.
     * @param double $distance The distance between the origin and the objects to find.
     * @param double $unit     The unit measure.
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterNear(Company $company, $distance = 5, $unit = CompanyPeer::KILOMETERS_UNIT)
    {
        return $this
            ->filterByDistanceFrom(
                $company->getLatitude(),
                $company->getLongitude(),
                $distance, $unit
            );
    }

}
