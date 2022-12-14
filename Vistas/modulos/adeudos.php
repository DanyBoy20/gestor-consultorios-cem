<?php
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
?>
<main class="contenido">
<!-- TITULO VENTANA -->
<div class="contenedor__secciones_titulos">
    <div class="seccion__titulo color_titulo_seccion">
        <div class="contenedor__seccion__descripcion">
            <h3 class="contenedor__seccion__titulo texto-normal">
                Adeudos
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
    <section class="division_secciones">
        <div class="contenedor_izq_der">
            <!-- INICIO IZQUIERDA -->

            <div class="caja__izq">
                <h2>Buscar por:</h2>
                <div class="elemento_individual_form">
                    <input type="text" id="nombre" name="nombre" placeholder="Apellido paterno" class="contactoForm_elemento-dimension" minlength="4" maxlength="35" required />
                </div>

                <!-- <div class='elemento_individual_form_self3'>
                    <label for='formapago'><div class='dato_obligatorio'></div>Filtrar por planta:</label>
                    <select class='contactoForm_elemento-dimension' name='formapago' id='formapago' required>
                        <option value='1' selected>Planta baja</option>
                        <option value='2'>Transferencia bancaria</option>
                        <option value='3'>Deposito</option>
                        <option value='4'>Efectivo</option>
                    </select><span class='avisoError'></span>
                </div> -->

            </div>

            <!-- FIN IZQUIERDA -->

            <!-- INICIO DERECHA -->
            <div class="caja__der">
                <div id="contenedor_lista_hospitales" class="contenedor__tablas">
                    <div class="tabla__contenidos" tabindex="0">
                        <table class="tabla__general">
                            <thead>
                                <tr>
                                    <th>Consultorio</th>
                                    <th>Propietario</th>
                                    <th>No. Recibo</th>
                                    <th>Fecha limite pago</th>
                                    <th>Cantidad</th>
                                    <th>Acci??n</th>
                                </tr>
                            </thead>
                            <tbody id="fila_consultorio">                    
                            <?php
                                $modulo = new Controladores\RecibosRentaControlador();
                                $modulo->consultar();
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- FIN DERECHA -->
        </div>
    </section>
</div>
</main>
<script src="Vistas/js/apiFetchRecibosRenta.js" type="module"></script>