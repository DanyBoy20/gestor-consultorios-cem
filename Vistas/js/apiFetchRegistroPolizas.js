/**
 * @author Dany Hernández <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */

 import { servicioPolizas as poliza } from "./servicios/servicioTablaPolizas.js";

/**
 * Elementos HTML que contendran los datos devueltos por la API de ubicaciones de México.
 */

const fila_empleado = document.getElementById("fila_empleado");

/**
 * Al cargar la pagina obtenemos la API de los estados de la republica mexicana
 */
addEventListener("load", () => {

  poliza.cargarTipoPolizas(fila_empleado);

});
