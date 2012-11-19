<?php
JunctionFileCabinet::using("Junction_Utils_Arrays");

/**
 * A bucket can contain one or more elements.
 * 
 * <p>This data class stores data in named buckets.  It is
 * conceptually an extension of a hash.  Instead of storing a 
 * single  key-value pair it stores a single key to more than 
 * one value.
 * 
 * @package junction.utils
 */
class Junction_Utils_Buckets implements IteratorAggregate {
	
	/**
	 * The underlying data object, an associative array.
	 *
	 * @var array
	 */
	private $_data;
	
	/**
	 * Construct a new bucket.
	 *
	 */
	public function __construct() {
		$this->_data = array();
	}
	
	/**
	 * Put a new data item into the specified bucket.
	 *
	 * @param String $bucket
	 * @param unknown_type $data
	 * @return boolean
	 */
	public function put($bucket, $data) {
		if (!is_string($bucket) || strlen($bucket) == 0)
			return false;
		$this->_data[$bucket][] = $data;
		return true;
	}
	
	/**
	 * Retrieve the specified bucket.
	 * 
	 * @param String $bucket
	 * @return array
	 */
	public function get($bucket) {
		if (!is_string($bucket) || strlen($bucket) == 0)
			return null;
		return $this->_data[$bucket]; 
	}
	
	/**
	 * Return whether the given bucket exists.
	 *
	 * @param String $bucket
	 * @return boolean
	 */
	public function contains($bucket) {
		return (isset($this->_data[$key]));
	}
	
	/**
	 * Remove a specified bucket.
	 *
	 * @param String $key
	 * @return boolean
	 */
	public function remove($bucket) {
		if (!is_string($bucket) || strlen($bucket) == 0)
			return false;
		return (Junction_Utils_Arrays::pop_value($bucket, $this->_data)) ? true : false;
	}
	
	/**
	 * Retrieve the all the buckets through an iterator.
	 *
	 * @return Iterator
	 */
	public function getIterator() {
		return new ArrayIterator(array_keys($this->_data));
	}
}
?>