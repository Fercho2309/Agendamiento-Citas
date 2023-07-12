<?php

namespace App\Models\AdministradorModels; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class TelefonosModel extends Model{
    protected $table      = 'telefonos'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_telefono';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['tipo_telefono', 'numero', 'prioridad', 'id_usuario', 'estado', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerTelefono($estado){
        $this->select('telefonos.*, usuarios.nombre_corto as NomUsuario, usuariocrea.nombre_corto as UsuarioCrea, detalles.nombre as numTelefono');
        $this->join('detalles', 'detalles.id_detalles = telefonos.tipo_telefono');
        $this->join('usuarios', 'usuarios.id_usuario = telefonos.id_usuario');
        $this->join('usuarios as usuariocrea', 'usuariocrea.id_usuario = telefonos.usuario_crea');
        $this->where('telefonos.estado', $estado);
        // $this->where('telefonos.id_telefono', $busqueda);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }

    public function obtenerTelefonoSesion($estado){
        $sesion = session();
        $busqueda = $sesion -> get('id_usuario'); 
        $this->select('telefonos.*, usuarios.nombre_corto as NomUsuario, usuariocrea.nombre_corto as UsuarioCrea, detalles.nombre as numTelefono, Dprioridad.nombre as prioridad');
        $this->join('detalles', 'detalles.id_detalles = telefonos.tipo_telefono');
        $this->join('detalles as Dprioridad', 'Dprioridad.id_detalles = telefonos.prioridad');
        $this->join('usuarios', 'usuarios.id_usuario = telefonos.id_usuario');
        $this->join('usuarios as usuariocrea', 'usuariocrea.id_usuario = telefonos.usuario_crea');
        $this->where('telefonos.estado', $estado);
        // $this->where('telefonos.id_telefono', $busqueda);
        $this->where('usuarios.id_usuario', $busqueda);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }

    public function colocarTelefonos($id, $estado){
        $this->select('telefonos.*, telefonos.id_usuario as id_usuario, telefonos.usuario_crea as usuario_crea, telefonos.tipo_telefono as tipo_telefono');
        $this->join('detalles', 'detalles.id_detalles = telefonos.tipo_telefono');
        $this->join('usuarios', 'usuarios.id_usuario = telefonos.id_usuario');
        $this->join('usuarios as usuariocrea', 'usuariocrea.id_usuario = telefonos.usuario_crea');
        $this->where('telefonos.id_telefono', $id);
        $this->where('telefonos.estado', $estado);
        $datos = $this->first();
        return $datos;
    } 

    public function datosTelefonoByIdUsuario($idUsuario){
        $this->select('telefonos.*');
        $this->where('id_usuario', $idUsuario);
        $this->where('telefonos.estado', 'A');
        $datos = $this->first();
        return $datos;
    } 


     // -----------Eliminar y Restaurar el Registro--------------

     public function elimina_Telefonos($id,$estado){
        $datos = $this->update($id, ['estado' => $estado]);         
        return $datos;
    }

}