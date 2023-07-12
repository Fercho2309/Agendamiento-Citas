<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\UsuariosModel;


class LoginSignin extends BaseController  
{    
    protected $usuarios;

    public function __construct()
    {

        $this->usuarios = new UsuariosModel();
    }

        public function index() 
        {            
            
            // $usuarios = $this->usuarios->obtenerUsuariosTodo('A');
            $session = session();

            $data = ['titulo' => 'Nombre de la APP','nombre'=>'-- Nombre del Colegio --', 'User_session' => $session]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header/interfazHeader', $data);
            echo view('/login/signin/signin');
            // echo view('/principal/footer/footer');
            // echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }

        
        public function auth()
    {
        $user = $this->request->getPost('usuario');
        $pass = $this->request->getPost('contraseña');

        $usuariosModel = new UsuariosModel();

        $usuario = $usuariosModel-> Auth_usuario($user);


        // var_dump($usuario);

        if (isset($usuario)) {

            if ($usuario && password_verify ( $pass ,$usuario['contrasena'])) { 
        
                $session = session();
                
                    // $datos = $this->usuarios->traer_info_usuario_rol( $usuario );

                    $session->set([

                        'id_usuario' => $usuario['id_usuario'],
                        'nombre_corto' => $usuario['nombre_corto'],
                        'id_rol' => $usuario['id_rol'],
                        'logged_in' => true

                    ]);

                    if ($session->get('logged_in') === true) {
                        return redirect()->to('/AdminInicio');
                    }
                }else{
                    return redirect()->to(base_url('signin?alert=La contraseña es Incorrecta'));
                }
                }else{
                return redirect()->to(base_url('signin?alert=Este usuario no existe, incorrecto'));
                }
            }

                public function logout() {

                        $session = session();
                        $session -> destroy();

                        return redirect()->to('/signin');
                    }

}