/**
 * @author Dany Hernández <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */


 import { validarContrasenias as actualizaContra } from "./funciones/validarCambioPws.js";

/**
 * Elementos HTML de la sección actualizar empleados.
 */
const formularioActualizar = document.getElementById('idformularioactualizar');
const contrasenia = document.getElementById('contrasenia');
const repetircontrasenia = document.getElementById('repetircontrasenia');
const btnActualizar = document.getElementById('btnactualizar');

/**
 * Escuchador del evento "focus" sobre el elemento HTML contraseña.
 * @type {HTMLElement} El elemento HTML, representa al campo contraseña.
 * @listens contrasenia#focus El evento que se escuchara del elemento HTML.
 */
contrasenia.addEventListener('focus', (e) => {
    actualizaContra.borrarError(e);
});

/**
 * Escuchador del evento "blur" sobre el elemento HTML contraseña.
 * @type {HTMLElement} El elemento HTML, representa al campo contraseña.
 * @listens contrasenia#blur El evento que se escuchara del elemento HTML.
 */
contrasenia.addEventListener('blur', (e) => {
    actualizaContra.validarContraUno(e);
});

/**
 * Escuchador del evento "focus" sobre el elemento HTML repetir contraseña.
 * @type {HTMLElement} El elemento HTML, representa al campo repetir contraseña.
 * @listens repetircontrasenia#focus El evento que se escuchara del elemento HTML.
 */
repetircontrasenia.addEventListener('focus', (e) => {
    actualizaContra.borrarError(e);
});

/**
 * Escuchador del evento "blur" sobre el elemento HTML repetir contraseña.
 * @type {HTMLElement} El elemento HTML, representa al campo repetir contraseña.
 * @listens repetircontrasenia#blur El evento que se escuchara del elemento HTML.
 */
repetircontrasenia.addEventListener('blur', (e) => {
    actualizaContra.validarContraDos(e);
});

/**
 * Escuchador del evento "click" sobre el elemento HTML repetir contraseña.
 * @type {HTMLElement} El elemento HTML, representa al boton que enviara el formulario de actalizacion.
 * @listens btnActualizar#click El evento que se escuchara del elemento HTML.
 */
btnActualizar.addEventListener("click", () => {
    actualizaContra.validarFormulario(formularioActualizar);
});