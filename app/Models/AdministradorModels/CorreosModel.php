<?php

namespace App\Models\AdministradorModels; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class CorreosModel extends Model{
    protected $table      = 'correos'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_correo';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['correo_electronico', 'prioridad',  'id_usuarios', 'estado', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerCorreo($estado){
        $this->select('correos.*, usuarios.nombre_corto as NomUsuario, correos.id_correo as correos, usuariocrea.nombre_corto as UsuarioCrea');
        $this->join('usuarios', 'usuarios.id_usuario = correos.id_usuarios');
        $this->join('usuarios as usuariocrea', 'usuariocrea.id_usuario = correos.usuario_crea');
        $this->where('correos.estado', $estado);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }

    public function obtenerCorreoSesion($estado){
        $sesion = session();
        $busqueda = $sesion -> get('id_usuario');
        $this->select('correos.*, usuarios.nombre_corto as NomUsuario, correos.id_correo as correos, usuariocrea.nombre_corto as UsuarioCrea, Dprioridad.nombre as prioridad');
        $this->join('usuarios', 'usuarios.id_usuario = correos.id_usuarios');
        $this->join('detalles as Dprioridad', 'Dprioridad.id_detalles = correos.prioridad');
        $this->join('usuarios as usuariocrea', 'usuariocrea.id_usuario = correos.usuario_crea');
        $this->where('correos.estado', $estado);
        $this->where('usuarios.id_usuario', $busqueda);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }

    public function colocarCorreo($id, $estado){
        $this->select('correos.*, correos.id_usuarios as id_usuario, correos.usuario_crea as usuario_crea');
        $this->join('usuarios', 'correos.id_usuarios =  usuarios.id_usuario');
        $this->join('usuarios as usuariocrea', 'correos.usuario_crea = usuariocrea.id_usuario');
        $this->where('correos.id_correo', $id);
        $this->where('correos.estado', $estado);
        $datos = $this->first();
        return $datos;
    }

    public function datosEmailByIdUsuario($idUsuario){
        $this->select('correos.*');
        $this->where('id_usuarios', $idUsuario);
        $this->where('correos.estado', 'A');
        $datos = $this->first();
        return $datos;
    } 


         // -----------Eliminar y Restaurar el Registro--------------

         public function elimina_Correos($id,$estado){
            $datos = $this->update($id, ['estado' => $estado]);         
            return $datos;
        }

}