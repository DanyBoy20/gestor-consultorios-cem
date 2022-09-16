/**
 * @author Dany Hernández <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */

 import { serviciosConsultorios as consultorio } from "./servicios/servicioReciboRenta.js";

/**
 * Elementos HTML de la seccion lista empleados para la busqueda asincronica.
 */
const nombre = document.getElementById('nombre');
const filaconsultorio = document.getElementById("fila_consultorio");

/**
 * Al cargar la pagina estaremos escuchando el evento "Keyup", para ejecutar la funcion que busca al empleado
 */
addEventListener("load", () => {

    nombre.addEventListener("keyup", (event) => {
        if(event.target.value == ""){
            consultorio.cargarConsultorios(filaconsultorio);
        }else{
            filaconsultorio.innerHTML = "";
            consultorio.valorBuscado(event, filaconsultorio);
        }

    });

});
