<?php 
/**
 * @author Am�rico Allende M.
 * @Version 0.3
 * @copyright Nicsmedia
 * PHP DB Mysqli - Clase para realizar la conexi�n a Mysql y realizar las consultas respectivas.
 */

class DB extends mysqli {

	const MYSQL_SERVIDOR    = "localhost"; // Servidor ( localhost � IP )
    const MYSQL_USUARIO     = "taxisate_mysqli";  //Usuario de la Base de datos
    const MYSQL_CLAVE       = "xyz123@";  //Contrase�a de la Base de datos
    const MYSQL_BASEDATOS   = "taxisate_mysqli"; //Nombre de la Base de datos

    private static $instancia; 
      
    private function __construct(){}
 	private function __wake(){}
    private function __clone(){throw new Exception("Imposible clonear en la clase: ".__CLASS__);}


	/**
	* M�todo para establecer y realizar la conexi�n a la base de datos Mysql.
	* @access public static
	* @return resource
	*/
    public static function mysql(){  

        if(!isset(self::$instancia)){

			try {
				self::$instancia = new mysqli(self::MYSQL_SERVIDOR, self::MYSQL_USUARIO, self::MYSQL_CLAVE, self::MYSQL_BASEDATOS);  

				if(self::$instancia->connect_error) throw new Exception('No se pudo conectar a la base de datos');  

			} catch(Exception $e) {
				self::mostrarError($e, !1); 
			}
        }
        return self::$instancia;  
    }

	/**
	* M�todo para establecer e invocar el recurso de una determinada consulta a Mysql.
	* @param string $query - Cadena de la consulta
	* @access public static
	* @return resource
	*/
	public static function _query($query) {

		try {
		if(!self::conexion()) self::$instancia = self::mysql();
		$sql = self::$instancia->query($query);
		if(!$sql) throw new Exception('Error en la consulta:'.self::$instancia->error);  
		return $sql;
		} catch(Exception $e) {
				self::mostrarError($e); 
		}
		return null;
	}

	/**
	* M�todo para mostrar los errores que arroja Mysql.
	* @param object  $o - Objecto donde est� almacenada el mensaje del error.
	* @param boolean $i - booleano para mostrar el error completo (file and line).
	* @access private static
	* @return void
	*/
	private static function mostrarError($o, $i = true) {$msj = "MYSQL DICE: ".$o->getMessage();   if($i)echo($msj);else die($msj); }

	/**
	* M�todo para consultar el estado de la conexi�n a Mysql
	* @access public static
	* @return boolean
	*/
	public static function conexion() {
		return isset(self::$instancia);
	}

	private function __destruct(){
	  if(self::conexion() ) self::$instancia->close();
	}

}