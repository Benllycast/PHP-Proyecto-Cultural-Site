<?php
/**
 * Helper class for retrieving schemas.
 *
 * @package junction.utils
 */
class Schema_Catalog {
	
	/**
	 * Retrieve the full path to the given schema.
	 *
	 * @param String $schema
	 * @return String
	 */
	public static function fetch($schema) {
		return dirname(__FILE__) . DIRECTORY_SEPARATOR . $schema;
	}
}
?>