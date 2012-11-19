<?php
/**
 * Common string utilities are located in this class.
 *
 * @package junction.utils
 */
class Junction_Utils_Strings {
	
	/**
	 * Return whether the string starts with a given substring.
	 *
	 * @param String $haystack
	 * @param String $needle
	 * @return boolean
	 */
	public static function startsWith($haystack, $needle) {
		$pos = strpos($haystack, $needle);
		return (is_int($pos) && $pos == 0);
	}
	
	/**
	 * Find the first occurrence of the given pattern in the given string.
	 *
	 * @param String $haystack
	 * @param String $pattern a regular expression
	 * @return int -1 if the expression does not occur in the string
	 */
	public static function findFirst($haystack, $pattern) {
		preg_match($pattern, $haystack, $matches, PREG_OFFSET_CAPTURE);
		if (empty($matches))
			return -1;
		return $matches[0][1];
	}
	
	/**
	 * Replace all instances of a given substring a new substring.
	 *
	 * @param String $haystack
	 * @param String $needles
	 * @param String $change
	 * @return String
	 */
	public static function replaceAll($haystack, $needles, $update) {
		return str_replace($needles, $update, $haystack);
	}
}
?>