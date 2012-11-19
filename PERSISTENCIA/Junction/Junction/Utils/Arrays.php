<?php
/**
 * Collection of utility functions for arrays.
 *
 * @package junction.utils
 */
class Junction_Utils_Arrays {
	
	/**
	 * Pop a given key out of an associative array.
	 *
	 * @param key $key
	 * @param array $array
	 * @return unknown
	 */
	public static function pop_value($key, & $array) {
		$tmp = $array[$key];
		unset($array[$key]);
		return $tmp;
	}
	
	/**
	 * Combine two arrays into a single array.
	 *
	 * @param array $first
	 * @param array $second
	 * @return array
	 */
	public static function merge(array $first, array $second) {
		return array_merge($first, $second);
	}
}
?>