<?php
require_once ('Lista_Amigos.php');
require_once ('lista_silenciados.php');
require_once ('lista_actividades.php');

/**
 * @author cesarecf
 * @version 1.0
 * @created 14-May-2009 11:35:11 a.m.
 */
class Perfil
{

	/**
	 * este es el mismo seguimiento de eventos, seguimiento de actividades o
	 * actividades seguidas, es la lista de actividades a las cuales se está pendiente
	 */
	private $actividades_pendientes;
	private $estado_usuario;
	/**
	 * campo de texto en el cual se escribe cada gusto separado por comas
	 * donde "N" es el numero de gustos que posee el servidor y cada posición
	 * representa un gusto
	 * 
	 * p.e.
	 * servidor: gusto[1] = arte, gusto[2] = música, gusto[3] = escultura
	 * 
	 * cliente: gustos_generales={0,1,0}
	 * 
	 * lo cual indica que al cliente únicamente le gusta la música
	 */
	private $gustos_generales;
	public $m_Lista_Amigos;
	public $m_lista_silenciados;
	public $m_lista_actividades;

	function __construct()
	{
	}

	function __destruct()
	{
	}



}
?>