<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\UsuariosModel;

class Inicio extends BaseController    
{    
    public function __construct()
    {}
        public function index() 
        {           
            $data = ['titulo' => 'Nombre de la APP','nombre'=>'-- Nombre del Colegio --']; 
            echo view('/principal/header/interfazHeader', $data);
            // echo view('/principal/header/Inicio.php');
        }     

        public function Admin()
        {

            $session = session();

            $miperfil = new UsuariosModel();

            $perfil = $miperfil->traer_usuario($session->id_usuario);
            // var_dump($perfil); 
    
            $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'DatosPerfil' => $perfil, 'User_session' => $session,]; 
            echo view('principal/menu/menu', $data);
            echo view('principal/inicioAdmin/inicioAdmin', $data);
            echo view('/principal/footer/footer', $data);

        }

}