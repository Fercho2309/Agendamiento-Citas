<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\AdministradorModels\TelefonosModel;
use App\Models\AdministradorModels\DetallesModel;
use App\Models\AdministradorModels\UsuariosModel;

class AdministrarTelefonos extends BaseController
{
    protected $detalles;
    protected $prioridad;
    protected $usuarios;
    protected $telefonos;
    protected $tipoTel;

    public function __construct()
    {
        $this->telefonos = new TelefonosModel();
        $this->prioridad = new DetallesModel();
        $this->tipoTel = new DetallesModel();
        $this->detalles = new DetallesModel();
        $this->usuarios = new UsuariosModel();

    }

    public function index()
    {
        
        $telefonos = $this->telefonos->obtenerTelefono('A'); 
        $prioridad = $this->detalles->obtenerDetallesConexion("5", "A");
        $tipoTel = $this->detalles->obtenerDetallesConexion("4", "A");
        $usuarios = $this->usuarios->obtenerUsuariosTodo('A'); 
        $datausuarios = $this->usuarios->obtenerUsuarios('1','A'); 


        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'telefono' => $telefonos, 'prioridad' => $prioridad, 'usuarios' => $usuarios, 'tipoTel' => $tipoTel, 'creausuarios' => $datausuarios]; 

        echo view('/administradores/principal/headercopy', $data);
        echo view('/administradores/telefonos/telefonos', $data);
        echo view('/principal/footer/footer', $data);
    }


      //---------------------------------------Agregar y Actualizar telefonos-------------------------------------------------

    public function insertar(){
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->telefonos->insert([
                    'tipo_telefono' => $this->request->getPost('tpTelefono'),
                    'numero' => $this->request->getPost('telefono'),
                    'prioridad' => $this->request->getPost('prioridad'),
                    'id_usuario' => $this->request->getPost('Dusuario'),
                    'usuario_crea' => $this->request->getPost('nomUsuario')
                ]);

            } else {
                $this->telefonos->update(
                    $this->request->getPost('id_telefono'),[       
                        'tipo_telefono' => $this->request->getPost('tpTelefono'),
                        'numero' => $this->request->getPost('telefono'),
                        'prioridad' => $this->request->getPost('prioridad'),
                        'id_usuario' => $this->request->getPost('Dusuario'),
                        'usuario_crea' => $this->request->getPost('nomUsuario')
                ]);

            }
            return redirect()->to(base_url('/telefonos'));
        }
    }

    public function buscar_Telefonos($id){
        $retornoTelefonos = array();
        $tel_ = $this->telefonos->colocarTelefonos($id, 'A');
        if (!empty($tel_)) {
            array_push($retornoTelefonos, $tel_);
        }
        echo json_encode($retornoTelefonos);
    }

    //---------------------------------------ELIMINADOS-------------------------------------------------
    public function Indexeliminados()
    {
        $telefonos = $this->telefonos->obtenerTelefono('E');
        $data = ['titulo' => 'Nombre de la APP', 'nombre' => '-- Nombre del Colegio --', 'telefonos' => $telefonos];
        
        echo view('/administradores/principal/headercopy', $data);
        echo view('/administradores/telefonos/eliminados', $data);
        echo view('/principal/footer/footer', $data);
        
    }
    
    public function eliminar($id, $estado){
            $Tel = $this->telefonos->elimina_Telefonos($id,$estado);
            return redirect()->to(base_url('/telefonos'));
        }
}

