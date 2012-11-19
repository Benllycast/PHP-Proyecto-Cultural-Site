<?php
JunctionFileCabinet::using("Junction_Core_Class");
JunctionFileCabinet::using("Junction_Utils_Reflection_Facade");
JunctionFileCabinet::using("Junction_Utils_Xml_Exception");
JunctionFileCabinet::using("Junction_Utils_Xml_Handler");
JunctionFileCabinet::using("Junction_Utils_Xml_Parser");

/**
 * Create a new core-class for the given XML element.
 * 
 * @package junction.core.handlers 
 */
class Junction_Core_Handlers_Class implements Junction_Utils_Xml_Handler {
	
	/**
	 * Create a new core-class from the XML metadata.
	 * 
	 * @throws Junction_Utils_Xml_Exception
	 * 
	 * @return Junction_Core_Class
	 */
	public function handle(SimpleXMLElement $root) {
		try {
			$class = Junction_Utils_Reflection_Facade::getInstance("Junction_Core_Class", 
				Junction_Utils_Xml_Parser::collectAttributes($root));
			
			$children = Junction_Utils_Xml_Parser::parse($root);
			
			$ids = $children->get("id");
			$class->id = $ids[0];
			
			$class->properties = $children->get("property");
			
			return $class;
		} catch (Junction_Utils_Reflection_Exception $e) {
			throw new Junction_Utils_Xml_Exception($e->getMessage());
		}
	}
}
?>