<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\UsuariosModel;
use App\Models\EstudiantesModels\SolicitarCItaModel;

class DocenteBuzonEntrada extends BaseController
{
    protected $cita;
    public function __construct()
    {
        $this->cita = new SolicitarCitaModel();
       
    }
    public function index()
    {
        $session = session();
        // $idUsuario = $session->id_usuario;

        $miperfil = new UsuariosModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);
        $citaAll = $this->cita->AllCitas('A');
        $citasDeUnUsuario = $this->cita->CitasPorIdUsuarioAgenda();
        $citasDeUnDocente = $this->cita->CitasAgendadasDocente();
        $RegistroSuperAdmin = $this->cita-> CitasSuperAdministrador('A');

        $data = [
            'titulo' => 'Nombre de la APP', 
            'nombre' => '-- Nombre del Colegio --', 
            'DatosPerfil' => $perfil, 
            'User_session' => $session, 
            'Rcitas' => $citaAll, 
            'DatosPerfil' => $perfil,
            'misCitas' => $citasDeUnUsuario,
            'citasDocente' => $citasDeUnDocente,
            'RSAdmin' => $RegistroSuperAdmin,
        ]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        echo view('principal/menu/menu', $data);
        echo view('docentes/buzonEntrada/buzon', $data);
        echo view('/principal/footer/footer', $data);
        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }

}