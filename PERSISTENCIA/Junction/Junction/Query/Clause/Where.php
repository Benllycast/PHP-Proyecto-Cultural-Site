<?php
JunctionFileCabinet::using("Junction_Query_Clause_Builder");
/**
 * Helper object for constructing SQL Where clauses.
 * 
 * <p>This class will assist the user in constructing SQL Where clauses.
 * The user will bind any parameters to a given clause and then pass it
 * to the core-session to be executed.  The query will contain application
 * names which need to be replaced by the session before executing the
 * final query.
 * 
 * @see Junction_Core_Session
 * 
 * @package junction.query.clause
 */
class Junction_Query_Clause_Where implements Junction_Query_Clause_Builder {
	
	/**
	 * The SQL WHERE clause.  It will have parameters bound to it.
	 *
	 * @var String
	 */
	private $_clause;
	
	/**
	 * An ordered list of variables which will be used to compile the clause.
	 *
	 * @var array
	 */
	private $_values;
	
	/**
	 * Construct a new clause with the given SQL fragment.
	 *
	 * @param String $clause
	 */
	public function __construct($clause) {
		$this->_clause = $clause;
		$this->_values = array();
	}
	
	/**
	 * Bind a new value to the specified placeholder in the clause.
	 *
	 * @param int $argument
	 * @param unknown_type $value
	 */
	public function bind($argument, $value) {
		$this->_values[$argument] = $value;
	}
	
	/**
	 * Retrieve the clause string.
	 * 
	 * <p>The clause string will not have its placeholder values replaced, nor will it
	 * have the application names replaced with colum names.  These tasks must be 
	 * handled by another class.
	 *
	 * @return String
	 */
	public function toSql() {
		return " WHERE " . $this->_clause;
	}
	
	/**
	 * Retrieve the bound values for use in constructing this clause.
	 *
	 * @return array
	 */
	public function getValues() {
		 return $this->_values;
	}
}
?>