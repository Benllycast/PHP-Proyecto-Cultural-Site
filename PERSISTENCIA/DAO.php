<?php


/**
 * @author Benlly
 * @version 1.0
 * @created 08-May-2009 10:22:35 p.m.
 */
interface DAO
{

	public function actualizar();

	public function agregar();

	public function buscar();

	public function eliminar();

	/**
	 * 
	 * @param restriccion
	 */
	//public function buscar($restriccion);

}

?>