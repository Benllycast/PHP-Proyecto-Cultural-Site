<?php
/**
 * Define an interface for building queries.
 *
 * <p>A query builder should assist the mapping process by
 * constructing SQL queries.  The queries should be well
 * formed with placeholders for variables.
 * 
 * @package junction.query
 */
interface Junction_Query_Builder {
	
	/**
	 * Bind a table to the query.
	 *
	 * @param String $table
	 */
	public function bindTable($table);
	
	/**
	 * Bind a value to the primary key.
	 *
	 * @param String $column
	 * @param unknown $value
	 */
	public function bindKey($column, $value);
	
	/**
	 * Bind a value to a non-key column.
	 *
	 * @param String $column
	 * @param unknown $value
	 */
	public function bindProperty($column, $value);
	
	/**
	 * Retrieve the query as a string.
	 * 
	 * <p>Not all dao libraries (ADODB for example) can take the builder
	 * as an object and call __toString on it correctly so it's best to
	 * have an explicit method call instead.
	 *
	 * @return String
	 */
	public function toSql();
	
	/**
	 * Retrieve the values which correspond to the placeholders.
	 * 
	 * <p>This will return an ordered list.  The order is determined
	 * by the order of the parameters built into the query by the
	 * builder.
	 *
	 * @return array
	 */
	public function getValues();
}
?>