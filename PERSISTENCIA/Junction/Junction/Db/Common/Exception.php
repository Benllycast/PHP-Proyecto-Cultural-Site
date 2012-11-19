<?php
/**
 * SQL Exception
 * 
 * @package junction.db.common
 */
class Junction_Db_Common_Exception extends Exception 
{   
	protected $_query;
	
	/**
	 * Throw a new exception with the passed message and query
	 *
	 * @param String $message
	 * @param String $query
	 */
	public function __construct($message, $query = null) {
		parent::__construct($message);
		$this->_query = $query;
	}
	
	/**
	 * Retrieve the stored query
	 *
	 * @return String
	 */
	public function getQuery() {
		return $this->_query;
	}
	
	/**
	 * Override to string for this exception
	 * 
	 * TODO clean up this construction
	 *
	 * @return String
	 */
	public function __toString() {
		return "SQLException: in " . $this->getFile()
			. " on " . $this->getLine() . " : " . $this->getMessage() 
			. " while executing " . $this->getQuery();
	}
}
?>