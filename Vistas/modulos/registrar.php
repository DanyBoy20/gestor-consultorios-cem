<?php
/* session_start(); */
if(!isset($_SESSION['validar'])){
    echo '<script>window.location.href="index"</script>';
    exit();
}
if(!$_SESSION['validar']){
    echo '<script>window.location.href="index"</script>';
    exit();
}
include 'Vistas/modulos/cabecera.php';
include 'Vistas/modulos/navegacion.php';
$guardarUsuario = new Controladores\SolicitudesControlador;
$guardarUsuario->guardar();
?>
<main class="contenido">
    <!-- TITULO VENTANA -->
    <div class="contenedor__secciones_titulos">
        <div class="seccion__titulo color_titulo_seccion">
            <div class="contenedor__seccion__descripcion">
                <h3 class="contenedor__seccion__titulo texto-normal">
                    Nueva solicitud
                </h3>
            </div>
            <div class="contenedor__seccion__descripcion">
                <h3 class="contenedor__seccion__titulo texto-normal">
                    <?php
                        date_default_timezone_set('America/Mexico_City');
                        echo date("d/m/Y");
                    ?>
                </h3>
            </div>
        </div>
    </div>
    <!-- CONTENEDOR PRINCIPAL VENTANA -->
    <div class="principal1">
        <form id="formRegistroSolicitud" method="POST" class="caja__der" >
            <section class="division_secciones">
                <div class="contenedor_izq_der">
                    <!-- INICIO IZQUIERDA -->

                    <div class="caja__izq">
                        <div class="elemento_individual_form">
                            <label for="cliente"><div class="dato_obligatorio"></div>Cliente:</label>

                            <input type="text" name="cliente" id="cliente" list="listacliente" class="contactoForm_elemento-dimension" placeholder="Nombre o apellidos" required />
                            <span id="avisoError" class="avisoError"></span>
                            
                        </div> 
                    </div>
                    <!-- FIN IZQUIERDA -->

                    <!-- INICIO DERECHA -->

                        <fieldset id="seccion__izquierda" class="seccion__izquierda">
                            <div class="contenedor_elementos_fieldset">

                                <div id="contenedorBoton" class="elemento_individual_form_self ocultar">
                                    <input type="submit" name="" class="btnVerde4" id="guardarSolicitud" value="GUARDAR">
                                </div>
                                
                            </div>
                        </fieldset>

                    
                    <!-- FIN DERECHA -->
                </div>
            </section>
        </form>
    </div>
</main>
<script src="Vistas/js/consultorioRegistroPago.js" type="module"></script>
<!-- <script src="Vistas/js/apiFetchSolicitudes.js" type="module"></script> -->