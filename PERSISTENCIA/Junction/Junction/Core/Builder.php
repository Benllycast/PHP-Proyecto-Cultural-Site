<?php
JunctionFileCabinet::using("Junction_Core_Exception");
JunctionFileCabinet::using("Junction_Core_Mapping");
JunctionFileCabinet::using("Junction_Utils_Xml_Parser");

/**
 * Factory for generating new instances of the Mapping class.
 * 
 * <p>This class is responsible for constructing mapping classes
 * from mapping files.  It essentially deserializes the class
 * from the passed XML. 
 *
 * @package junction.core
 */
class Junction_Core_Builder {
	
	/**
	 * Construct a new Mapping class from the given mapping file.
	 * 
	 * @throws Junction_Core_Exception
	 *
	 * @param String $mappingFile full path to the file
	 * @return Junction_Core_Mapping
	 */
	public static function buildMapping($mappingFile) {
		try {
			$result = Junction_Utils_Xml_Parser::parseFile($mappingFile);
			$classes = $result->get("class");
			$class = $classes[0];
			return new Junction_Core_Mapping($class->classname, 
										$class->tablename, 
										$class->id, 
										$class->properties);
		} catch (Junction_Utils_Xml_Exception $e) {
			throw new Junction_Core_Exception($e);
		}
	}
}
?>