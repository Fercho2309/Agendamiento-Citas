<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\PermisosModel;
use App\Models\AdministradorModels\UsuariosModel;
use App\Models\AdministradorModels\AccionesModel;
use App\Models\AdministradorModels\RolesModel;

class AdministrarPermisos extends BaseController
{
    
    protected $permisos;
    protected $usuarios;
    protected $acciones;
    protected $roles;

    public function __construct()
    {
        $this->permisos = new  PermisosModel();
        $this->usuarios = new  UsuariosModel();
        $this->acciones = new  AccionesModel();
        $this->roles = new  RolesModel();
    }
    public function index()
    {
        
        $datapermisos= $this->permisos->obtenerPermisos('A');
        $dataAcciones= $this->acciones->obtenerAcciones('A');
        $dataRoles= $this->roles->obtenerRol('A');
        $datasUsuarios= $this->usuarios->obtenerUsuarios('1','A');

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'permiso' => $datapermisos, 'usuarios' => $datasUsuarios, 'acciones' => $dataAcciones, 'roles' => $dataRoles]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
       
        echo view('administradores/principal/headercopy', $data);
        echo view('administradores/permiso/permisos', $data);
        echo view('/principal/footer/footer', $data);
        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }
     

    //---------------------------------------Agregar y Actualizar Registros-------------------------------------------------
        public function insertar(){
            $tp=$this->request->getPost('tp');
            if ($this->request->getMethod() == "post") {
                if ($tp == 1) {
                    $this->permisos->insert([
                        'id_acciones' => $this->request->getPost('acciones'),
                        'id_rol' => $this->request->getPost('roles'),
                        'usuario_crea' => $this->request->getPost('usuarioCrea')
                    ]);
    
                } else {
                    $this->permisos->update(
                        $this->request->getPost('id_permiso'),[       
                            'id_acciones' => $this->request->getPost('acciones'),
                            'id_rol' => $this->request->getPost('roles'),
                            'usuario_crea' => $this->request->getPost('usuarioCrea')
                    ]);
    
    
    
                }
                return redirect()->to(base_url('/permisos'));
            }
        }

        public function buscar_Permisos($id){
            $retornoPermisos = array();
            $permisos_ = $this->permisos->colocarPermisos($id, 'A');
            if (!empty($permisos_)) {
                array_push($retornoPermisos, $permisos_);
            }
            echo json_encode($retornoPermisos);
        }

    //---------------------------------------ELIMINADOS-------------------------------------------------
    public function Indexeliminados()
        {
            
        $datapermisos= $this->permisos->obtenerPermisos('E');

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'permisos' => $datapermisos];

            echo view('/administradores/principal/headercopy', $data);
            echo view('/administradores/permiso/eliminados', $data);
            echo view('/principal/footer/footer', $data);
        
        }

    public function eliminar($id, $estado){
            $Permisos_ = $this->permisos->elimina_Permisos($id,$estado);
            return redirect()->to(base_url('/permisos'));
        }

}