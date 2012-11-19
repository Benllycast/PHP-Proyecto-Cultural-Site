<?php
require_once ('gustos.php');

/**
 * LADO SERVIDOR
 * @author cesarecf
 * @version 1.0
 * @created 14-May-2009 11:35:15 a.m.
 */
class lista_gustos
{

	private $m_gustos = array();

	function __construct()
	{
	}

	function __destruct()
	{
	}
	
	/**
	 * @gusto es un vector de vectores que contiene
	 * todos los que se allan definido en la vista
	 * po ejemplo "musicales y deportivos"*/
	public function setGustos($gusto)
	{
		if($gusto != null){
			$i = 0;
			foreach ($gusto as $generos => $valor){
				foreach ($valor as $tipos){
					$this->m_gustos[$i] = new gustos();
					$this->m_gustos[$i]->setTipo($tipos);
					$this->m_gustos[$i]->setGenero($generos);
					$i++;
				}
			}
		}
	}
	/**
	 * la funcion getGustos()retorna un 
	 * array de objetos tipo gustos*/
	public function getGustos()
	{
		return $this->m_gustos;
	}
	
	public function guardar($nik)
	{
		require_once('../PERSISTENCIA/DAOGustos.php');
		require_once('../PERSISTENCIA/dtoGustos.php');
		
		$i = 0;
		$dtosGustos = array();
		foreach ($this->m_gustos as $value) {
			$dtosGustos[$i] = new dtoGustos();
			$dtosGustos[$i]->setIdUsuario($nik);
			$dtosGustos[$i]->setTipo($value->getTipo());
			$dtosGustos[$i]->setGenero($value->getGenero());
			$i++;
		}
		$nuevoDAO = new DAOGustos();
		return $nuevoDAO->agregar($dtosGustos);
	}
	
	public function agregarGustos($objeto)
	{
	}

	public function eliminarGustos($objeto)
	{
	}

	public function imprimir()
	{
	}
	
	/**
	 * este metodo solo se utiliza para cargar
	 * los gustos desde la base de datos
	 * @param $nik es el idUsuario para el DTO*/
	public function obtenerGustos($nik)
	{
		require_once('../PERSISTENCIA/DAOGustos.php');
		require_once('../PERSISTENCIA/dtoGustos.php');
		
		$DTO = new dtoGustos();
		$DTO->setIdUsuario($nik);
		$nuevoDAO = new DAOGustos();
		$dtos = $nuevoDAO->select($DTO);
		$DTO = null;
		$i = 0;
		if ($dtos) {		
			foreach ($dtos as $value) {
				$this->m_gustos[$i] = new gustos();
				$this->m_gustos[$i]->setTipo($value->getTipo());
				$this->m_gustos[$i]->setGenero($value->getGenero());
				$i++;
			}
		}
	}
	/**
	 * para eliminar todos los gusto de la BD
	 * se necsita el nik del usuario como
	 * indice de busqueda
	 * */
	public function eliminarTodos($nik)
	{
		require_once('../PERSISTENCIA/DAOGustos.php');
		require_once('../PERSISTENCIA/dtoGustos.php');
		
		$nuevoDTO = new dtoGustos();
		$nuevoDTO->setIdUsuario($nik);
		
		$nuevoDAO = new DAOGustos();
		return $nuevoDAO->eliminarTodos($nuevoDTO);
	}	

}
?>