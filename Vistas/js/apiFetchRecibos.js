/**
 * @author Dany Hernández <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */

 import { serviciosRecibos as recibo } from "./servicios/servicioRecibos.js";

/**
 * Elementos HTML de la seccion lista empleados para la busqueda asincronica.
 */
const recibosGenerar = document.getElementById('recibos');
const recargosGenerar = document.getElementById('recargos');

/**
 * Al cargar la pagina estaremos escuchando el evento "Keyup", para ejecutar la funcion que busca al empleado
 */
addEventListener("load", () => {

    recibo.verificarRecibos(recibosGenerar);

    recibosGenerar.addEventListener("click", () => {
        recibo.generarRecibos(recibosGenerar);
    });

    recibo.verificarRecargos(recargosGenerar);

    recargosGenerar.addEventListener("click", () => {
        recibo.generarRecargos(recargosGenerar);
    });

});


