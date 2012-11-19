<?php
JunctionFileCabinet::using("Junction_Query_Builder");
/**
 * Helper class to create sql insert statements.
 * 
 * <code>INSERT INTO {tablename} ({columns}) VALUES ({values})</code>
 * <p>The values will have ?'s as placeholders.
 * 
 * @package junction.query
 */
class Junction_Query_Insert implements Junction_Query_Builder {
	
	/**
	 * @var String the table name for the query.
	 */
	private $_table;
	
	/**
	 * @var array the columns to be inserted into by the query.
	 */	
	private $_columns;
	
	/**
	 * @var array of values to be inserted.
	 */
	private $_values;
	
	/**
	 * Construct a new insert query builder.
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
	 * <p>For insert statements the key is just another property.
	 *
	 * @param String $column
	 * @param unknown $value
	 */
	public function bindKey($column, $value) {
		$this->bindProperty($column, $value);
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
	 * @return String
	 */
	public function toSql() {
		$start = "INSERT INTO " . $this->_table . " (";
		$middle = ") VALUES (";
		$end = ")";
		$start .= current($this->_columns);
		$middle .= "?";
		while (next($this->_columns)) {
			$start .= ", " . current($this->_columns);
			$middle .= ", ?";
		}
		return $start . $middle . $end;
	}
	
	/**
	 * Retrieve an ordered list of values to be inserted.
	 *
	 * <p>The list will correspond to the order of the values
	 * as listed in the query.
	 * 
	 * @return array
	 */
	public function getValues() {
		return $this->_values;
	}
}
?>