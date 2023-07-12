<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */


class LoginRecuperarContraseña extends BaseController
{
    
    public function __construct()
    {
       
    }
    public function index()
    {
        
        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --']; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        // echo view('estudiantes/principal/header', $data);
        echo view('/principal/header/interfazHeader', $data);
        echo view('/login/recuperar/recuperar', $data);
        echo view('/principal/footer/footer');
        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }

}