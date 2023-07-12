<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\UsuariosModel;

class AdministrarHeader extends BaseController
{
    protected $Perfil;

    public function __construct()
    {
        $this-> Perfil = new UsuariosModel();
    }

    public function index()
    {

    $session = session();
    $miperfil = new UsuariosModel();

    $perfil = $miperfil->traer_usuario($session->id_usuario);
    
        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'session' => $session, 'DatosPerfil' => $perfil ]; 

        echo view('docentes/principal/headercopy', $data);
        echo view('/administradores/principal/headercopy', $data);
        echo view('/headerperfil/principal/headercopy', $data);
        echo view('/principal/footer/footer', $data);
    



    }
}