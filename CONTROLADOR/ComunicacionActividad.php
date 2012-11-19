<?
/**
 * @author Benlly
 * @version 1.0
 * @created 19-May-2009 1:12:36 p.m.
 */
class ComunicacionActividad
{

	public $m_Invitacion;
	public $m_Comentario;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function ComentarActivdad($nuevo)
	{
		require_once ('..\MODELO\Comentario.php');
		$nuevoComentario = new  Comentario();
		$nuevoComentario->setEmisor($nuevo['idemisor']);
		$nuevoComentario->setFechaHora($nuevo['fecha']);
		$nuevoComentario->setIdActividad($nuevo['idactividad']);
		$nuevoComentario->setMensaje($nuevo['mensaje']);
		return $nuevoComentario->guardar();
	}

	public function InformarActividad()
	{
		require_once ('..\MODELO\Invitacion.php');
	}

}
?>