<?php
/**
 * Data structure representing a name-column pair.
 * 
 * @package junction.core
 */
class Junction_Core_Property {

	/**
	 * @var String the application name of the property -- what the application will use to refer to the column. 
	 */
	private $_name;
	
	/**
	 * @var String the database name of the property -- the column's name.
	 */
	private $_column;
	
	/**
	 * Construct a new property which associates the given name and column.
	 *
	 * @param String $name the property's name as used by the application
	 * @param String $column the property's name as used by the column
	 */
	public function __construct($name, $column = null) {
		$this->_name = $name;
		$this->_column = (isset($column)) ? $column : $name;
	}
	
	/**
	 * Retrieve the property's name as used by the application.
	 *
	 * @return String
	 */
	public function getName() {
		return $this->_name;
	}
	
	/**
	 * Retrieve the property's column as used by the database.
	 *
	 * @return String
	 */
	public function getColumn() {
		return $this->_column;
	}
}
?>