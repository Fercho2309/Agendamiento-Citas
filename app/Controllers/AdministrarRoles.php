<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\RolesModel;
use App\Models\AdministradorModels\UsuariosModel;
class AdministrarRoles extends BaseController
{
    
    protected $roles;
    protected $usuarios;

    public function __construct()
    {
        $this->roles = new  RolesModel();
        $this->usuarios = new  UsuariosModel();
    }

    public function index()
    {

        $session = session();

        $miperfil = new UsuariosModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);
        
        $dataRoles = $this->roles->obtenerRol('A');
        $dataUsuarios = $this->usuarios->obtenerUsuarios('1','A');

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'roles' => $dataRoles, 'usuarios' => $dataUsuarios,'DatosPerfil' => $perfil, 'User_session' => $session,]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        echo view('principal/menu/menu', $data);
        echo view('administradores/roles/roles', $data);
        echo view('/principal/footer/footer', $data);
    }
    
    //---------------------------------------Agregar y Actualizar Registros-------------------------------------------------
    public function insertar(){
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            $session = session();

            $id_usuario = $session->id_usuario;
            if ($tp == 1) {
                $this->roles->insert([
                    'nombre' => $this->request->getPost('nomRol'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    // 'usuario_crea' => $this->request->getPost('usuarioCrea')
                    'usuario_crea' => $id_usuario
                ]);

            } else {
                $this->roles->update(
                    $this->request->getPost('id_rol'),[       
                        'nombre' => $this->request->getPost('nomRol'),
                        'descripcion' => $this->request->getPost('descripcion'),
                        // 'usuario_crea' => $this->request->getPost('usuarioCrea')
                        'usuario_crea' => $id_usuario

                ]);

            }
            return redirect()->to(base_url('/roles'));
        }
    }

    public function buscar_Roles($id){
        $retornoRoles = array();
        $roles_ = $this->roles->colocarRoles($id, 'A');
        if (!empty($roles_)) {
            array_push($retornoRoles, $roles_);
        }
        echo json_encode($retornoRoles);
    }

    //---------------------------------------ELIMINADOS-------------------------------------------------
    public function Indexeliminados()
    {

        $session = session();

        $miperfil = new UsuariosModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);
        
        $roles = $this->roles->obtenerRol('E');
        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'roles' => $roles, 'DatosPerfil' => $perfil, 'User_session' => $session,];
        
        echo view('/principal/menu/menu', $data);
        echo view('/administradores/roles/eliminados', $data);
        echo view('/principal/footer/footer', $data);
        
    }
    
    public function eliminar($id, $estado){
            $rol_ = $this->roles->elimina_Rol($id,$estado);
            return redirect()->to(base_url('/roles'));
        }
}
