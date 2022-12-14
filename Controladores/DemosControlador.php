<?php namespace Controladores;
/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */

use Interfaces\IDemos;
use Modelos\DemosModelo;
use Servicios\AplicacionServicios;
use Servicios\DemosServicios;

class DemosControlador implements IDemos {

    private $errores = [];
    private $variablesIndefinidas = [];


    private $claveacceso;
    private $contraseniaActualizada; 

    // ********* PARA MOSTRAR EN: demos
    public function consultar(){    
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if(!isset($_POST['iddemo']) || $_POST['iddemo'] == ""){
                echo '<script type="text/javascript">alert("NO SE RECIBIERON DATOS");</script>';
            }else{
                $correoEmpleado = new DemosModelo();
                $datosUsuario = array(
                    "iddemo" => $_POST['iddemo'],
                    "estado" => "en proceso"            
                 );             
            }

        }else{
            $listaempleados = new DemosModelo();
            $resultados = $listaempleados->consultar();
            $contador = 0;
            DemosServicios::tablaMostrarListaDemos($resultados, $contador);
        }  
    }
    
    // ********* PARA MOSTRAR EN: solicitud-demostracion
    public function guardar(){  
        $campos = ['tipodemo', 'producto', 'hospital', 'solicitante', 'mensaje', 'idproducto', 'idhospital'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach ($campos as $campoFormulario) {
                if (!isset($_POST[$campoFormulario]) || empty($_POST[$campoFormulario])) {
                    $this->variablesIndefinidas = $campoFormulario;
                    break;
                    exit();                
                }
            }
            if(!empty($this->variablesIndefinidas)){
                echo "<script>alert('El campo " . $this->variablesIndefinidas . " es obligatorio');</script>";
            }else{
                $serviciodemos = new DemosServicios();
                $serviciodemos->validarDatosDemos($_POST);
                if(!empty($serviciodemos->errores)){
                    $camposInvalidos = implode(",", $serviciodemos->errores);
                    echo '<script type="text/javascript">alert("ERRORES EN LOS DATOS ENVIADOS: '.$camposInvalidos.'");</script>';
                }else{          
                    $datosUsuario = array(
                        "tipodemo" => $serviciodemos->tipodemo,
                        "producto" => $serviciodemos->producto,
                        "hospital" => $serviciodemos->hospital,
                        "solicitante" => $serviciodemos->solicitante,
                        "mensaje" => $serviciodemos->mensaje,
                        "idproducto" => $serviciodemos->idproducto,
                        "idhospital" => $serviciodemos->idhospital,
                        "fechasolicitud" => date('Y-m-d'),
                        "estado" => "pendiente",
                        "barra" => 34
                    );                    
                    $verificadatosdemo = new DemosModelo();
                    $resultados = $verificadatosdemo->consultarDatos($datosUsuario);                    
                    if($resultados){
                        $respuesta = $verificadatosdemo->guardar($datosUsuario);
                        if($respuesta){
                            echo "<script>alert('Se ha creado una nueva solicitud de demostracion');</script>";
                            echo '<script>window.location.href="inicio"</script>';
                        }else{
                            echo "<script>alert('No se pudo crear la solicitud de demostraci??n, intente m??s tarde');</script>";
                            echo '<script>window.location.href="inicio"</script>';
                        }
                    }else{
                        echo "<script>alert('Los datos que intenta ingresar son incorrectos');</script>";
                        echo '<script>window.location.href="inicio"</script>';
                    }                   
                }
            }            
        }
    }

    public function editar(){          
        if(isset($_POST['iddemostracion'])){
            $idcap = trim($_POST['iddemostracion']);
            if($idcap == ""){
                echo '<script type="text/javascript">alert("No se recibieron datos");</script>';
                echo '<script>window.location.href = "inicio"</script>';
            }else{
                $validarIdentificador = new AplicacionServicios();
                $validarIdentificador->validarNumero($idcap);
                if(!empty($validarIdentificador->errores)){
                    echo '<script type="text/javascript">alert("Error en el formato de los valores de los campos");</script>';
                    echo '<script>window.location.href = "inicio"</script>';
                }else{
                    $buscarcapacitacion = new DemosModelo();
                    $capacitacion = $buscarcapacitacion->buscarDemostracion($idcap);
                    if($capacitacion){
                        DemosServicios::tablaMostrarDemo($capacitacion);                        
                    }else{
                        echo '<script type="text/javascript">alert("SU CONSULTA NO ARROJO NINGUN DATO");</script>';
                        echo '<script>window.location.href = "inicio"</script>';
                    }                    
                }
            }            
        }else if($_POST['fechaprogramada']){
            # AGREGAR AQUI (PROXIMAMENTE) VALIDAR DATOS RECIBIDOS
            $actualizademo = new DemosModelo();
            $datosdemo = array(                    
                "fechaprogramada" => $_POST['fechaprogramada'],
                "mensaje" => $_POST['mensaje'],
                "iddemo" => $_POST['id'],
                "estado" => "en progreso",
                "barra" => 67
                );
                $resultado = $actualizademo->actualizarSolicitudDemostracion($datosdemo);
                if($resultado){
                    /* $correo = "dhernandez@dhwebdesignmx.com";
                    DemosServicios::enviarCorreoNotificacion($correo, $datosdemo); */
                    echo '<script type="text/javascript">alert("ACTUALIZACI??N CORRECTA");</script>';
                    echo '<script>window.location.href = "inicio"</script>';
                }else{
                    echo '<script type="text/javascript">alert("POR EL MOMENTO NO PODEMOS EJECUTAR LA ACTUALIZACI??N, INTENTE M??S TARDE");</script>';
                    echo '<script>window.location.href = "inicio"</script>';
                }
            echo '<script type="text/javascript">alert("ERRORES EN LOS DATOS ENVIADOS: '. $_POST['fechaprogramada'] . '");</script>';

        }else{
            echo '<script type="text/javascript">alert("No se recibieron datos 12");</script>';
        }
    }

    
    public function actualizarContrase??a(){        
    }
    public function ver(){}


}
