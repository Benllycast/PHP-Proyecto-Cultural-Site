<?php
JunctionFileCabinet::using("Junction_Core_Property");
JunctionFileCabinet::using("Junction_Utils_Reflection_Facade");
JunctionFileCabinet::using("Junction_Utils_Xml_Exception");
JunctionFileCabinet::using("Junction_Utils_Xml_Handler");
JunctionFileCabinet::using("Junction_Utils_Xml_Parser");

/**
 * Handler for converting id and property tags into core-properties.
 *
 * @package junction.core.handlers
 */
class Junction_Core_Handlers_Property implements Junction_Utils_Xml_Handler {
	
	/**
	 * Construct a core-property based on this node's attributes.
	 * 
	 * @throws Junction_Utils_Xml_Exception
	 *
	 * @param SimpleXMLElement $root
	 * @return Junction_Core_Property
	 */
	public function handle(SimpleXMLElement $root) {
		try {
			return Junction_Utils_Reflection_Facade::getInstance("Junction_Core_Property", 
				Junction_Utils_Xml_Parser::collectAttributes($root));
		} catch (Junction_Utils_Reflection_Exception $e) {
			throw new Junction_Utils_Xml_Exception($e->getMessage());
		}
	}
}
?>