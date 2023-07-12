<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\AccionesModel;
use App\Models\AdministradorModels\UsuariosModel;

class AdministrarAcciones extends BaseController
{
    
    protected $acciones;
    protected $usuarios;

    public function __construct()
    {
        $this->acciones = new  AccionesModel();
        $this->usuarios = new  UsuariosModel();
    }
    public function index()
    {
        
        $dataacciones = $this->acciones->obtenerAcciones('A');
        $dataUsuarios = $this->usuarios->obtenerUsuarios('1','A');
        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'acciones' => $dataacciones, 'usuarios' => $dataUsuarios]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
       
        echo view('administradores/principal/headercopy', $data);
        echo view('administradores/acciones/acciones', $data);
        echo view('/principal/footer/footer', $data);
        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }

    //---------------------------------------Agregar y Actualizar Registros-------------------------------------------------
        public function insertar(){
            $tp=$this->request->getPost('tp');
            if ($this->request->getMethod() == "post") {
                if ($tp == 1) {
                    $this->acciones->insert([
                        'nombre' => $this->request->getPost('nomAcciones'),
                        'descripcion' => $this->request->getPost('descripcion'),
                        'usuario_crea' => $this->request->getPost('usuarioCrea')
                    ]);
    
                } else {
                    $this->acciones->update(
                        $this->request->getPost('id_acciones'),[       
                            'nombre' => $this->request->getPost('nomAcciones'),
                            'descripcion' => $this->request->getPost('descripcion'),
                            'usuario_crea' => $this->request->getPost('usuarioCrea')
                    ]);
                }
                return redirect()->to(base_url('/acciones'));
            }
        }

        public function buscar_Acciones($id){
            $retornoAcciones = array();
            $accion = $this->acciones->colocarAcciones($id, 'A');
            if (!empty($accion)) {
                array_push($retornoAcciones, $accion);
            }
            echo json_encode($retornoAcciones);
        }

     //---------------------------------------ELIMINADOS-------------------------------------------------
    public function Indexeliminados()
        {
            $dataacciones = $this->acciones->obtenerAcciones('E');

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'acciones' => $dataacciones];

            echo view('/administradores/principal/headercopy', $data);
            echo view('/administradores/acciones/eliminados', $data);
            echo view('/principal/footer/footer', $data);
        
        }

    public function eliminar($id, $estado){
            $Acciones_ = $this->acciones->elimina_Acciones($id,$estado);
            return redirect()->to(base_url('/acciones'));
        }

}