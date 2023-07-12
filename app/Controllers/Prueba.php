<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */

class Prueba extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --']; 

        echo view('/administradores/principal/headercopy', $data);
        echo view('/administradores/prueba/prueba', $data);
        echo view('/principal/footer/footer', $data);
    }

    

}

