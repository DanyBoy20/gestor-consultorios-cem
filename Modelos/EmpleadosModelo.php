<?php namespace Modelos;
/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */

use Exception;
use \PDOException;
require_once "Conexion.php";

/**
 * Representa los empleados - modelo, hereda métodos de acceso a base de datos de la clase Conexión
 */
class EmpleadosModelo extends Conexion{

    private $condicion = "eliminado";
    private $bd;

    function __construct(){
        $this->bd = new Conexion;        
    }

    public function actualizarContrasenia(array $dato) : bool {
        try {
            $this->bd->consultaSQL("UPDATE usuarios SET contrasenia = :nuevacontrasenia WHERE correo = :email");
            $this->bd->enlazarValor(':email', $dato['correo']);
            $this->bd->enlazarValor(':nuevacontrasenia', $dato['contraseniaActualizada']);
            $resultados = $this->bd->obtenerConjuntoRegistros1();
            return true;
        } catch (Exception $e) {
            /* echo $e->getMessage(); */
            return false;
        }        
    }

}