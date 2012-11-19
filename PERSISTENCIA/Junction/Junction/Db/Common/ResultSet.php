<?php
/**
 * Provide a wrapper around query results from a database.
 * 
 * <p>At its most basic a result set contains an iterable collection
 * of results from a query and information about the query.
 * 
 * @package junction.db.common
 */
interface Junction_Db_Common_ResultSet extends IteratorAggregate 
{	
	
	/**
	 * Return the query which produced this result set
	 *
	 * @return String
	 */
	public function getQuery();
}
?>