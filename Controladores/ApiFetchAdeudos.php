<?php 
/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */

use Modelos\RecibosModelo;
require_once "../Modelos/RecibosModelo.php";

/**
 * Representa la API para las consultas asincronas
 */
class ApiFetchRecibos{

    public $costoMetro;
    public $respuesta = "no";
    public $busqueda;

    

    // **** BUSQUEDA ADEUDOS ****

    public function listaAdeudos(){
        $adeudoslista = new RecibosModelo();        
        $respuesta = $adeudoslista->consultar();
		echo json_encode($respuesta);
    }

    public function consultarRecibo(){

        $buscarrecibo = $this->busqueda;
        $listarecibo = new RecibosModelo();        
        $respuesta = $listarecibo->consultarRecibo($buscarrecibo);
		echo json_encode($respuesta);
		exit;

    }

}

// **** BUSQUEDA ADEUDOS ****

if(isset($_GET['adeudos'])){
    $listaadeudos = new ApiFetchRecibos;
    $listaadeudos->listaAdeudos();
}

if (isset($_GET["busqueda"])) {
    $valorBuscado = trim($_GET["busqueda"]);
    if ($valorBuscado != "") {
        $buscarrecibo = new ApiFetchRecibos();
        $buscarrecibo->busqueda = $valorBuscado;
        $buscarrecibo->consultarRecibo();
    } 
}

