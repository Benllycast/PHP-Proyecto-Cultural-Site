<?php
JunctionFileCabinet::using("Junction_Db_Common_ResultSet");
JunctionFileCabinet::using("Junction_Libs_Catalog");

JunctionFileCabinet::get(Junction_Libs_Catalog::fetch("creole/Creole.php"));

/**
 * Result set for the Creole database abstraction layer.
 * 
 * @package junction.db.creole
 */
class Junction_Db_Creole_ResultSet implements Junction_Db_Common_ResultSet {
	
	/**
	 * Creole result set
	 *
	 * @var ResultSet
	 */
	private $_resultSet;
	
	/**
	 * Query string which produced this result set.
	 *
	 * @var String
	 */
	private $_query;
	
	public function __construct(ResultSet $results, $query) {
		$this->_resultSet = $results;
		$this->_query = $query;
	}
	
	/**
	 * Retrieve an iterator over the rows retrieved from the database.
	 *
	 * @return Iterator
	 */
	public function getIterator() {
		return $this->_resultSet->getIterator();
	}
	
	/**
	 * Fetch the query which yielded this result set.
	 *
	 * @return String
	 */
	public function getQuery() {
		return $this->_query;
	}
}
?>