<?php
JunctionFileCabinet::using("Junction_Utils_Arrays");

/**
 * A basic hashmap whose keys will always be strings.
 *
 * @package junction.utils
 */
class Junction_Utils_HashMap implements IteratorAggregate {
	
	/**
	 * Array whose keys must be strings.
	 *
	 * @var array
	 */
	private $_data;
	
	public function __construct() {
		$this->_data = array();
	}
	
	/**
	 * Put a new key value pair in the hash.
	 *
	 * @param String $key
	 * @param unknown_type $value
	 * @return boolean
	 */
	public function put($key, $value) {
		if (!is_string($key) || strlen($key) == 0)
			return false;
		$this->_data[$key] = $value;
		return true;
	}
	
	/**
	 * Get the value associated with the given key.
	 *
	 * @param String $key
	 * @return unknown null on failure or if the key does not exist
	 */
	public function get($key) {
		if (!is_string($key) || strlen($key) == 0)
			return null;
		return $this->_data[$key];
	}
	
	/**
	 * Return whether the given key exists in the hash.
	 *
	 * @param String $key
	 * @return boolean
	 */
	public function contains($key) {
		return (isset($this->_data[$key]));
	}
	
	/**
	 * Remove a given key-value pair.
	 *
	 * @param String $key
	 * @return boolean
	 */
	public function remove($key) {
		if (!is_string($key) || strlen($key) == 0)
			return false;
		return (Junction_Utils_Arrays::pop_value($key, $this->_data)) ? true : false;
	}
	
	/**
	 * Retrieve the keys in this hashmap.
	 *
	 * @return Iterator
	 */
	public function getIterator() {
		return new ArrayIterator(array_keys($this->_data));
	}
}
?>