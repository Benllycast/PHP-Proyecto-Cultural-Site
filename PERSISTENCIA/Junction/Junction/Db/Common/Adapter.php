<?php
/**
 * Provide an layer for creating a particular DAO.
 * 
 * <p>Because different DAO's require different data
 * connection parameters they will be created through
 * adapters instead of allowing the service's create
 * the DAO's themselves.
 * <p>The adapter should construct the DAO required
 * by service and return it.  Note that there will
 * be a tight coupling between adapters and services.
 * Normally, there will be one adapter for each
 * service.
 *
 * @package junction.db.common
 */
interface Junction_Db_Common_Adapter {
	
	/**
	 * Construct a new adapter
	 *
	 * @param String $type The database type, e.g. "mysql"
	 * @param String $host The database host, usually localhost
	 * @param String $database The database name
	 * @param String $user The database's user
	 * @param String $pass The database's user's password
	 */
	public function __construct($type,
								$host,
								$database,
								$user,
								$pass);
	
	/**
	 * Retrieve a database abstraction object.
	 *
	 * @return Object
	 */
	public function getDao();
}
?>