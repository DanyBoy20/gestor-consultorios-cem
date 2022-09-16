<?php

namespace Servicios;

use Exception;

/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */

class RegistroPagoServicios {

    /* tablaEditarEmpleados */

    static function mostrarExpedienteRecibo(array $datosrecibo, array $recibos){
        if (!empty($datosrecibo)) {
            echo "
            <div class='contenedor__secciones_titulos'>
                <div class='seccion__titulo color_titulo_seccion'>
                    <div class='contenedor__seccion__descripcion'>
                        <h3 class='contenedor__seccion__titulo texto-normal'>&nbsp;Registro de pago
                        </h3>
                    </div>

                    <div class='contenedor__seccion__descripcion'>
                        <h3 class='contenedor__seccion__titulo texto-normal'>";
                                date_default_timezone_set('America/Mexico_City');
                                $hoy = date("d/m/Y");
                                echo $hoy;
                echo    "</h3>
                    </div>

                </div>
            </div>
            <div class='principal1'>
            <form id='formregistropago' method='POST'>
                    <section class='division_secciones'>
                        <div class='contenedor_izq_der'>
                            <div class='caja__izq_perfil2'>
                                <div class='datos'>
                                    <hr>
                                    <br>&nbsp;
                                    <h2 class='elemento_individual_form_self8 usuario_campo2'>Consultorio:</h2>
                                    <p id='tel' class='usuario_valor2'>&nbsp;" . $datosrecibo[0]['cvecons'] . "</p>
                                    <h2 class='elemento_individual_form_self8 usuario_campo2'>Dimensiones:</h2>
                                    <p id='celu' class='usuario_valor2'>&nbsp;" . $datosrecibo[0]['dimensiones'] . "m<sup>2</sup></p>
                                    <br>&nbsp;
                                    <hr>
                                    <br>&nbsp;
                                </div>
                            </div>
                            <div class='caja__der'>
                                <div id='seccion__izquierda' class='seccion__izquierda'>
                                    <div class='contenedor_elementos_fieldset'>
                                        <div class='elemento_individual_form'>                            
                                            <h2 id='recibo' name='recibo' class='fondot elemento_individual_form_self6'>&nbsp;Recibo:</h2>
                                            <p for='recibo'>&nbsp;" . $datosrecibo[0]['cverecibo'] . "</p>
                                        </div>
                                        <div class='elemento_individual_form'>
                                            <h2 id='propietario' name='propietario' class='fondot elemento_individual_form_self8'>&nbsp;Propietario</h2>
                                            <p for='propietario'>&nbsp;" . $datosrecibo[0]['titulo'] . " " . $datosrecibo[0]['nombre'] . " " . $datosrecibo[0]['apellidop'] . " " . $datosrecibo[0]['apellidom'] ."</p>
                                        </div>


                                        <div class='elemento_individual_form_self3'>
                                        <label for='formapago'><div class='dato_obligatorio'></div>Forma de pago:</label>
                                            <select class='contactoForm_elemento-dimension' name='formapago' id='formapago' required>
                                                <option value='1' selected>Cheque</option>
                                                <option value='2'>Transferencia bancaria</option>
                                                <option value='3'>Deposito</option>
                                                <option value='4'>Efectivo</option>
                                            </select><span class='avisoError'></span>
                                        </div>

                                        <div id='contenedorComentarios' class='elemento_individual_form'>
                                            <label for='mensaje'><div class='dato_obligatorio'></div>Observaciones:</label>
                                            <textarea class='contactoForm_elemento-dimension' name='mensaje' id='mensaje' cols='30' rows='50' minlength='10' maxlength='45' placeholder='Comentarios' required></textarea>
                                            <span id='avisoError' class='avisoError'></span>
                                        </div>
                                        
                                        <div class='elemento_individual_form_self'>
                                            <input type='hidden' name='idrecibo2' value='" . $datosrecibo[0]['idrecibo'] . "'>
                                            <input type='hidden' name='idconsultorio' value='" . $datosrecibo[0]['idconsultorio'] . "'>
                                            <input type='submit' name='guardarRegistroPago' class='btnAzul' id='validarRegistro' value='REGISTRAR'>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
            ";

            echo "
            <div class='seccion__derecha'>
                <!-- Barra titulo | Link | Icono -->
                <div class='tarjeta__cabecera'>
                    <div class='tarjeta__cabecera-titulo texto-normal'>
                        Cuota
                    </div>
                </div>
                <!-- Contenido -->
                <form>
                <div class='tarjeta'>
                    <div class='tabla__contenidos' tabindex='0'>
                        <table class='tabla__general'>
                            <thead>
                                <tr>
                                    <th>Fecha elaboración</th>
                                    <th>Fecha limite de pago</th>
                                    <th>Concepto</th>
                                    <th>Costo por m2</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>
                            <tbody>";

                            if (empty($recibos)) {
                                echo "
                                <tr>
                                    <td colspan='6' class='celda__contenido'>NO TIENE RECIBOS PENDIENTES DE PAGO</td>
                                </tr>";
                            }else{
                                foreach ($recibos as $recibo) {
                                    echo "
                                    <tr>
                                        <td class='celda__contenido'>" . $recibo['fechaelaboracion'] . "</td>
                                        <td class='celda__contenido'>" . $recibo['fechalimitepago'] . "</td>
                                        <td class='celda__contenido'>" . $recibo['descripcion'] . "</td>
                                        <td class='celda__contenido'>MX$ " . number_format($recibo['costo'], 2, ".", ",") . "</td>
                                        <td class='celda__contenido'>MX$ " . number_format($recibo['cantidad'], 2, ".", ",") . "</td>
                                    </tr>
                                ";
                                }                                
                            }
                            echo "
                            </tbody>
                        </table>
                    </div>
                </div>
                </form>
            </div>
            ";

            /* echo "
            <div class='seccion__derecha'>
                <!-- Barra titulo | Link | Icono -->
                <div class='tarjeta__cabecera'>
                    <div class='tarjeta__cabecera-titulo texto-normal'>
                        Prestamos
                    </div>
                </div>
                <!-- Contenido -->
                <div class='tarjeta'>
                    <div class='tabla__contenidos' tabindex='0'>
                        <table class='tabla__general'>
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Monto</th>
                                    <th>Periodo</th>
                                    <th>Tasa</th>
                                    <th>Mensualidad</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>";
                            if (empty($datosprestamos)) {
                                echo "
                                <tr>
                                    <td colspan='7' class='celda__contenido'>No tienen prestamos procesados</td>
                                </tr>";
                            }else{
                                $contadorp = 0;
                                foreach ($datosprestamos as $prestamo) {
                                    echo "
                                    <tr>
                                        <td class='celda__contenido'>" . $prestamo['cveprestamo'] . "</td>
                                        <td class='celda__contenido'>MX$ "  . number_format($prestamo["prestamo"], 0, ".", ",") . "</td>
                                        <td class='celda__contenido'>MX$ " . $prestamo["numeropagos"] . "</td>
                                        <td class='celda__contenido'>" . $prestamo["tasa"]. "</td>
                                        <td class='celda__contenido'>MX$ " . number_format($prestamo["mensualidad"], 0, ".", ",") . "</td>
                                        <td class='celda__contenido'>" . $prestamo['descripcion'] . "</td>
                                        <td class='celda__contenido'>
                                            <form class='formeliminar' name='form'" . ++$contadorp . "' method='post' action=''>
                                                <input type='hidden' name='idsolicitud' value='" . $prestamo['idsolicitud'] . "'>
                                                <input type='hidden' name='idcliente' value='" . $prestamo['idcliente'] . "'>
                                                <input class='btnVerde5' type='submit' value='Ver'>
                                            </form>
                                        </td>
                                    </tr>
                                ";
                                }
                            }
                            echo "  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            "; */

            
        } else {
            echo '<script type="text/javascript">alert("Por el momento no podemos ejecutar su consulta, intente más tarde");</script>';
        }


    }


}
