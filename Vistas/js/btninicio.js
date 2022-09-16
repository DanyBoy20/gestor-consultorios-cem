/**
 * @author Dany Hernández <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */

 import { nuevosDatosPropietario as actualizarEmpleado } from "./funciones/validarbtninicio.js";

 const idFormulario = document.getElementById("form");

 const botonValidarForm = document.getElementById("validarIngreso");
 
 botonValidarForm.addEventListener("click", (event) => {
  event.preventDefault();
   actualizarEmpleado.validarFormulario(idFormulario);
 });
 