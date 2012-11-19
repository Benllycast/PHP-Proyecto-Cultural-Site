<?php
JunctionFileCabinet::using("Conf_Catalog");

define("JUNCTION_CONFIG", "junction.ini");

/**
 * Configuration helper for Junction.
 * 
 * <p>This will read the junction config file as defined by
 * JUNCTION_CONFIG and located by Conf_Catalog::fetch().
 * The configuration file is a standard php .ini file 
 * without sections.
 * 
 * @see Conf_Catalog::fetch()
 *
 * @package junction.utils
 */
class Junction_Utils_Config {
	
	/**
	 * Array of config data.
	 *
	 * @var array
	 */
	private $_data;
	
	/**
	 * Single instance of the config file.
	 *
	 * @var Junction_Utils_Config
	 */
	private static $_singleton;
	
	/**
	 * Construct a new config utility.
	 *
	 */
	private function __construct() {
		$this->_data = parse_ini_file(Conf_Catalog::fetch(JUNCTION_CONFIG));
	}
	
	/**
	 * Read an article from the config file.
	 *
	 * @param String $config
	 * @return String
	 */
	public function read($config) {
		return $this->_data[$config];
	}
	
	/**
	 * Retrieve a single instance of the config utility.
	 * 
	 * <p>This implements the singleton pattern to ensure that
	 * the config file is only opened and parsed once.
	 *
	 * @return Junction_Utils_Config
	 */
	public static function construct() {
		if (!isset(self::$_singleton)) {
			self::$_singleton = new Junction_Utils_Config();
		}
		return self::$_singleton;
	}
}
?>