<?php
/**
 * Base exception class for the Junction package.
 * 
 * <p>The core exception is the top level exception, which
 * clients can expect to intercept.  It is composed of 
 * another exception which can be accessed through the
 * additional method "getException".
 *
 * @package junction.core
 */
class Junction_Core_Exception extends Exception {
	
	/**
	 * Nested exception.
	 *
	 * @var Exception
	 */
	private $_exception;
	
	public function __construct(Exception $e) {
		parent::__construct($e->getMessage());
		$this->_exception = $e;
	}
	
	/**
	 * Retrieve the nested exception.
	 *
	 * @return Exception
	 */
	public function getException() {
		return $this->_exception;
	}
}
?>