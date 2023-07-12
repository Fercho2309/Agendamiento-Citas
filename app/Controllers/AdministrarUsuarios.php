<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\UsuariosModel;
// use App\Models\AdministradorModels\EncabezadoModel;
use App\Models\AdministradorModels\DetallesModel;
use App\Models\AdministradorModels\RolesModel;
use App\Models\AdministradorModels\TelefonosModel;
use App\Models\AdministradorModels\CorreosModel;


class AdministrarUsuarios extends BaseController
{
    
    protected $usuarios;
    protected $detalles;
    protected $roles;
    protected $email;
    protected $telefono;
    
    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->detalles = new DetallesModel();
        $this->roles = new RolesModel();
        $this->telefono = new TelefonosModel();
        $this->email = new CorreosModel();
    }
    
    public function index()
    {

        $session = session();

        $miperfil = new UsuariosModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);
        
        $usuarios = $this->usuarios->obtenerUsuariosTodo('A');
        $dataDetallesSEX = $this->detalles->obtenerDetallesConexion('1','A');
        $dataDetallesTP = $this->detalles->obtenerDetallesConexion('2','A');
        $dataDetallescargo = $this->detalles->obtenerDetallesConexion('3', 'A');
        $roles = $this->roles->obtenerRol('A');


        $email = $this->email->where('estado', "A")->findAll();
        $telefono = $this->telefono->where('estado', "A")->findAll();


        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'usuarios' => $usuarios, 'detallesex' => $dataDetallesSEX, 'detalletp' => $dataDetallesTP, 'detallecargo' => $dataDetallescargo, 'roles' => $roles, 'DatosPerfil' => $perfil, 'User_session' => $session,'email'=>$email,
        'telefono'=>$telefono, ]; 
        echo view('principal/menu/menu', $data);
        echo view('administradores/usuarios/usuario.php', $data);
        echo view('/principal/footer/footer', $data);
    }

    //---------------------------------------Agregar y Actualizar Registros-------------------------------------------------
    public function insertar(){

        $password = $this->request->getPost('contraseña');

        $password_cript = password_hash($password, PASSWORD_DEFAULT);

        $tp=$this->request->getPost('tp');

        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->usuarios->save([
                    'id_rol' => $this->request->getPost('rol'),
                    'nombre_p' => $this->request->getPost('primerNombre'),
                    'nombre_s' => $this->request->getPost('segundoNombre'),
                    'apellido_p' => $this->request->getPost('primerApellido'),
                    'apellido_s' => $this->request->getPost('segundoApellido'),
                    'nombre_corto' => $this->request->getPost('nombreUsuario'),
                    'direccion' => $this->request->getPost('direccion'),
                    'sexo' => $this->request->getPost('sexo'),
                    'tipo_de_documento' => $this->request->getPost('tipoDocumento'),
                    'numero_de_documento' => $this->request->getPost('numeroDocumento'),
                    'contrasena' => $password_cript
                ]);

                $id_usuario = $this -> usuarios -> insertID();
                $this -> usuarios -> save([
                    'id_usuario' => $id_usuario,
                    'usuario_crea' => $id_usuario
                ]);

                $this -> email -> save([
                    'id_usuarios' => $id_usuario,
                    'usuario_crea'=> $id_usuario,
                    'prioridad' => 14,
                    'correo_electronico' => $this -> request ->getPost('email'),
                ]);

                $this -> telefono -> save([
                    'id_usuario' => $id_usuario,
                    'usuario_crea'=> $id_usuario,
                    'prioridad' => 14,
                    'tipo_telefono' =>13,
                    'numero' => $this -> request ->getPost('telefono'),
                ]);     

            } else {
                    $id_usu = $this->request->getPost('id_usuario');
        
                    $this->usuarios->update($id_usu, [
                        'nombre_p' => $this->request->getPost('primerNombre'),
                        'nombre_s' => $this->request->getPost('segundoNombre'),
                        'apellido_p' => $this->request->getPost('primerApellido'),
                        'apellido_s' => $this->request->getPost('segundoApellido'),
                        'nombre_corto' => $this->request->getPost('nombreUsuario'),
                        'direccion' => $this->request->getPost('direccion'),
                        'sexo' => $this->request->getPost('sexo'),
                        'tipo_de_documento' => $this->request->getPost('tipoDocumento'),
                        'numero_de_documento' => $this->request->getPost('numeroDocumento'),
                        'contrasena' => $this->request->getPost('contraseña'),
                    ]);
        
                    $emailExistente = $this->email->where('id_usuarios', $id_usu)->first();
                    if ($emailExistente) {
                        $this->email->update($emailExistente['id_correo'], [
                            'correo_electronico' => $this->request->getPost('email'),
                        ]);
                    }
                    
                    $telefonoExistente = $this->telefono->where('id_usuario', $id_usu)->first();
                    if ($telefonoExistente) {
                        $this->telefono->update($telefonoExistente['id_telefono'], [
                        'numero' => $this->request->getPost('telefono'),
                        ]);
                    }
            }
            return redirect()->to(base_url('/usuarios'));
        }
    }

    public function buscar_Usuarios($id){
        $retornoUsuarios = array();
        $usuario_ = $this->usuarios->colocarUsuarios($id, 'A');
        if (!empty($usuario_)) {
            array_push($retornoUsuarios, $usuario_);
        }
        echo json_encode($retornoUsuarios);
    }

    //---------------------------------------ELIMINADOS-------------------------------------------------
    public function eliminados()
        {

            $session = session();

            $miperfil = new UsuariosModel();
    
            $perfil = $miperfil->traer_usuario($session->id_usuario);
            
            $usuarios = $this->usuarios->obtenerUsuariosTodo('E');

            $email = $this->email->where('estado', "A")->findAll();
            $telefono = $this->telefono->where('estado', "A")->findAll();

            

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'usuarios' => $usuarios, 'DatosPerfil' => $perfil, 'email'=>$email,
        'telefono'=>$telefono, 'DatosPerfil' => $perfil, 'User_session' => $session,];

            echo view('/principal/menu/menu', $data);
            echo view('/administradores/usuarios/eliminados', $data);
            echo view('/principal/footer/footer', $data);
        
        }
    
    public function eliminar($id, $estado){
            $Usuarios_ = $this->usuarios->elimina_Usuarios($id,$estado);
            return redirect()->to(base_url('/usuarios'));
        }

}