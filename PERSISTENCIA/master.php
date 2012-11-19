<?php
	class master{
	
		private $conexion;
        private $seleccion;
		
		public function setconexion(){
			
            $this->conexion=mysql_connect("localhost","root","123456") or die ("PROBLEMAS EN LA CONEXION !!!");
            $this->seleccion=mysql_select_db("webcultural",$this->conexion) or die ("PROBLEMAS EN LA SELECCION !!!");
			 
		}
		public function getconexion(){
			return $this->conexion;
		}
		
		public function closeconexion(){
			$this->conexion=null;
            $this->seleccion=null;
		}
	} 
   
?>