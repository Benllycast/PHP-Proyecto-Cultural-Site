<?php
JunctionFileCabinet::using("Junction_Db_Common_ResultSet");
JunctionFileCabinet::using("Junction_Core_Mapping");

/**
 * Junction iterator which creates instances of the client object on request.
 * 
 * <p>This iterator is a wrapper around the Junction_Db_Common_ResultSet and
 * is used to translate a result set from the database into a new client object.
 * Each step through the iterator will return a new instance of the client
 * object as defined in the mapping file.
 * 
 * @see Junction_Db_Common_ResultSet
 * @see Junction_Core_Mapping
 * 
 * @package junction.core
 */
class Junction_Core_Iterator implements Iterator {
	
	/**
	 * Result set
	 *
	 * @var Iterator
	 */
	private $_data;
	
	/**
	 * Mapping between object and table
	 *
	 * @var Junction_Core_Mapping
	 */
	private $_mapping;
	
	/**
	 * Construct a new Junction iterator.
	 * 
	 * <p>The database result set and mapping object are passed in so that the iterator
	 * can return new instances of the client object on each step.
	 *
	 * @param Junction_Db_Common_ResultSet $results
	 * @param Junction_Core_Mapping $map
	 */
	public function __construct(Junction_Db_Common_ResultSet $results, 
								Junction_Core_Mapping $map) {
		$this->_data = $results->getIterator();
		$this->_mapping = $map;
	}
	
	/**
	 * Move the iterator's pointer to the next element.
	 */
	public function next() {
		$this->_data->next();
	}
	
	/**
	 * Retrieve a new client object from the dataset.
	 *
	 * @return Object an instance of the client's object
	 */
	public function current() {
		return $this->_mapping->makeClientFrom($this->_data->current());
	}
	
	/**
	 * Retrieve the current pointer.
	 *
	 * @return unknown
	 */
	public function key() {
		return $this->_data->key();
	}
	
	/**
	 * Reset the iterator.
	 *
	 */
	public function rewind() {
		$this->_data->rewind();
	}
	
	/**
	 * Return whether the current value is valid.
	 * 
	 * @return boolean
	 */
	public function valid() {
		return $this->_data->valid();
	}
}
?>