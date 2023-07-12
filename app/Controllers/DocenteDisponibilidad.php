<?php

namespace App\Controllers;
// namespace App\Controllers\PruebaCalendar;

use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
// use App\Models\PruebaCalendar\EventoModel;
use App\Models\PruebaCalendar\CalendarioModel;
use App\Models\AdministradorModels\UsuariosModel;

class DocenteDisponibilidad extends BaseController
{
    protected $eventos;
    protected $miperfil;

    public function __construct()
    {
        $this->eventos = new CalendarioModel();
        
    }
    
    public function index()
    {
        $session = session();
        $miperfil = new UsuariosModel();
        $idUsuarioglobal = $miperfil->traer_usuario($session->id_usuario);
        $datosEventos = $this->eventos->traer_todos_los_eventos_por_usuario();

        $data = [
            'DatosPerfil' => $idUsuarioglobal,
            'User_session' => $session,
            'eventos' => $datosEventos
        ];

        echo view('principal/menu/menu', $data);
        echo view('docentes/agendamientoDisponibilidad/agendamiento', $data);
        echo view('/principal/footer/footer', $data);

    }


    public function crear_disponiblidad(){

        $session = session();
        $id_usuario = $session->get('id_usuario');

        //Datos Inputs
        echo $id = $this->request->getPost('id_calendario');
        $title = $this->request->getPost('titles');
        $aulas = $this->request->getPost('aulas');
        $start = $this->request->getPost('start');
        $end = $this->request->getPost('end');
        $color = $this->request->getPost('color');

    if( $id && $this->request->getMethod() == "post" ) {	
            
        $this->eventos->update($id, [
            'title' => $this->request->getPost('titles'),
            'aulas' => $this->request->getPost('aulas'),
            'start' => $this->request->getPost('start'),
            'end' => $this->request->getPost('end'),
            'color' => $this->request->getPost('color'),
            'usuario_crea' => $id_usuario,
        ]);

         $data['eventos'] = $this->eventos->findAll();

         return redirect()->to('/agendamientodisponibilidad')->with('data', $data);


        }else if( $this->request->getMethod() == "post" ){

        //Dividir y generar registros diferentes por cada media hora.
        $horaInicio = strtotime($start);
        $horaFin = strtotime($end);
        $intervalo = 30 * 60;

        // Generar los registros.
        $registros = array();
        $tiempoInicio = $horaInicio;

        while( $tiempoInicio < $horaFin ) {
            $tiempoFin = $tiempoInicio + $intervalo;

            $horaI = date('H:i', $tiempoInicio);
            $horaF = date('H:i', $tiempoFin);
            
            $registros[] = array(
                'title' => $title,
                'aulas' => $aulas,
                'start' => $horaI,
                'end' => $horaF,
                'color' => $color
            );
            
            $tiempoInicio = $tiempoFin;
        }
        
        //Fecha Campo seleccionado
        $fecha = substr($start, 0, -6);

        foreach($registros as $registro) {
            $this->eventos->insert([
                'title' => $registro['title'],
                'aulas' => $registro['aulas'],
                'start' => $fecha .'T' .$registro['start'],
                'end' => $fecha .'T' .$registro['end'],
                'color' => $registro['color'],
                'usuario_crea' => $id_usuario
            ]);
        }
    
        $data['eventos'] = $this->eventos->findAll();
        return redirect()->to('/agendamientodisponibilidad')->with('data', $data);
               
    }
}

   public function eliminar_evento($id)
    {
        $this->eventos->delete($id);
        return $this->response->setJSON(['success' => true]);
    }

    }