<?php
JunctionFileCabinet::using("Junction_Utils_Buckets");
JunctionFileCabinet::using("Junction_Utils_Reflection_Facade");
JunctionFileCabinet::using("Junction_Utils_Xml_Handler");

JunctionFileCabinet::package("Junction_Core_Handlers");

define("JUNCTION_XML_HANDLE", "handle");

/**
 * Parse XML into a data structure using handlers.
 * 
 * <p>This class will traverse a single level of a XML tree
 * and call a handler for each element based on the elements
 * name.
 * <p>Be aware that this parser will ignore the root and
 * only call handlers for its children.
 * 
 * @package junction.utils.xml
 */
class Junction_Utils_Xml_Parser {
	
	/**
	 * List of available handlers.
	 *
	 * @var array
	 */
	private static $_handlers = array();
	
	/**
	 * Specify all available handlers and their corresponding tag names.
	 *
	 */
	private static function initHandlers() {
		self::$_handlers["class"] = new Junction_Core_Handlers_Class();
		self::$_handlers["id"] = new Junction_Core_Handlers_Property();
		self::$_handlers["property"] = new Junction_Core_Handlers_Property();
	}
	
	/**
	 * Step through each child of the root and call its handler.
	 * 
	 * <p>Collect the results from each handler in an array and return
	 * it after processing each child.
	 * 
	 * @throws Junction_Utils_Xml_Exception
	 *
	 * @param SimpleXMLElement $root
	 * @return Junction_Utils_Buckets
	 */
	public static function parse(SimpleXMLElement $root) {
		self::initHandlers();
		
		$result = new Junction_Utils_Buckets();
		foreach ($root->children() as $child) {
			if (isset(self::$_handlers[$child->getName()])) {
				$object = Junction_Utils_Reflection_Facade::invokeArgs(self::$_handlers[$child->getName()], JUNCTION_XML_HANDLE, array($child));
				$result->put($child->getName(), $object);
			}
		}
		return $result;
	}
	
	/**
	 * Wrapper around parse method for convenience.
	 * 
	 * <p>Parse the XML present in the specified file. Returning
	 * the results in a bucket.
	 * 
	 * @throws Junction_Utils_Xml_Exception
	 * 
	 * @param String $filepath full path to a XML file.
	 * @return Junction_Utils_Buckets
	 */
	public static function parseFile($filepath) {
		try {
			$xml = file_get_contents($filepath);
			return self::parse(new SimpleXMLElement($xml));
		} catch (Exception $e) {
			throw new Junction_Utils_Xml_Exception($e->getMessage());
		}
	}
	
	/**
	 * Collect the attribute values for a given node.
	 * 
	 * @param SimpleXMLElement $node
	 * @return array
	 */
	public static function collectAttributes(SimpleXMLElement $node) {
		$attrs = array();
		foreach ($node->attributes() as $key => $value) {
			$attrs[] = $value . "";
		}
		return $attrs;
	}
}
?>