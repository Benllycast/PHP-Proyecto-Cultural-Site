<?php
JunctionFileCabinet::using("Junction_Query_Clause_Builder");
/**
 * Null object for the clause builders.
 * 
 * <p>This class exists to handle the null case for the clause builder.  Specifically,
 * when the user submits an empty string this class will be instantiated in lieu of
 * the Junction_Query_Clause_Builder.
 * 
 * @see Junction_Core_Session
 * 
 * @package junction.query.clause
 */
class Junction_Query_Clause_Null implements Junction_Query_Clause_Builder {
	
	/**
	 * Single instance of this class.
	 *
	 * @var Junction_Query_Clause_Null
	 */
	private static $_singleton;
	
	/**
	 * Restrict construction, limiting the number of instances to one.
	 *
	 * @param String $clause
	 */
	private function __construct() {
		
	}
	
	/**
	 * Retrieve a single instance of this class.
	 *
	 * @return Junction_Query_Clause_Null
	 */
	public static function construct() {
		if (!isset(self::$_singleton)) {
			self::$_singleton = new Junction_Query_Clause_Null();
		}
		return self::$_singleton;
	}
	
	/**
	 * Null queries have nothing to bind against.
	 *
	 * @param int $argument
	 * @param unknown_type $value
	 */
	public function bind($argument, $value) {
		// nothing to bind against.
	}
	
	/**
	 * Retrieve an empty string.
	 *
	 * @return String
	 */
	public function toSql() {
		return "";
	}
	
	/**
	 * Retrieve any empty array.
	 *
	 * @return array
	 */
	public function getValues() {
		 return array();
	}
}
?>