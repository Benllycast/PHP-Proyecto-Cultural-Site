<?php
require("JunctionFileCabinet.php"); // include the file cabinet directly

JunctionFileCabinet::using("Junction_Utils_Config");

JunctionFileCabinet::package("Junction_Core");

/**
 * Junction object relational mapper.
 * 
 * @package junction
 */
class Junction {
	
	/**
	 * Construct a new session given a class name.
	 * 
	 * @throws Junction_Core_Exception
	 *
	 * @param String $classname
	 * @return Junction_Core_Session
	 */
	public static function construct($classname) {
		return Junction_Core_Factory::construct($classname);
	}
}
?>