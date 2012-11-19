<?php
/**
 * Helper class for retrieving conf files.
 *
 * @package junction.utils
 */
class Conf_Catalog {
	
	/**
	 * Retrieve the full path to the given conf file.
	 *
	 * @param String $conf
	 * @return String
	 */
	public static function fetch($conf) {
		return dirname(__FILE__) . DIRECTORY_SEPARATOR . $conf;
	}
}
?>