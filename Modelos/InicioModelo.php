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
class InicioModelo extends Conexion{

    private $bd;
    private $res = [];

    function __construct(){
        $this->bd = new Conexion;        
    }

    // ********* PARA MOSTRAR EN: inicio
    public function consultar() : array {
        try {

            $this->bd->consultaSQL("SELECT
            (SELECT SUM(recibos.cantidad) FROM recibos WHERE estatus = 0) AS adeudos, 
            (SELECT SUM(recibos.cantidad) FROM recibos WHERE estatus = 1) AS ingresos,
            (SELECT COUNT(contadorrecargos.contador) FROM contadorrecargos WHERE contador > 0) AS cantidadconsultorios");
            $resultados1 = $this->bd->obtenerConjuntoRegistros1();            

            $this->bd->consultaSQL("SELECT contadorrecargos.contador, consultorios.idconsultorio, consultorios.cvecons, propietarios.titulo, propietarios.nombre, propietarios.apellidop, propietarios.apellidom
            FROM contadorrecargos INNER JOIN consultorios ON contadorrecargos.idconsultorio = consultorios.idconsultorio INNER JOIN propietarios ON consultorios.idconsultorio = propietarios.idconsultorio WHERE consultorios.idplanta = 1");
            $resultados2 = $this->bd->obtenerConjuntoRegistros1();

            $this->bd->consultaSQL("SELECT contadorrecargos.contador, consultorios.idconsultorio, consultorios.cvecons, propietarios.titulo, propietarios.nombre, propietarios.apellidop, propietarios.apellidom
            FROM contadorrecargos INNER JOIN consultorios ON contadorrecargos.idconsultorio = consultorios.idconsultorio INNER JOIN propietarios ON consultorios.idconsultorio = propietarios.idconsultorio WHERE consultorios.idplanta = 2");
            $resultados3 = $this->bd->obtenerConjuntoRegistros1();

            $this->bd->consultaSQL("SELECT contadorrecargos.contador, consultorios.idconsultorio, consultorios.cvecons, propietarios.titulo, propietarios.nombre, propietarios.apellidop, propietarios.apellidom
            FROM contadorrecargos INNER JOIN consultorios ON contadorrecargos.idconsultorio = consultorios.idconsultorio INNER JOIN propietarios ON consultorios.idconsultorio = propietarios.idconsultorio WHERE consultorios.idplanta = 3");
            $resultados4 = $this->bd->obtenerConjuntoRegistros1();

            $this->bd->consultaSQL("SELECT contadorrecargos.contador, consultorios.idconsultorio, consultorios.cvecons, propietarios.titulo, propietarios.nombre, propietarios.apellidop, propietarios.apellidom
            FROM contadorrecargos INNER JOIN consultorios ON contadorrecargos.idconsultorio = consultorios.idconsultorio INNER JOIN propietarios ON consultorios.idconsultorio = propietarios.idconsultorio WHERE consultorios.idplanta = 4");
            $resultados5 = $this->bd->obtenerConjuntoRegistros1();

            return array($resultados1, $resultados2, $resultados3, $resultados4, $resultados5);

        } catch (PDOException $e) {

            /* echo $e->getMessage(); */
            $resultados1 = [];
            $resultados2 = [];
            $resultados3 = [];
            $resultados4 = [];
            $resultados5 = [];
            return array($resultados1, $resultados2, $resultados3, $resultados4, $resultados5);

        }
    }


}