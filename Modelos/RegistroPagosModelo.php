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
class RegistroPagosModelo extends Conexion{

    private $respuesta = true;
    private $bd;


    function __construct(){
        $this->bd = new Conexion;        
    }

    public function datosConsultorio(string $dato) : array {
        try {
            $this->bd->consultaSQL("SELECT propietarios.idconsultorio, propietarios.titulo, propietarios.nombre, propietarios.apellidop, propietarios.apellidom, consultorios.cvecons, consultorios.dimensiones, recibos.idrecibo, recibos.cverecibo FROM propietarios INNER JOIN consultorios ON propietarios.idconsultorio = consultorios.idconsultorio INNER JOIN recibos ON consultorios.idconsultorio = recibos.idconsultorio WHERE recibos.idrecibo = :recibo");
            $this->bd->enlazarValor(':recibo', $dato);
            $resultados = $this->bd->obtenerConjuntoRegistros1();
            return $resultados;
        } catch (PDOException $e) {
            /* echo $e->getMessage(); */
            $resultados = [];
            return $resultados;
        }
    }

    public function datosRecibos(string $dato) : array {
        try {
            $this->bd->consultaSQL("SELECT conceptos.descripcion, conceptos.costo, recibos.idrecibo, recibos.fechaelaboracion, recibos.fechalimitepago, recibos.cantidad FROM conceptos INNER JOIN recibos ON recibos.idconcepto = conceptos.idconcepto WHERE recibos.idrecibo = :recibo");
            $this->bd->enlazarValor(':recibo', $dato);
            $resultados = $this->bd->obtenerConjuntoRegistros1();
            return $resultados;
        } catch (PDOException $e) {
            /* echo $e->getMessage(); */
            $resultados = [];
            return $resultados;
        }
    }

    public function registroPago(array $datos){
        /* "idrecibo"   "idformapago"    "cvepago"      "fechapago"    "comentarios"  estatus */
        try{
            $this->bd->iniciarTransaccion();
            $this->bd->consultaSQL("INSERT INTO pagos (idrecibo, idformapago, cvepago, fechapago, comentarios) VALUES (:idrecibo, :idformapago, :cvepago, :fechapago, :comentarios)");

            $this->bd->enlazarValor(':idrecibo', $datos['idrecibo']);
            $this->bd->enlazarValor(':idformapago', $datos['idformapago']);
            $this->bd->enlazarValor(':cvepago', $datos['cvepago']);
            $this->bd->enlazarValor(':fechapago', $datos['fechapago']);
            $this->bd->enlazarValor(':comentarios', $datos['comentarios']);
            if($this->bd->ejecutar() === FALSE){
                $this->bd->deshacerTransaccion();
                $this->respuesta = false;
                return $this->respuesta;
            }else{
                $this->bd->consultaSQL("UPDATE recibos SET estatus = :estatus WHERE idrecibo = :idrecibo");
                $this->bd->enlazarValor(':estatus', $datos['estatus']);
                $this->bd->enlazarValor(':idrecibo', $datos['idrecibo']);
                $this->bd->ejecutar();
                $this->bd->ejecutarTransaccion();
                return $this->respuesta;
            }
        }catch(PDOException$e){            
            echo $e->getMessage();
            return false;
        }

    }

    public function actualizarContador($dato){
        try{
            $this->bd->consultaSQL("UPDATE contadorrecargos SET contador = contador - 1 WHERE idconsultorio = :idconsultorio");
                $this->bd->enlazarValor(':idconsultorio', $dato);
                $this->bd->ejecutar();
                return true;
        }catch(PDOException$e){            
            echo $e->getMessage();
            return false;
        }

    }


}