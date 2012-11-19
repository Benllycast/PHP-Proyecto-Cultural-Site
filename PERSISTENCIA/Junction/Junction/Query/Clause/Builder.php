<?php
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
interface Junction_Query_Clause_Builder {
	
	/**
	 * Bind a new value to the specified placeholder in the clause.
	 *
	 * @param int $argument
	 * @param unknown_type $value
	 */
	public function bind($argument, $value);
	
	/**
	 * Retrieve the clause string.
	 * 
	 * <p>The clause string will not have its placeholder values replaced, nor will it
	 * have the application names replaced with colum names.  These tasks must be 
	 * handled by another class.
	 *
	 * @return String
	 */
	public function toSql();
	
	/**
	 * Retrieve the bound values for use in constructing this clause.
	 *
	 * @return array
	 */
	public function getValues();
}
?>