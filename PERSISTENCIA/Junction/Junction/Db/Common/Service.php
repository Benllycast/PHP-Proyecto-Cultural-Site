<?php
JunctionFileCabinet::using("Junction_Db_Common_Exception");
JunctionFileCabinet::using("Junction_Db_Common_ResultSet");
JunctionFileCabinet::using("Junction_Db_Common_Adapter");

/**
 * Database abstraction interface.
 * 
 * <p>Provide a single interface interacting with the database.
 * The goal of this interface is to hide driver specific 
 * implementation details from the rest of the application.
 * 
 * @package junction.db.common
 */
interface Junction_Db_Common_Service
{	
	/**
	 * Construct a new database abstraction service.
	 *
	 * @param Junction_Db_Common_Adapter $dao
	 */
	public function __construct(Junction_Db_Common_Adapter $dao);
	
	/**
	 * Perform a query which affects the database.
	 *
	 * @throws Junction_Db_Common_Exception
	 * @param String $query
	 * @param array $params = null
	 * @return boolean
	 */
	public function save($query, array $params = null);
	
	/**
	 * Perform a query which returns a result set.
	 *
	 * @throws Junction_Db_Common_Exception
	 * @param String $query
	 * @param array $params = null
	 * @return Junction_Db_Common_ResultSet
	 */
	public function select($query, array $params = null);
	
	/**
	 * Returns the number of rows affected by the previous query.
	 *
	 * @return int
	 */
	public function affectedRows();
	
	/**
	 * Returns the key for the previously inserted row.
	 *
	 * @return int
	 */
	public function lastInsertId();
}
?>