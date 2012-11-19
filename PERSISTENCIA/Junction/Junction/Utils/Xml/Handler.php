<?php
/**
 * Process a XML element to yield an object.
 * 
 * <p>The XML parser will call XML handlers and place
 * the results into a bucket based on the element's 
 * name.
 *
 * @see Junction_Utils_Xml_Parser
 * @see Junction_Utils_Buckets
 * 
 * @package junction.utils.xml
 */
interface Junction_Utils_Xml_Handler {
	
	/**
	 * Handle the given XML element in some way.
	 *
	 * @param SimpleXMLElement $root
	 * @return Object
	 */
	public function handle(SimpleXMLElement $root);
}
?>