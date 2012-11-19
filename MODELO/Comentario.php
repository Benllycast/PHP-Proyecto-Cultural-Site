<?php
include('Mensaje.php');

/**
 * @author Benlly
 * @version 1.0
 * @created 14-May-2009 11:35:05 a.m.
 */
class Comentario
{

	private $tipo;
	private $m_Mensaje;
	private $idActividad;

	function __construct()
	{
		$this->m_Mensaje = new Mensaje();
	}

	function __destruct()
	{
		$this->m_Mensaje = null;
	}



	public function getTipo()
	{
		return $this->tipo;
	}

	/**
	 * 
	 * @param tip
	 */
	public function setTipo($tip)
	{
		$this->tipo = $tip;
	}

	public function getEmisor()
	{
		return $this->m_Mensaje->getEmisor();
	}

	public function getFechaHora()
	{
		return $this->m_Mensaje->getTiempo();
	}

	public function getIdActividad()
	{
		return $this->idActividad;
	}

	public function getMensaje()
	{
		return $this->m_Mensaje->getMensaje();
	}

	public function guardar()
	{
		require_once('../PERSISTENCIA/DAOComentarios.php');
		require_once('../PERSISTENCIA/dtoComentarios.php');
		
		$m_dtoComentarios = new dtoComentarios();
		$m_dtoComentarios->setFecha($this->getFechaHora());
		$m_dtoComentarios->setIdActividad($this->getIdActividad());
		$m_dtoComentarios->setIdEmisor($this->getEmisor());
		$m_dtoComentarios->setMensaje($this->getMensaje());
		
		$nuevoDAO = new DAOComentarios();
		return $nuevoDAO->agregar($m_dtoComentarios);
		
	}

	/**
	 * 
	 * @param emisor
	 */
	public function setEmisor($emisor)
	{
		$this->m_Mensaje->setEmisor($emisor);
	}

	/**
	 * 
	 * @param fecha
	 */
	public function setFechaHora($fecha)
	{
		$this->m_Mensaje->setTiempo($fecha);
	}

	/**
	 * 
	 * @param ide
	 */
	public function setIdActividad($ide)
	{
		$this->idActividad=$ide;
	}

	/**
	 * 
	 * @param mensaje
	 */
	public function setMensaje($mensaje)
	{
		$this->m_Mensaje->setMensaje($mensaje);
	}
	
	public function cargarComentarios(){
		require_once('../PERSISTENCIA/DAOComentarios.php');
		require_once('../PERSISTENCIA/dtoComentarios.php');
		
		$nuevoDTO = new dtoComentarios();
		$nuevoDTO->setIdActividad($this->getIdActividad());
				
		$nuevoDAO = new DAOComentarios();
		$nuevoDTO = $nuevoDAO->select($nuevoDTO);
		if (!$nuevoDTO) {
			return false;
		}else{
		$coment = array();
		$i = 0; 
			foreach ($nuevoDTO as $dtos){
				$coment[$i]['emisor'] = $dtos->getIdEmisor();
				$coment[$i]['mensaje'] = $dtos->getMensaje();
				$coment[$i]['fecha'] = $dtos->getFecha();
				$i++;
			}
			return $coment;
		}
	}

}
?>