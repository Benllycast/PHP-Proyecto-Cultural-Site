<?php
JunctionFileCabinet::using("Junction_Db_Common_Adapter");
JunctionFileCabinet::using("Junction_Db_Common_Exception");
JunctionFileCabinet::using("Junction_Libs_Catalog");

JunctionFileCabinet::get(Junction_Libs_Catalog::fetch("creole/Creole.php"));

/**
 * Adapter for creating Creole objects.
 * 
 * @package junction.db.creole
 */
class Junction_Db_Creole_Adapter implements Junction_Db_Common_Adapter {
	
	private $_conn;
	
	/**
	 * Create a new adapter for a creole connection.
	 * 
	 * @throws Junction_Db_Common_Exception
	 *
	 * @param String $type the database driver type e.g. sqlite
	 * @param String $host the databse host e.g. localhost
	 * @param String $database the database name
	 * @param String $user
	 * @param String $pass
	 */
	public function __construct($type,
								$host,
								$database,
								$user,
								$pass) {
		try {
			$dsn = array('phptype' => $type,
	             'hostspec' => $host,
	             'username' => $user,
	             'password' => $pass,
	             'database' => $database);
	
			$this->_conn = Creole::getConnection($dsn);
		} catch (SQLException $e) {
			throw new Junction_Db_Common_Exception($e->getMessage());
		}
	}
	
	/**
	 * Fetch the adapter's DAO.
	 *
	 * @return Creole_Connection
	 */
	public function getDao() {
		return $this->_conn;
	}
}
?>