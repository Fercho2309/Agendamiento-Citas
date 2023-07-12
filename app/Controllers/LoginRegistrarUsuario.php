<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\DetallesModel;
use App\Models\AdministradorModels\UsuariosModel;
use App\Models\AdministradorModels\RolesModel;
use App\Models\AdministradorModels\TelefonosModel;
use App\Models\AdministradorModels\CorreosModel;

class LoginRegistrarUsuario extends BaseController
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


        $usuarios = $this->usuarios->obtenerUsuariosTodo('A');
        $dataDetallesSEX = $this->detalles->obtenerDetallesConexion('1','A');
        $dataDetallesTP = $this->detalles->obtenerDetallesConexion('2','A');
        $roles = $this->roles->obtenerRol('A'); 
        
        $email = $this->email->where('estado', "A")->findAll();
        $telefono = $this->telefono->where('estado', "A")->findAll();

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 
        'usuarios' => $usuarios, 
        'detallesex' => $dataDetallesSEX, 
        'tpdocument' => $dataDetallesTP,  
        'roles' => $roles,
        'email'=>$email,
        'telefono'=>$telefono,
        'session' => $session]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        echo view('/principal/header/interfazHeader', $data);
        echo view('/login/registrarUsuario/registrarUsuario', $data);
        // echo view('/principal/footer/footer', $data);
        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }


    public function registrar(){

        $password = $this->request->getPost('contraseña');

        $password_cript = password_hash($password, PASSWORD_DEFAULT);

        if ($this->request->getMethod() == "post") {

            $this -> usuarios -> save([

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
            
                            $id_usuario = $this -> usuarios ->insertID(); 
                            $this -> usuarios -> save([
                                'id_usuario' => $id_usuario,
                                'usuario_crea'=> $id_usuario,
                                
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
            }

        return redirect()->to(base_url('/signin'));
    }

  
}

