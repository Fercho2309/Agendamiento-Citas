<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\EstudiantesModels\RegistroCitaModel;
use App\Models\AdministradorModels\UsuariosModel;

class EstudiantesRegistroCita extends BaseController
{
    
    protected $citas;

    public function __construct()
    {
        $this->citas = new RegistroCitaModel();
    }

    public function index()
    {

        $session = session();

        $miperfil = new UsuariosModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);
        
        $citas = $this->citas->obtenerCitas('A'); 

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'citas' => $citas,'DatosPerfil' => $perfil, 'User_session' => $session,]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        // echo view('estudiantes/principal/header', $data);
        echo view('/principal/menu/menu', $data);
        echo view('/estudiantes/registrarCita/registro', $data);
        echo view('/principal/footer/footer', $data);
        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }

    public function eliminados()
        {

            $session = session();

            $miperfil = new UsuariosModel();
    
            $perfil = $miperfil->traer_usuario($session->id_usuario);

            $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --','DatosPerfil' => $perfil, 'User_session' => $session,    ];

            echo view('/principal/menu/menu', $data);
            echo view('/estudiantes/registrarCita/cancelados', $data);
            echo view('/principal/footer/footer', $data);
        
        }
      
}