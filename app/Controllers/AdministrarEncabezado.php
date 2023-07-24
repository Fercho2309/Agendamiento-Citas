<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\EncabezadoModel;
use App\Models\AdministradorModels\UsuariosModel;
use App\Models\AdministradorModels\DetallesModel;

class AdministrarEncabezado extends BaseController
{
    protected $detalle;
    protected $encabezado;
    protected $usuarios;

    public function __construct()
    {
        $this->encabezado = new  EncabezadoModel();
        $this->detalle = new  DetallesModel();
        $this->usuarios = new  UsuariosModel();
    }
    public function index()
    {
        
        $session = session();

        $miperfil = new UsuariosModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);

        
        $dataencabezado = $this->encabezado->obtenerEncabezado('A');
        $dataUsuarios = $this->usuarios->obtenerUsuarios('1','A');
        $dataDetalles = $this->detalle->obtenerDetalles('A');
        
        $dataDetallesEliminados = $this->detalle->obtenerDetalles('E');

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'encabezado' => $dataencabezado, 'detallesEliminados' => $dataDetallesEliminados, 'detalles' => $dataDetalles,'usuarios' => $dataUsuarios, 'User_session' => $session, 'DatosPerfil' => $perfil]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
       
        echo view('/principal/menu/menu', $data);
        echo view('administradores/encabezado/encabezado', $data);
        echo view('/principal/footer/footer', $data);
        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }

    //---------------------------------------Agregar y Actualizar Registros-------------------------------------------------
    public function insertar(){
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {

            $session = session();

            $id_usuario = $session->id_usuario;
            if ($tp == 1) {
                $this->encabezado->insert([
                    'nombre' => $this->request->getPost('nomEncabezado'),
                    // 'usuario_crea' => $this->request->getPost('usuarioCrea')
                    'usuario_crea' => $id_usuario
                ]);

            } else {
                $this->encabezado->update(
                    $this->request->getPost('id_encabezado'),[       
                        'nombre' => $this->request->getPost('nomEncabezado'),
                        'usuario_crea' => $this->request->getPost('usuarioCrea'),
                        'usuario_crea' => $id_usuario
                        
                ]);
            }
            return redirect()->to(base_url('/encabezado'));
        }
    }

    public function buscar_Encabezado($id){
        $retornoEncabezado = array();
        $enca = $this->encabezado->colocarEncabezado($id, 'A');
        if (!empty($enca)) {
            array_push($retornoEncabezado, $enca);
        }
        echo json_encode($retornoEncabezado);
    }


    

    //---------------------------------------ELIMINADOS-------------------------------------------------
    public function Indexeliminados()
        {
            $session = session();

            $miperfil = new UsuariosModel();
    
            $perfil = $miperfil->traer_usuario($session->id_usuario);

            $dataencabezado = $this->encabezado->obtenerEncabezado('E');

            $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'encabezado' => $dataencabezado, 'User_session' => $session, 'DatosPerfil' => $perfil];

            echo view('/principal/menu/menu', $data);
            echo view('/administradores/encabezado/eliminados', $data);
            echo view('/principal/footer/footer', $data);
        
        }

    public function eliminar($id, $estado){
            $Encabezado_ = $this->encabezado->elimina_Encabezado($id,$estado);
            return redirect()->to(base_url('/encabezado'));
        }
}
