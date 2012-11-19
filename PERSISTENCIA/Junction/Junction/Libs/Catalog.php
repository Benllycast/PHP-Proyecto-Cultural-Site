<?php
/**
 * Helper class for retrieving libs.
 *
 * @package junction.utils
 */
class Junction_Libs_Catalog {
	
	/**
	 * Retrieve the full path to the given lib.
	 *
	 * @param String $lib
	 * @return String
	 */
	public static function fetch($lib) {
		set_include_path(dirname(__FILE__));
		return dirname(__FILE__) . DIRECTORY_SEPARATOR . $lib;
	}
}
?>