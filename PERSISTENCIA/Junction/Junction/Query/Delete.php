<?php
JunctionFileCabinet::using("Junction_Query_Builder");
/**
 * Helper class to create sql update statements.
 * 
 * <code>DELETE FROM {tablename} WHERE {clause}</code>
 * 
 * @package junction.query
 */
class Junction_Query_Delete implements Junction_Query_Builder {
	
	/**
	 * @var String the table name.
	 */
	private $_table;
	
	/**
	 * Bind a table to the query.
	 * 
	 * @param String $table
	 */
	public function bindTable($table) {
		$this->_table = $table;
	}
	
	/**
	 * Bind a value to the primary key.
	 *
	 * <p>For deletes the properties are not used.  The method
	 * exists to adhere to the interface.
	 * 
	 * @param String $property
	 * @param unknown $value
	 */
	public function bindKey($column, $value) {
		
	}
	
	/**
	 * Bind a value to a non-key column.
	 * 
	 * <p>For deletes the properties are not used.  The method
	 * exists to adhere to the interface.
	 * 
	 * @param String $column
	 * @param unknown $value
	 */
	public function bindProperty($column, $value) {
		
	}
	
	/**
	 * Retrieve the query as a string.
	 *
	 * @return String
	 */
	public function toSql() {
		return "DELETE FROM " . $this->_table;
	}
	
	/**
	 * Retrieve any values assigned to this query.
	 *
	 * @return array
	 */
	public function getValues() {
		return array();
	}
}
?>