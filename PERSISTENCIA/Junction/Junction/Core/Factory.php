<?php
JunctionFileCabinet::using("Junction_Core_Session");
JunctionFileCabinet::using("Junction_Core_Builder");
JunctionFileCabinet::using("Junction_Utils_Config");
JunctionFileCabinet::using("Schema_Catalog");

/**
 * The core factory controls the creation of sessions.
 *
 * <p>This factory is the gateway to the junction core, as such
 * it is a suitable place to put control logic limitng the core's
 * instantiation.  The factory limits the number of sessions and
 * mappings created to one per a mapping file.
 * 
 * @package junction.core
 */
class Junction_Core_Factory {
	
	/**
	 * An array of existing mapping objects.
	 *
	 * @var array
	 */
	private static $_mappings = array();
	
	/**
	 * Retrieve a session for the given mappings file.
	 * 
	 * <p>This factory will ensure that only a single session
	 * is instantiated for any given mappings file.
	 * 
	 * @throws Junction_Core_Exception
	 *
	 * @param String $classname the name of the class as defined in the config file.
	 * @return Junction_Core_Session
	 */
	public static function construct($classname) {
		if (!isset(self::$_mappings[$classname])) {
			$config = Junction_Utils_Config::construct();
			$schema = $config->read($classname);
			$mappingFile = Schema_Catalog::fetch($schema);
			$mapping = Junction_Core_Builder::buildMapping($mappingFile);
			self::$_mappings[$classname] = new Junction_Core_Session($mapping);
		}
		return self::$_mappings[$classname];
	}
}
?>