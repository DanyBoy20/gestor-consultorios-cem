<?php namespace Interfaces;
/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see <a href="https://dhwebdesignmx.com">dh Web Design</a>
 */

/**
 * Interface Usuarios: Metodos CRUD
 */
interface IConsultorios{
    
    /**
     * Metodo para consultar
     *
     * @return void
     */
    public function consultarPB();

    public function consultar1N();

    public function consultar2N();

    public function consultar3N();

    /**
     * Metodo para guardar
     *
     * @return void
     */
    public function guardar();

    /**
     * Metodo para actualizar
     *
     * @return void
     */
    public function actualizarContraseña(); 

    /**
     * Metodo para ver
     *
     * @return void
     */
    public function ver();

    /**
     * Metodo para editar
     *
     * @return void
     */
    public function editar();
    

}