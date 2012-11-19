<?php
JunctionFileCabinet::using("Junction_Db_Common_Exception");
JunctionFileCabinet::using("Junction_Utils_Config");
JunctionFileCabinet::using("Junction_Utils_Reflection_Facade");

/**
 * Factory to govern construction of Junction_Db_Common_Service's.
 * 
 * <p>Use this factory to get instances of the database service.  The
 * factory generates instances of the service specified in the 
 * Conf/junction.ini file.
 * <p>The service should be located in the Junction file system and follow
 * the Junction naming convention.  Failure to do so will lead to a 
 * reflection exception due to the class definition being absent.
 *
 * @package junction.db.common
 */
class Junction_Db_Common_Factory {
	
	/**
	 * Create a new database service
	 * 
	 * @throws Junction_Db_Common_Exception
	 *
	 * @return Junction_Db_Common_Service
	 */
	public static function construct() {
		try {
		$config = Junction_Utils_Config::construct();
		
		self::loadClass($config->read("service"));
		self::loadClass($config->read("adapter"));
		
		$adapter = Junction_Utils_Reflection_Facade::getInstance($config->read("adapter"), 
			array($config->read("db_driver"),
					$config->read("db_host"),
					$config->read("db_name"),
					$config->read("db_user"),
					$config->read("db_pass")));
					
		
		return Junction_Utils_Reflection_Facade::getInstance($config->read("service"), 
			array($adapter));
		} catch (Junction_Utils_Reflection_Exception $e) {
			throw new Junction_Db_Common_Exception($e->getMessage());
		}
	}
	
	/**
	 * Load the Junction_Db_Common_Service class.
	 *
	 * @param String $service
	 */
	private static function loadClass($service) {
		JunctionFileCabinet::using($service);
	}
}
?>