<?php
JunctionFileCabinet::using("Junction_Core_Exception");
JunctionFileCabinet::using("Junction_Core_Mapping");
JunctionFileCabinet::using("Junction_Query_Clause_Where");
JunctionFileCabinet::using("Junction_Query_Clause_Null");

/**
 * A session stands between the client and the mapping file.
 * 
 * <p>The session is a facade for the mapping class.  In addition
 * to presenting an interface for the mapping class it also translates
 * the client's String expressions into SQL where clauses. 
 * <p>The expressions expected by this class are String containing a
 * special syntax defined by Junction (in the expression package) made
 * up of operators and application names (as defined in the mappings 
 * file).  They should not contain explicit references to column names. 
 *
 * @package junction.core
 */
class Junction_Core_Session {
	
	/**
	 * Mapping file to handle client calls.
	 *
	 * @var Junction_Core_Mapping
	 */
	private $_mapping;
	
	/**
	 * Create a new session based on the given mapping class.
	 *
	 * @param Junction_Core_Mapping $mapping
	 */
	public function __construct(Junction_Core_Mapping $mapping) {
		$this->_mapping = $mapping;
	}
	
	/**
	 * Create a new query clause and return it.
	 * 
	 * <p>The returned helper object can then have parameters bound to it
	 * through the bind() method.
	 *
	 * @param String $clause
	 * @return Junction_Query_Clause_Builder 
	 */
	public function createQuery($clause) {
		return new Junction_Query_Clause_Where($clause);
	}
	
	/**
	 * Retrieve an iterator of client objects which match the expression.
	 * 
	 * @throws Junction_Core_Exception
	 *
	 * @param Junction_Query_Clause_Builder $expression
	 * @return Junction_Core_Iterator
	 */
	public function loadWhere(Junction_Query_Clause_Builder $expression = null) {
		if (!isset($expression)) {
			$expression = Junction_Query_Clause_Null::construct();
		}
		return $this->_mapping->loadBy($expression);
	}
	
	/**
	 * Save the given object's state to the database.
	 * 
	 * @throws Junction_Core_Exception
	 *
	 * @param Object $object
	 * @return boolean
	 */
	public function save($object) {
		return $this->_mapping->save($object);
	}
	
	/**
	 * Delete rows from the database which match the expression.
	 * 
	 * @throws Junction_Core_Exception
	 *
	 * @param Junction_Query_Clause_Builder $expression
	 * @return int number of deleted rows
	 */
	public function deleteWhere(Junction_Query_Clause_Builder $expression) {
		return $this->_mapping->deleteBy($expression);
	}
}
?>