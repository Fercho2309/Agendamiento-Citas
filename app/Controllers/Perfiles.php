<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\UsuariosModel;
use App\Models\AdministradorModels\TelefonosModel;
use App\Models\AdministradorModels\CorreosModel;
use App\Models\AdministradorModels\DetallesModel;


class Perfiles extends BaseController    
{    

    protected $Perfil;
    protected $telefonos;
    protected $Tdetalles;
    protected $correos;
   


    public function __construct()
    {
        $this->Perfil = new UsuariosModel();
        $this->telefonos = new TelefonosModel();
        $this->correos = new CorreosModel();
        $this->detalle = new DetallesModel();
        

    }

    public function Perfil()
    {
        $session = session();

        $miperfil = new UsuariosModel();
        $detalle = new DetallesModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);
        $Sdetalles = $detalle->obtenerDetallesConexion(1, 'A');
        $Ddetalles = $detalle->obtenerDetallesConexion(2, 'A');
        $Tdetalles = $detalle->obtenerDetallesConexion(4, 'A');
        $Pdetalles = $detalle->obtenerDetallesConexion(5, 'A');
        $telefonos = $this->telefonos->obtenerTelefonoSesion('A'); 
        $correo = $this->correos->obtenerCorreoSesion('A'); 
        // var_dump($miPerfil);

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --','session' => $session, 'DatosPerfil' => $perfil, 'TipoTelefono' => $Tdetalles, 'TipoDocumento' => $Ddetalles, 'Dsexo' => $Sdetalles,'User_session' => $session, 'Prioridad' => $Pdetalles, 'telefono' => $telefonos, 'correo' => $correo]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
       
        echo view('principal/menu/menu', $data);
        echo view('principal/perfil/perfil', $data);
        echo view('/principal/footer/footer', $data);
        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }

    public function actualizar(){

        $session = session();
        $idUsuario = $session->id_usuario;

            $this->Perfil->update(
                $idUsuario,[     

                        'nombre_corto' => $this->request->getPost('Nusuario'),
                        'nombre_p' => $this->request->getPost('Pnombre'),
                        'nombre_s' => $this->request->getPost('Snombre'),
                        'apellido_p' => $this->request->getPost('Papellido'),
                        'apellido_s' => $this->request->getPost('Sapellido'),
                        'sexo' => $this->request->getPost('Detsexo'),
                        'direccion' => $this->request->getPost('Ndireccion'),
                        'rol_nombre' => $this->request->getPost('Ruser'),
                        'numero_de_documento' => $this->request->getPost('numeroDocumento'),
                        'tipo_de_documento' => $this->request->getPost('tpdocumento'),
                        'contrasena' => $this->request->getPost('Passwords'),

                ]);

                // $datosTel = $this->telefonos->telefonoPorNumero( $this->request->getPost('Ntelefono') );
                $datosTel = $this->telefonos->datosTelefonoByIdUsuario( $idUsuario );
                $datosEmail = $this->correos->datosEmailByIdUsuario( $idUsuario );
                 
                $this->telefonos->update($datosTel['id_telefono'], [
                    'numero' => $this->request->getPost('Ntelefono'),
                    'tipo_telefono' => $this->request->getPost('tpTelefono')
                ]);
                
                $this->correos->update($datosEmail['id_correo'], [
                    'correo_electronico' => $this->request->getPost('email') 
                ]); 
 
                return redirect()->to(base_url('/AdminPerfil'));
    }


    public function AgregarTelefono(){
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            
            $session = session();

            $idUsuario = $session->id_usuario;

            // $traertele = new TelefonosModel();
            if ($tp == 1) {
                $this->telefonos-> save([
                    'numero' => $this->request->getPost('NumTelefonoModal'),
                    'tipo_telefono' => $this->request->getPost('modaltipotelefono'),
                    'prioridad' => 15,
                    'id_usuario' => $idUsuario,
                    'usuario_crea'=> $idUsuario,
                ]);

            } else {
                $this->telefonos-> update(
                    $this->request->getPost('id_telefono'),[
                    'numero' => $this->request->getPost('NumTelefonoModal'),
                    'tipo_telefono' => $this->request->getPost('modaltipotelefono'),
                    'prioridad' => $this->request->getPost('modalPrioridadTelefonos'),
                    'id_usuario' => $idUsuario,
                    'usuario_crea'=> $idUsuario,
                ]);
            }
            return redirect()->to(base_url('/AdminPerfil'));
        }
    }

    public function AgregarCorreo(){
        
        $tp=$this->request->getPost('tp_correo');
        if ($this->request->getMethod() == "post") {
            
            $session = session();

            $idUsuario = $session->id_usuario;

            // $traertele = new TelefonosModel();
            if ($tp == 1) {
                $this->correos-> save([
                    'correo_electronico' => $this->request->getPost('CoElectronicoModal'),
                    'prioridad' => 15,
                    'id_usuarios' => $idUsuario,
                    'usuario_crea'=> $idUsuario,
                ]); 
            } else {
                $this->correos->update(
                    $this->request->getPost('id_correo'),[
                        'correo_electronico' => $this->request->getPost('CoElectronicoModal'),
                        // 'prioridad' => 15,
                        'id_usuarios' => $idUsuario,
                        'usuario_crea'=> $idUsuario,
                    ]);
            }
            return redirect()->to(base_url('/AdminPerfil'));
        }
    }

    public function buscar_user(){

        $sesion = session();
        $idUsuario = $sesion->id_usuario;

        $retornoUser = array();
        $user_ = $this->Perfil->traer_usuario( $idUsuario );
        if (!empty($user_)) {
            array_push($retornoUser, $user_);
        }
        echo json_encode($retornoUser);
    }
    
    
    
    public function changePassword()
    {
        $session = session();

        // Obtiene el ID del usuario actualmente autenticado
        $userId = $session->get('id_usuario');

        // Obtiene la contraseña actual y la nueva contraseña del formulario
        $currentPassword = $this->request->getPost('contraseña_actual');
        $newPassword = $this->request->getPost('nueva_contraseña');

        // Crea una instancia del modelo de usuario
        $userModel = new UsuariosModel();

        // Obtiene el usuario de la base de datos
        $users = $userModel->find($userId);
        // var_dump($users);

        // Verifica si la contraseña actual es correcta
        if (password_verify($currentPassword, $users['contrasena'])) {
            // Genera un hash de la nueva contraseña
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Actualiza la contraseña en la base de datos
            $userModel->update($userId, ['contrasena' => $hashedPassword]);

            // Redirige al usuario a la página de éxito
            return redirect()->to('/AdminPerfil');
        } else {
            return redirect()->to(base_url('/AdminPerfil?alert=La Contraseña Actual no Coincide'));
        }
    }

}

