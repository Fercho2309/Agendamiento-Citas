<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\AsuntosModel;
use App\Models\AdministradorModels\UsuariosModel;

class AdministrarAsuntos extends BaseController
{
    
    protected $asunto;
    protected $usuarios;

    public function __construct()
    {
        $this->asunto = new  AsuntosModel();
        $this->usuarios = new  UsuariosModel();
    }
    public function index()
    {

        $session = session();

        $miperfil = new UsuariosModel();

        $perfil = $miperfil->traer_usuario($session->id_usuario);
        
        $dataasuntos = $this->asunto->obtenerAsuntos('A');
        $dataUsuarios = $this->usuarios->obtenerUsuarios('1','A');

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'asuntos' => $dataasuntos, 'usuarios' => $dataUsuarios, 'User_session' => $session, 'DatosPerfil' => $perfil]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
       
        echo view('principal/menu/menu', $data);
        echo view('administradores/asuntos/asuntos', $data);
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
                    // $id_usuario = $this -> usuarios -> insertID();
                    $this->asunto->insert([
                        'asunto' => $this->request->getPost('nomAsunto'),
                        // 'usuario_crea' => $this->request->getPost('usuarioCrea')
                        'usuario_crea' => $id_usuario
                    ]);
    
                } else {
                    $this->asunto->update(
                        $this->request->getPost('id_asunto'),[       
                            'asunto' => $this->request->getPost('nomAsunto'),
                            // 'usuario_crea' => $this->request->getPost('usuarioCrea')
                            'usuario_crea' => $id_usuario
                    ]);
                }
                return redirect()->to(base_url('/asuntos'));
            }
        }

        public function buscar_Asuntos($id){
            $retornoAsuntos = array();
            $asun_ = $this->asunto->colocarAsuntos($id, 'A');
            if (!empty($asun_)) {
                array_push($retornoAsuntos, $asun_);
            }
            echo json_encode($retornoAsuntos);
        }

    
    //---------------------------------------ELIMINADOS-------------------------------------------------

    public function Indexeliminados()
        {
            
            $session = session();

            $miperfil = new UsuariosModel();
    
            $perfil = $miperfil->traer_usuario($session->id_usuario);

            $dataasuntos = $this->asunto->obtenerAsuntos('E');

            $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'asuntos' => $dataasuntos, 'User_session' => $session, 'DatosPerfil' => $perfil];

            echo view('principal/menu/menu', $data);
            echo view('/administradores/asuntos/eliminados', $data);
            echo view('/principal/footer/footer', $data);
        
        }

    public function eliminar($id, $estado){
        $Asunto_ = $this->asunto->elimina_Asunto($id,$estado);
        return redirect()->to(base_url('/asuntos'));
    }
}
