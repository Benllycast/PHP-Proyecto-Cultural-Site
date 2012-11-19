<?php
JunctionFileCabinet::using("Junction_Core_Exception");
JunctionFileCabinet::using("Junction_Core_Iterator");
JunctionFileCabinet::using("Junction_Core_Property");
JunctionFileCabinet::using("Junction_Query_Clause_Builder");
JunctionFileCabinet::using("Junction_Utils_HashMap");
JunctionFileCabinet::using("Junction_Utils_Reflection_Facade");
JunctionFileCabinet::using("Junction_Utils_Strings");

JunctionFileCabinet::package("Junction_Db_Common");
JunctionFileCabinet::package("Junction_Query");

define("JUNCTION_MAPPING_GET", "get");
define("JUNCTION_MAPPING_SET", "set");

/**
 * Metadata class describing the relationship between a client's
 * object and the database.
 * 
 * <p>This class is responsible for mapping the client object to
 * the database.  The necessary metadata should be stored in a 
 * mappings file.  The class itself is responsible for creating
 * and executing CRUD queries.
 *
 * @package junction.core
 */
class Junction_Core_Mapping {
	
	/**
	 * The class name as defined in the mappings file.
	 *
	 * @var String
	 */
	private $_classname;
	
	/**
	 * The table name as defined in the mappings file.
	 *
	 * @var String
	 */
	private $_table;
	
	/**
	 * Pointer to the table's key as defined in the mapping
	 * file.  It will point to an element within _properties.
	 *
	 * @var String
	 */
	private $_key;
	
	/**
	 * Hash of properties as defined in the mappings file.
	 * !! It is assumed that this class will always map from
	 * application names to column names. !! 
	 *
	 * @var Junction_Utils_HashMap
	 */
	private $_properties;
	
	/**
	 * Database handle for interating with the database
	 * in an abstracted manner.
	 *
	 * @var Junction_Db_Common_Service
	 */
	private $_dbh;
	
	/**
	 * Create a new mapping object.
	 *
	 * @param String $classname
	 * @param String $table
	 * @param Junction_Core_Property $key
	 * @param array $properties list of Junction_Core_Property s
	 */
	public function __construct($classname, 
								$table, 
								Junction_Core_Property $key, 
								array $properties)
	{
		try {
			$this->_classname = $classname;
			$this->_table = $table;
			
			$this->initProperties($key, $properties);
			
			$this->_dbh = Junction_Db_Common_Factory::construct();
		} catch (Junction_Db_Common_Exception $e) {
			throw new Junction_Core_Exception($e);
		}
	}
	
	/**
	 * Collect the properties in a hash.
	 * 
	 * <p>The key will be the properties name and the value will be
	 * the property itself.
	 *
	 * @param Junction_Core_Property $key
	 * @param array $properties
	 */
	private function initProperties(Junction_Core_Property $key, array $properties) {
		$this->_properties = new Junction_Utils_HashMap();
		$this->_key = $key->getName();
		$this->_properties->put($key->getName(), $key);
		foreach ($properties as $property) {
			$this->_properties->put($property->getName(), $property);	
		}
	}
	
	/**
	 * Retrieve the key property for this class.
	 * 
	 * @return Junction_Core_Property
	 */
	private function getKey() {
		return $this->_properties->get($this->_key);
	}
	
	/**
	 * Load one or more client objects from the database.
	 * 
	 * <p>Fetch all the data which matches the given clause 
	 * from the database and return an iterator which will
	 * iterate over the new client objects. 
	 * 
	 * @throws Junction_Core_Exception
	 *
	 * @param Junction_Query_Clause_Builder $clause
	 * @return Junction_Core_Iterator
	 */
	public function loadBy(Junction_Query_Clause_Builder $clause) {
		try {
			$query = $this->buildQuery(new Junction_Query_Select());
			$sql = $query->toSql() . $this->translateClause($clause->toSql());
			return new Junction_Core_Iterator($this->_dbh->select($sql, $clause->getValues()), $this);
		} catch (Junction_Db_Common_Exception $e) {
			throw new Junction_Core_Exception($e);
		}
	}
	
	/**
	 * Save the given client object's state to the database.
	 * 
	 * <p>If the object is new then it will be assigned a unique
	 * id upon successfully insertion.
	 * 
	 * @throws Junction_Core_Exception
	 *
	 * @param Object $object
	 * @return boolean true on success
	 */
	public function save($object) {
		try {
			if ($this->getValueFor($object, $this->getKey()) != null) {
				return $this->update($object);
			}
			return $this->insert($object);
		} catch (Junction_Db_Common_Exception $e) {
			throw new Junction_Core_Exception($e);
		}
	}
	
	/**
	 * Insert the object's state into the database.
	 * 
	 * <p>On success set the object's id with the row's key.
	 * 
	 * @param Object $object
	 * @return boolean
	 */
	private function insert($object) {
		$query = $this->buildQueryUsing($object, new Junction_Query_Insert());
		if ($this->_dbh->save($query->toSql(), $query->getValues())) {
			$this->setValueFor($object, 
							$this->getKey(), 
							$this->_dbh->lastInsertId());
			return true;
		}
		return false;
	}
	
	/**
	 * Update the row which corresponds to the object.
	 * 
	 * @param Object $object
	 * @return boolean
	 */
	private function update($object) {
		$query = $this->buildQueryUsing($object, new Junction_Query_Update());
		$args = $query->getValues();
		$args[] = $this->getValueFor($object, $this->getKey());
		$sql = $query->toSql() . $this->buildWhereIdClause();
		return $this->_dbh->save($sql, $args);
	}
	
	/**
	 * Delete one or more client objects from the database.
	 * 
	 * <p>Attempt to delete all the data which matches the 
	 * passed clause from the database.
	 * 
	 * @throws Junction_Core_Exception
	 *
	 * @param Junction_Query_Clause_Builder $clause
	 * @return int the number of deleted rows
	 */
	public function deleteBy(Junction_Query_Clause_Builder $clause) {
		try {
			$query = $this->buildQuery(new Junction_Query_Delete());
			$sql = $query->toSql() . $this->translateClause($clause->toSql());
			$this->_dbh->save($sql, $clause->getValues());
			return $this->_dbh->affectedRows();
		} catch (Junction_Db_Common_Exception $e) {
			throw new Junction_Core_Exception($e);
		}
	}
	
	/**
	 * Replace all application names in the given clause with their column names.
	 * 
	 * @param String $clause
	 * @return String
	 */
	private function translateClause($clause) {
		foreach ($this->_properties as $key) {
			$property = $this->_properties->get($key);
			$clause = Junction_Utils_Strings::replaceAll($clause, $property->getName(), $property->getColumn());
		}
		return $clause;
	}
	
	/**
	 * Build a new query using the given builder and object.
	 * 
	 * <p>Iterate over the properties defined in this class and 
	 * bind them to the query.  Also invoke the properties on the
	 * passed object passing the value to the query builder.
	 * 
	 * @param Object $object
	 * @param Junction_Query_Builder $builder
	 * @return Junction_Query_Builder
	 */
	private function buildQueryUsing($object, Junction_Query_Builder $builder) {
		$builder->bindTable($this->_table);
		foreach ($this->getProperties() as $property) {
		if ($property->getName() == $this->_key) {
				$builder->bindKey($property->getColumn(), $this->getValueFor($object, $property));
			} else {
				$builder->bindProperty($property->getColumn(), $this->getValueFor($object, $property));
			}
		}
		return $builder;
	}
	
	/**
	 * Build a new query using the given query builder.
	 * 
	 * <p>Works like buildQueryUsing except that it assumes that the
	 * value for each binding is null.
	 *
	 * @param Junction_Query_Builder $builder
	 * @return Junction_Query_Builder
	 */
	private function buildQuery(Junction_Query_Builder $builder) {
		$builder->bindTable($this->_table);
		foreach ($this->getProperties() as $property) {
			if ($property->getName() == $this->_key) {
				$builder->bindKey($property->getColumn(), null);
			} else {
				$builder->bindProperty($property->getColumn(), null);
			}
		}
		return $builder;
	}
	
	/**
	 * Retrieve a where clause for the key column.
	 * 
	 * <p>This leaves a placeholder for the id itself, which must be
	 * passed as a parameter to the database service.
	 * 
	 * @return String
	 */
	private function buildWhereIdClause() {
		return " WHERE " . $this->getKey()->getColumn() . " = ?";
	}

	/**
	 * Build a new client object from the given data.
	 * 
	 * <p>This method assumes that the incoming data is an
	 * associative array with keys equal to:
	 * <code>{tablename}.{columnname}</code>
	 * <p>as defined in the mapping file.  It will create and 
	 * return a new object as defined by the mapping file.
	 *
	 * @param array $data
	 * @return Object
	 */
	public function makeClientFrom(array $data) {
		$client = Junction_Utils_Reflection_Facade::getInstance($this->_classname, array());
		foreach ($this->getProperties() as $property) {
			$this->setValueFor($client, $property, $data[$property->getColumn()]);
		}
		return $client;
	}
	
	/**
	 * Attempt to find an element with a specific key from the data array.
	 * 
	 * <p>The key should follow the form:
	 * <code>{tablename}.{columnname}</code>
	 * 
	 * @param Junction_Core_Property $property
	 * @param array $data
	 * @return String
	 */
	private function readFromData(Junction_Core_Property $property, array $data) {
		return $data[$this->_table . '.' . $property->getColumn()];
	}
	
	/**
	 * Collect this mapping's properties into a flat array.
	 * 
	 * // TODO optimize this so it caches the result.
	 *
	 * @return array
	 */
	private function getProperties() {
		$result = array();
		foreach ($this->_properties as $key) {
			$result[] = $this->_properties->get($key);
		}
		return $result;
	}
	
	/**
	 * Retrieve the value of the property as represented in the client object.
	 * 
	 * @param Object $object
	 * @param Junction_Core_Property $property
	 * @return unknown
	 */
	private function getValueFor($object, Junction_Core_Property $property) {
		return Junction_Utils_Reflection_Facade::invokeArgs($object, 
							JUNCTION_MAPPING_GET . $property->getName(), 
							array());
	}
	
	/**
	 * Call the setter method of the object which corresponds to the given property.
	 * 
	 * @param Object $object
	 * @param Junction_Core_Property $property
	 * @param unknown $value
	 * @return unknown
	 */
	private function setValueFor($object, Junction_Core_Property $property, $value) {
		return Junction_Utils_Reflection_Facade::invokeArgs($object, 
							JUNCTION_MAPPING_SET . $property->getName(), 
							array($value));
	}
}
?>