<?php
/**
 * Simple data class for storing XML metadata.
 * 
 * <p>Like the core-property this class acts as a simple
 * container for data read from the mapping file.  This
 * class is used by the builder as an intermediate between
 * the mapping file and the more sophisticated core-mapping
 * object.
 * <p>As a result of its use this class is tied closely to the
 * mapping file's schema and the XML handlers defined to 
 * process it.  Any changes to the mapping format may require
 * changes to both the XML handlers and this class.
 *
 * @package junction.core
 */
class Junction_Core_Class {
	/**
	 * String representing the database table for this class.
	 *
	 * @var String
	 */
	public $tablename;
	
	/**
	 * String representing the class's name.
	 *
	 * @var String
	 */
	public $classname;
	
	/**
	 * Core-property representing the table's key.
	 *
	 * @var Junction_Core_Property
	 */
	public $id;
	
	/**
	 * Collection of properties representing the rest of the
	 * table's columns.
	 *
	 * @var array
	 */
	public $properties;
	
	public function __construct($tablename, $classname) {
		$this->tablename = $tablename;
		$this->classname = $classname;
	}
}
?>