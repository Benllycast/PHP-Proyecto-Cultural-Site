<?php


/**
 * LADO SERVIDOR
 * @author cesarecf
 * @version 1.0
 * @created 14-May-2009 11:35:13 a.m.
 */
class gustos
{

	private $genero;
	private $tipo;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function getGenero()
	{
		return $this->genero;
	}
	
	public function setGenero($gen)
	{
		$this->genero = $gen;
	}
	
	public function getTipo()
	{
		return $this->tipo;
	}

	public function setTipo($tip)
	{
		$this->tipo = $tip;
	}
}
?>