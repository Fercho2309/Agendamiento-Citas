<?php

namespace App\Models\AdministradorModels; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class RolesModel extends Model{
    protected $table      = 'roles'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_rol';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre', 'descripcion', 'estado', 'usuario_crea', 'fecha_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    // public function obtenerRol($estado){
    //     $this->select('roles.*, usuarios.nombre_corto as NomUsuario');
    //     $this->join('usuarios', 'usuarios.id_usuario = roles.usuario_crea');
    //     $this->where('roles.estado', $estado);
    //     $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
    //     return $datos;
    // }

    public function colocarRoles($id, $estado){
        $this->select('roles.*, roles.usuario_crea as usuario_crea');
        $this->join('usuarios', 'roles.usuario_crea = usuarios.id_usuario');
        $this->where('roles.id_rol', $id);
        $this->where('roles.estado', $estado);
        $datos = $this->first();
        return $datos;
    } 

    public function elimina_Rol($id,$estado){
        $datos = $this->update($id, ['estado' => $estado]);         
        return $datos;
    }

    public function BuscarNroles($id, $estado){
        $this->select('roles.*, roles.nombre as Nroles');
        $this->where('roles.id_rol', $id);
        $this->where('roles.estado', $estado);
        $datos = $this->first();
        return $datos;
    } 

    public function obtenerRol($estado){
        $this->select('roles.*, usuarios.nombre_corto as NomUsuario');
        $this->join('usuarios', 'usuarios.id_usuario = roles.usuario_crea');
        $this->where('roles.estado', $estado);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }


    

   
}