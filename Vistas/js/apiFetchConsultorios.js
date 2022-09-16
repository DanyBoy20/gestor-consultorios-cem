/**
 * @author Dany Hernández <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */

 import { serviciosConsultorios as consultorio } from "./servicios/servicioConsultorio.js";

/**
 * Elementos HTML de la seccion lista empleados para la busqueda asincronica.
 */
const nombre = document.getElementById('nombre');
const filaconsultorio = document.getElementById("fila_consultorio");
const nivel = filaconsultorio.dataset;

/**
 * Al cargar la pagina estaremos escuchando el evento "Keyup", para ejecutar la funcion que busca al empleado
 */
addEventListener("load", () => {
    /* console.log(nivel); */
    nombre.addEventListener("keyup", (event) => {
        if(event.target.value == ""){
            consultorio.cargarConsultorios(filaconsultorio, nivel);
        }else{
            filaconsultorio.innerHTML = "";
            consultorio.valorBuscado(event, filaconsultorio, nivel);
        }

    });
});


/**
 * Permite eliminar un empleado segun los datos pasados por el formulario.
 * @type {NodeListOf<HTMLElement>} El elemento HTML, representa a los formularios de eliminacion.
 * @param {HTMLElement} formulario El formulario de donde se envo el dato a eliminar.
 */
document.querySelectorAll('.eliminarRegistro').forEach((formulario) => {
    /**
    * Escuchador del evento "click" sobre el formulario HTML.
    * @type {HTMLElement} El elemento HTML, representa al formulario.
    * @listens formulario#click El evento que se escuchara del elemento HTML.
    * @param {HTMLElement} e EL formulario que dispara el evento click.
    * @returns {Boolean} Retorna false si se cancela la eliminacion, en caso contrario, envia el formulario.
    */
    formulario.addEventListener("submit", (e) => {
        e.preventDefault();
        console.log(e.target);
        var confirmarEliminar=confirm("¿Esta seguro de eliminar el registro?");
        if (confirmarEliminar==true){
            e.target.submit();
        }else{
            return false;
        }        
    });
});
