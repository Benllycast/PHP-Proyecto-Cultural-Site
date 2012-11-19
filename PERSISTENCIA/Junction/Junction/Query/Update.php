<?php
JunctionFileCabinet::using("Junction_Query_Builder");
/**
 * Helper class to create sql update statements.
 * 
 * <code>UPDATE {tablename} SET {rows = value} WHERE {clause}</code>
 * 
 * @package junction.query
 */
class Junction_Query_Update implements Junction_Query_Builder {
	
	/**
	 * @var String the table name.
	 */	
	private $_table;
	
	/**
	 * @var array the columns to be updated by the query.
	 */	
	private $_columns;
	
	/**
	 * @var array the values to update to.
	 */
	private $_values;
	
	/**
	 * Construct a new update query builder.
	 *
	 */
	public function __construct() {
		$this->_columns = array();
		$this->_values = array();
	}
	
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
	 * <p>The primary key can not be updated through
	 * Junction.
	 * 
	 * @param String $column
	 * @param unknown $value
	 */
	public function bindKey($column, $value) {
		
	}
	
	/**
	 * Bind a value to a non-key column.
	 *
	 * @param String $column
	 * @param unknown $value
	 */
	public function bindProperty($column, $value) {
		$this->_columns[] = $column;
		$this->_values[] = $value;
	}
	
	/**
	 * Retrieve the query as a string.
	 * 
	 * <p>Not all dao libraries (ADODB for example) can take the builder
	 * as an object and call __toString on it correctly so it's best to
	 * have an explicit method call instead.
	 *
	 * @return String
	 */
	public function toSql() {
		$query = "UPDATE " . $this->_table . " SET ";
		$query .= current($this->_columns) . " = ?";
		while (next($this->_columns)) {
			$query .= ", " . current($this->_columns) . " = ?";
		}
		return $query;
	}
	
	public function getValues() {
		return $this->_values;
	}
}
?>