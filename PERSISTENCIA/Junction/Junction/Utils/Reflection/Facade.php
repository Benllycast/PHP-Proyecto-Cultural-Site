<?php
JunctionFileCabinet::using("Junction_Utils_Reflection_Exception");
/**
 * Provide a simplified interface for dealing with reflection.
 * 
 * <p>This facade provides a reduced set of functions for performing
 * reflective tasks.  Common reflection operations have been 
 * encapsulated in method names which mirror the Reflection API.
 * <p>Use this class to help construct classes and call methods
 * when you only know the names and arguments.
 * 
 * @package junction.utils.reflection
 */
class Junction_Utils_Reflection_Facade {
	
	/**
	 * Return a new instance of a class.
	 * 
	 * <p>Take a class name and create a new instance of it. Note
	 * that this will fail if the class definition is not already
	 * present.
	 * 
	 * @throws Junction_Utils_Reflection_Exception
	 *
	 * @param String $classname
	 * @param array $args
	 * @return Object a new instance of the class or null
	 */
	public static function getInstance($classname, array $args) {
		if (!class_exists($classname))
			throw new Junction_Utils_Reflection_Exception("The class was not defined: " . $classname);
		$handle = new ReflectionClass($classname);
		if ($handle->getConstructor() == null)
			throw new Junction_Utils_Reflection_Exception("Class has no valid constructor");
		if ($handle->getConstructor()->getNumberOfRequiredParameters() > count($args))
			throw new Junction_Utils_Reflection_Exception("Wrong number of parameters for constructor");
		return $handle->newInstanceArgs($args);
	}
	
	/**
	 * Invoke the specified method.
	 * 
	 * <p>Invoke the method if it is:
	 *  1. Present in the class
	 *  2. Public
	 *  3. Requires equal or less count($args) parameters
	 * <p>If the method is successfully called then return its
	 * result, else throw an exception
	 * 
	 * @throw Junction_Utils_Reflection_Exception
	 *
	 * @param Object $object
	 * @param String $method
	 * @param array $args
	 * @return mixed return whatever the method returns
	 */
	public static function invokeArgs($object, $method, array $args) {
		$handle = new ReflectionObject($object);
		$methodHandle = $handle->getMethod($method);
		if ($methodHandle->getNumberOfRequiredParameters() > count($args))
			throw new Junction_Utils_Reflection_Exception("Too few arguments passed");
		return $methodHandle->invokeArgs($object, $args);
	}
	
	/**
	 * Retrieve the specified field on the given object.
	 * 
	 * @throws Junction_Utils_Reflection_Exception
	 * 
	 * @param Object $object
	 * @param String $property the field's name
	 * @return mixed return the field's value
	 */
	public function getProperty($object, $property) {
		try {
			$class = new ReflectionClass($object);
			$handle = $class->getProperty($property);
			return $handle->getValue($object);
		} catch (ReflectionException $e) {
			throw new Junction_Utils_Reflection_Exception($e->getMessage());
		}
	}
	
	/**
	 * Set the specified field on the given object with the given value.
	 * 
	 * @throws Junction_Utils_Reflection_Exception if the field does not exist
	 * 
	 * @param Object $object
	 * @param String $property
	 * @param unknown $value
	 * @return void
	 */
	public function setProperty($object, $property, $value) {
		try {
			$class = new ReflectionClass($object);
			$handle = $class->getProperty($property);
			$handle->setValue($object, $value);
		} catch (ReflectionException $e) {
			throw new Junction_Utils_Reflection_Exception($e->getMessage());
		}
	}
}
?>