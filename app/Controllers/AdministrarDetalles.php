<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\DetallesModel;
use App\Models\AdministradorModels\UsuariosModel;
use App\Models\AdministradorModels\EncabezadoModel;

class AdministrarDetalles extends BaseController
{
    
    protected $detalle;
    protected $usuarios;
    protected $encabezado;

    public function __construct()
    {
        $this->detalle = new  DetallesModel();
        $this->usuarios = new  UsuariosModel();
        $this->encabezado = new  EncabezadoModel();
    }
    public function index()
    {

        $session = session();

        $miperfil = new UsuariosModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);
        
        $dataDetalles = $this->detalle->obtenerDetalles('A');
        $dataEncabezado= $this->encabezado->obtenerEncabezado('A');
        $dataUsuarios = $this->usuarios->obtenerUsuarios('1','A');

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'detalles' => $dataDetalles, 'encabezado' => $dataEncabezado, 'usuarios' => $dataUsuarios, 'User_session' => $session, 'DatosPerfil' => $perfil]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
       
        echo view('/principal/menu/menu', $data);
        echo view('administradores/detalles/detalles', $data);
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
                $this->detalle->insert([
                    'id_encabezado' => $this->request->getPost('encabezado'),
                    'nombre' => $this->request->getPost('nomDetalle'),
                    'resumen' => $this->request->getPost('resumen'),
                    // 'usuario_crea' => $this->request->getPost('usuarioCrea')
                    'usuario_crea' => $id_usuario

                ]);

            } else {
                $this->detalle->update(
                    $this->request->getPost('id_detalles'),[       
                        'id_encabezado' => $this->request->getPost('encabezado'),
                        'nombre' => $this->request->getPost('nomDetalle'),
                        'resumen' => $this->request->getPost('resumen'),
                        // 'usuario_crea' => $this->request->getPost('usuarioCrea')
                        'usuario_crea' => $id_usuario

                ]);
            }
            return redirect()->to(base_url('/detalles'));
        }
    }

    public function buscar_Detalle($id){
        $retornoDetalle = array();
        $deta = $this->detalle->colocarDetalles($id, 'A');
        if (!empty($deta)) {
            array_push($retornoDetalle, $deta);
        }
        echo json_encode($retornoDetalle);
    }


    //---------------------------------------ELIMINADOS-------------------------------------------------
    public function Indexeliminados()
        {
            $session = session();

            $miperfil = new UsuariosModel();
    
            $perfil = $miperfil->traer_usuario($session->id_usuario);
            
            $dataDetalles = $this->detalle->obtenerDetalles('E');

            $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'detalles' => $dataDetalles, 'DatosPerfil' => $perfil, 'User_session' => $session,];

            echo view('/principal/menu/menu', $data);
            echo view('/administradores/detalles/eliminados', $data);
            echo view('/principal/footer/footer', $data);
        
        }

    public function eliminar($id, $estado){
            $Detalle_ = $this->detalle->elimina_Detalles($id,$estado);
            return redirect()->to(base_url('/detalles'));
        }

}
