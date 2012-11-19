<?php
JunctionFileCabinet::using("Junction_Db_Common_Exception");
JunctionFileCabinet::using("Junction_Db_Common_Service");
JunctionFileCabinet::using("Junction_Db_Creole_Adapter");
JunctionFileCabinet::using("Junction_Db_Creole_ResultSet");

/**
 * Implementation of db-common-service for Creole database abstraction package.
 * 
 * @package junction.db.creole
 */
class Junction_Db_Creole_Service implements Junction_Db_Common_Service {
	
	/**
	 * Creole database handle.
	 *
	 * @var Connection
	 */
	private $_dbh;
	
	private $_affectedRows;
	
	/**
	 * Construct a new database abstraction service.
	 *
	 * @param Junction_Db_Common_Adapter $dao
	 */
	public function __construct(Junction_Db_Common_Adapter $dao) {
		$this->_dbh = $dao->getDao();
		$this->_affectedRows = 0;
	}
	
	/**
	 * Perform a query which effects the database
	 *
	 * @throws Junction_Db_Common_Exception
	 * @param String $query
	 * @param array $params = null
	 * @return boolean
	 */
	public function save($query, array $params = null) {
		try {
			$stmt = $this->_dbh->prepareStatement($query);
			$this->_affectedRows = $stmt->executeUpdate($params);
			return ($this->_affectedRows > 0);
		} catch (SQLException $e) {
			throw new Junction_Db_Common_Exception($e->getMessage());
		}
	}
	
	/**
	 * Perform a query which returns a result set
	 *
	 * @throws Junction_Db_Common_Exception
	 * @param String $query
	 * @param array $params = null
	 * @return Junction_Db_Common_ResultSet
	 */
	public function select($query, array $params = null) {
		try {
			$stmt = $this->_dbh->prepareStatement($query);
			return new Junction_Db_Creole_ResultSet($stmt->executeQuery($params), $query);
		} catch (SQLException $e) {
			throw new Junction_Db_Common_Exception($e->getMessage());
		}
	}
	
	/**
	 * Returns the number of rows affected by the previous query
	 *
	 * @return int
	 */
	public function affectedRows() {
		return $this->_affectedRows;
	}
	
	/**
	 * Returns the key for the previously inserted row
	 *
	 * @return int
	 */
	public function lastInsertId() {
		return $this->_dbh->getIdGenerator()->getId();
	}
}
?>