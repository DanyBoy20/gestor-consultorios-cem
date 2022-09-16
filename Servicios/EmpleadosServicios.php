<?php

namespace Servicios;

use Exception;

/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */

class EmpleadosServicios {

    public $errores = [];
    public $claveacceso;
    public $claveacceso2;

    /**
     * Validar la contraseña a actualizar
     *
     * @param string $contrasenia1 El campo con la contraseña
     * @param string $contrasenia2 El campo con la contraseña escrita por segunda vez
     * @return array Mensajes de errores en la captura de la contraseña
     */
    public function validarContrasenia(string $contrasenia1, string $contrasenia2): array {
        $this->claveacceso = $contrasenia1;
        $this->claveacceso2 = $contrasenia2;

        if (trim($this->claveacceso) == '') {
            $this->errores[] = '\nDebe ingresar una contraseña';
        }
        if (preg_match('/^(?=.{8,8}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/', $this->claveacceso) == 0) {
            $this->errores[] = '\nLa contraseña debe tener 8 caracteres, al menos una letra mayuscula, una minuscula, un simbolo y un numero';
        }
        if (trim($this->claveacceso2) == '') {
            $this->errores[] = '\nDebe ingresar una contraseña';
        }
        if (preg_match('/^(?=.{8,8}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/', $this->claveacceso2) == 0) {
            $this->errores[] = '\nLa contraseña debe tener 8 caracteres, al menos una letra mayuscula, una minuscula, un simbolo y un numero';
        }
        if ($this->claveacceso != $this->claveacceso2) {
            $this->errores[] = '\nLas contraseñas no coinciden';
        }
        return $this->errores;
    }

    static function crearContrasenia(int $longitud) : string {
        /* Arreglos con todos los caracteres validos */
            $minusculas = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
            $mayusculas = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
            $simbolos = array('!','"','#','$','%','&','\'','(',')','*','+',',','-','.','/',':',';','<','=','>','?','@','[','\\',']','^','_','`','{','|','}');
            $numeros = array('0','1','2','3','4','5','6','7','8','9');
            $arregloCompleto = array($minusculas, $mayusculas, $simbolos, $numeros); 
            /* contrasenia contendra inicialmente 4 caracteres: una minuscula, una mayuscula, un simbolo y un numero */
            $contrasenia = $minusculas[array_rand($minusculas, 1)];
            $contrasenia = $contrasenia . $mayusculas[array_rand($mayusculas, 1)];
            $contrasenia = $contrasenia . $simbolos[array_rand($simbolos, 1)];
            $contrasenia = $contrasenia . $numeros[array_rand($numeros, 1)];   
            /* strlen nos dara la longitud de i (contraseña = 4), max nos da el numero de dos valores (sera la condicion), incrementamos i  */
            for($i = strlen($contrasenia); $i < max(8, $longitud); $i++){
                // obtenemos una clave aleatoria del arreglo completo con array_rand($arregloCompleto, 1)
                $temporal = $arregloCompleto[array_rand($arregloCompleto, 1)];
                // la unimos a nuestra contraseña actual de 4 caracteres
                $contrasenia = $contrasenia . $temporal[array_rand($temporal, 1)];
            }
            /* regresamos la cadena desordenada */
            return str_shuffle($contrasenia);
    }


    


























}
