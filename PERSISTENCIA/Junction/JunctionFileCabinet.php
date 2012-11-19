<?php
define("JUNCTION_CABINET_UNDERSCORE", "_");
define("JUNCTION_CABINET_EXTENSION", ".php");

/**
 * Set of utilities to manage the inclusion of files.
 * 
 * <p>This class includes a series of methods to help include
 * files and packages.  The goal is to ensure that a file is
 * included only once without requiring the overhead of a
 * require_once call.
 * <p>A second goal is to make Junction path-indepedent so
 * it can be "dropped" into a project and work "out-of-the-
 * box".
 * <p>This class assumes that classnames follow the 
 * PEAR naming convention:
 * <code>class Junction_Utils_HashMap => ./Junction/Utils/HashMap.php</code>
 * and that this file is at the top level directory for the
 * project.
 *
 * @package junction.utils
 */
class JunctionFileCabinet {
	
	/**
	 * Hash composed of all included classes.
	 *
	 * @var array
	 */
	private static $_usedClasses;
	
	/**
	 * Hash composed of all included file paths.
	 *
	 * @var array
	 */
	private static $_usedFiles;
	
	/**
	 * Includes a specified class once and only once.
	 * 
	 * <p>Be aware that the class must follow the PEAR naming convention.
	 * The extension should be omitted and is assumed to be the 
	 * JUNCTION_CABINET_EXTENSION.
	 *
	 * @param String $filename
	 */
	public static function using($classname) {
		$path = dirname(__FILE__) . 
 				DIRECTORY_SEPARATOR . 
 				self::classtofile($classname) . 
 				JUNCTION_CABINET_EXTENSION;		
		
		if(!self::$_usedClasses[$classname] && !self::$_usedFiles[$path]) {
			self::$_usedClasses[$classname] = true;
			self::$_usedFiles[$path] = true;
			require($path);
		 }
	}
	
	/**
	 * Include all the files in a given directory as a package.
	 * 
	 * <p>Be aware that the package should be specified following PEAR
	 * notation.
	 *
	 * @param String $directory
	 */
	public static function package($path) {
		$fullpath = dirname(__FILE__) . DIRECTORY_SEPARATOR . self::classtofile($path);
		$directory = new DirectoryIterator($fullpath);
		foreach ($directory as $file) {
			if (!is_dir($fullpath . DIRECTORY_SEPARATOR . $file)) {
				self::using($path . JUNCTION_CABINET_UNDERSCORE . basename($file, JUNCTION_CABINET_EXTENSION));
			}
		}
	}
	
	/**
	 * Include a given file once and only once.
	 * 
	 * <p>This will include a file which does not follow the
	 * PEAR naming convention.  As a result the complete
	 * path must be specified.
	 *
	 * @param String $path
	 */
	public static function get($path) {
		if (!self::$_usedFiles[$path]) {
			self::$_usedFiles[$path] = true;
			require($path);
		}
	}
	
	/**
	 * Convert a class name to its file name without the extension.
	 *
	 * @param String $classname
	 * @return String
	 */
	public static function classtofile($classname) {
		return str_replace(JUNCTION_CABINET_UNDERSCORE, DIRECTORY_SEPARATOR, $classname);
	}
	
	/**
	 * Convert a file name with extension to a class name.
	 *
	 * @param String $file
	 * @return String
	 */
	public static function filetoclass($file) {
		return str_replace(DIRECTORY_SEPARATOR, JUNCTION_CABINET_UNDERSCORE, basename($file, JUNCTION_CABINET_EXTENSION));
	}
}
?>