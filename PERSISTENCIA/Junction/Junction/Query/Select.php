<?php
JunctionFileCabinet::using("Junction_Query_Builder");
/**
 * Helper class to create sql select statements.
 * 
 * <code>SELECT {rows} FROM {tablename} WHERE {clause}</code>
 * 
 * @package junction.query
 */
class Junction_Query_Select implements Junction_Query_Builder {
	
	/**
	 * @var String the table name.
	 */
	private $_table;

	/**
	 * @var array the columns to be selected by the query.
	 */
	private $_columns;
	
	/**
	 * Construct a new select query builder.
	 *
	 */
	public function __construct() {
		$this->_columns = array();
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
	 * <p>For select statements the key is just another property.
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
		$query = "SELECT ";
		$query .= current($this->_columns);
		while (next($this->_columns)) {
			$query .= ", " . current($this->_columns);
		}
		$query .= " FROM " . $this->_table;
		return $query;
	}
	
	/**
	 * Fetch any values assigned to this query.
	 *
	 * @return array
	 */
	public function getValues() {
		return array();
	}
}
?>