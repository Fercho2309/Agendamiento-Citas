<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\CorreosModel;
use App\Models\AdministradorModels\UsuariosModel;
use App\Models\AdministradorModels\DetallesModel;
use App\Models\AdministradorModels\EncabezadoModel;

class AdministrarCorreos extends BaseController
{
    
    protected $correos;
    protected $usuarios;
    protected $prioridad;

    public function __construct()
    {
        $this->correos = new CorreosModel();
        $this->usuarios = new UsuariosModel();
        $this->prioridad = new DetallesModel();
        $this->encabezado = new  EncabezadoModel();
    }

    public function index()
    {
        
        $correo = $this->correos->obtenerCorreo('A'); 
        $usuarios = $this->usuarios->obtenerUsuariosTodo('A'); 
        $prioridad = $this->prioridad->obtenerDetallesConexion('5','A'); 
        $datausuarios = $this->usuarios->obtenerUsuarios('1','A'); 
        

        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'correo' => $correo, 'usuarios' => $usuarios, 'prioridad' => $prioridad, 'creausuarios' => $datausuarios]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        // echo view('estudiantes/principal/header', $data);
        echo view('/administradores/principal/headercopy', $data);
        echo view('/administradores/correos/correos', $data);
        echo view('/principal/footer/footer', $data);
        //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }

    public function insertar(){
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->correos->insert([
                    'correo_electronico' => $this->request->getPost('correoElec'),
                    'prioridad' => $this->request->getPost('prioridad'),
                    'id_usuarios' => $this->request->getPost('Dusuario'),
                    'usuario_crea' => $this->request->getPost('nomUsuario')
                ]);

            } else {
                $this->correos->update(
                    $this->request->getPost('id_correos'),[       
                        'correo_electronico' => $this->request->getPost('correoElec'),
                        'prioridad' => $this->request->getPost('prioridad'),
                        'id_usuarios' => $this->request->getPost('Dusuario'),
                        'usuario_crea' => $this->request->getPost('nomUsuario')
                ]);

            }
            return redirect()->to(base_url('/correos'));
        }
    }

    public function buscar_Correo($id){
        $retornoCorreo = array();
        $corr_ = $this->correos->colocarCorreo($id,'A');
        if (!empty($corr_)) {
            array_push($retornoCorreo, $corr_);
        }
        echo json_encode($retornoCorreo);
    }



    //---------------------------------------ELIMINADOS-------------------------------------------------
    public function Indexeliminados()
    {
        $correos = $this->correos->obtenerCorreo('E');
        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'correos' => $correos];
        
        echo view('/administradores/principal/headercopy', $data);
        echo view('/administradores/correos/eliminados', $data);
        echo view('/principal/footer/footer', $data);
        
    }
    
    public function eliminar($id, $estado){
            $Cor= $this->correos->elimina_Correos($id,$estado);
            return redirect()->to(base_url('/correos'));
        }
}