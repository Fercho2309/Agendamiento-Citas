<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\UsuariosModel;
use App\Models\AdministradorModels\DetallesModel;
use App\Models\AdministradorModels\AsuntosModel;
use App\Models\AdministradorModels\HorasModel;
use App\Models\PruebaCalendar\CalendarioModel;
use App\Models\AdministradorModels\RolesModel;
use App\Models\EstudiantesModels\SolicitarCItaModel;

class EstudiantesSolicitarCita extends BaseController
{
    
    protected $usuarios;
    protected $detalles;
    protected $asuntos;
    protected $horas;
    protected $eventos;
    protected $roles;
    protected $cita;
    
    public function __construct()
    {
        $this->usuarios = new  UsuariosModel();
        $this->detalles = new DetallesModel();
        $this->asuntos = new AsuntosModel();
        $this->eventos = new CalendarioModel();
        $this->roles = new RolesModel();
        $this->cita = new SolicitarCitaModel();

        // $this->horas = new HorasModel();
    
    }
    public function index()
    {

        $session = session();

        $miperfil = new UsuariosModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);
        $datosEventos = $this->eventos->traer_todos_los_eventos_por_usuario();
        $calendarioID = $this->eventos->TomarIDEventos('A');
        $dispDocente = $session->disp_docente;
        
        
        $datasUsuarios= $this->usuarios->obtenerUsuarios('8','A');   
        $usuarios = $this->usuarios->obtenerUsuariosTodo('A');                                                                                                                                                                                        
        $dataDetallescargo = $this->detalles->obtenerDetallesConexion('3','A');
        $dataDetallesViabilidad = $this->detalles->obtenerDetallesConexion('7', 'A');
        $Nameroles = $this->usuarios->obtenerRolreceptor('5', 'A');
        $dataAsunto = $this->asuntos->obtenerAsuntos('A');
        $citaAll = $this->cita->AllCitas('A');
        // $dataHoras = $this->horas->obtenerHoras('A');

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --','detallecargo' => $dataDetallescargo, 'asunto' => $dataAsunto, 'viabilidad' => $dataDetallesViabilidad, 'DatosPerfil' => $perfil, 'User_session' => $session,'RNombres' => $Nameroles, 'eventos' => $datosEventos,'disp_docente' => $dispDocente, 'session' => $session, 'calendarioID' => $calendarioID, 'Rcitas' => $citaAll, 'usuarios' => $usuarios];
        echo view('principal/menu/menu', $data);
        echo view('estudiantes/Solicitar/solicitar', $data);
        echo view('/principal/footer/footer');
        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }

    public function obtenerid($id)
    {
        $returnData = array();
        $cosas = $this->eventos->eventosByIdUsuario($id);

        if (!empty($cosas)) {
            array_push($returnData, $cosas);    
            echo json_encode($returnData);   
        }else{
            echo("Vacio");
        }
    }


    public function traer_disp_docente() {
        $session = session();

        $idDocente = $this->request->getPost('tipoUsuario');
        $cosas = $this->eventos->eventosByIdUsuario($idDocente);

        if (!empty($cosas)) {   
            return redirect()->to(base_url('solicitar'))->with('disp_docente', $cosas );    
        } else{
            return redirect()->to(base_url('solicitar?alert=En la actualidad, no se encuentran horarios disponibles registrados por el usuario'));
        }
        
    }

    public function crear_Cita()
    {

        $session = session();
        $id_usuario = $session->get('id_usuario');

        if ($this->request->getMethod() === 'post') {

            $this->eventos->update($this->request->getPost('id_evento'),[
                'title' => 'Agendado', //Cambiar a no disponible para agendar.
                'estado' => 'A', //A: Cambiar estado a A: Agendado. 
                'color' => '#E83845'
            ]);

            $this->cita->insert([
                // 'title' => $this->request->getPost('titles'),
                'title' => $this->request->getPost('titles'),
                'aula' => $this->request->getPost('aulas'),
                'id_asunto' => $this->request->getPost('asunto'),
                'disponibilidad' => $this->request->getPost('id_evento'),
                'hora_de_inicio' => $this->request->getPost('start'),
                'hora_de_finalizacion' => $this->request->getPost('end'),
                'estado' => $this->request->getPost('estado'),
                'usuario_crea' => $id_usuario,
            ]);

               // Obtén todos los registros guardados
               $data['eventos'] = $this->cita->findAll();

               return redirect()->to('/solicitar')->with('data', $data);
        }
        
    }
    
}