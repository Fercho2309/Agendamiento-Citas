<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\UsuariosModel;
use App\Models\EstudiantesModels\SolicitarCItaModel;
use App\Models\PruebaCalendar\CalendarioModel;

class DocenteBuzonEntrada extends BaseController
{
    protected $cita;
    public function __construct()
    {
        $this->cita = new SolicitarCitaModel();
        $this->eventos = new CalendarioModel();
       
    }
    public function index()
    {
        $session = session();
        // $idUsuario = $session->id_usuario;

        $miperfil = new UsuariosModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);
        $citaAll = $this->cita->AllCitas('A');
        $citasDeUnUsuario = $this->cita->CitasPorIdUsuarioAgenda('A');
        $citasDeUnDocente = $this->cita->CitasAgendadasDocente();
        $RegistroSuperAdmin = $this->cita-> CitasSuperAdministrador('A');

        $data = [

            'titulo' => 'Nombre de la APP', 
            'nombre' => '-- Nombre del Colegio --', 
            'DatosPerfil' => $perfil, 
            'User_session' => $session, 
            'Rcitas' => $citaAll, 
            'misCitas' => $citasDeUnUsuario,
            'citasDocente' => $citasDeUnDocente,
            'RSAdmin' => $RegistroSuperAdmin,

        ]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        echo view('principal/menu/menu', $data);
        echo view('docentes/buzonEntrada/buzon', $data);
        echo view('/principal/footer/footer', $data);
        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }

    
    //---------------------------------------ELIMINADOS-------------------------------------------------
    public function Indexeliminados()
    {

        $session = session();

        $miperfil = new UsuariosModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);

        $citasDeUnUsuario = $this->cita->CitasPorIdUsuarioAgenda('E');
        
        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'misCitas' => $citasDeUnUsuario,'DatosPerfil' => $perfil, 'User_session' => $session,];
        
        echo view('/principal/menu/menu', $data);
        echo view('/docentes/buzonEntrada/eliminados', $data);
        echo view('/principal/footer/footer', $data);
        
    }
    
    public function eliminar($id, $estado) {
        $cita_ = $this->cita->elimina_Cita($id,$estado);
        return redirect()->to(base_url('/buzonEntrada'));
    }

}