<?php

namespace App\Models\AdministradorModels; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class PermisosModel extends Model{
    protected $table      = 'permisos'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_permisos';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_acciones', 'id_rol','estado', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerPermisos($estado){
        $this->select('permisos.*, usuarios.nombre_corto as NomUsuario, acciones.nombre as NomAcciones, roles.nombre as NomRoles');
        $this->join('usuarios', 'usuarios.id_usuario = permisos.usuario_crea');
        $this->join('acciones', 'acciones.id_acciones = permisos.id_acciones');
        $this->join('roles', 'roles.id_rol = permisos.id_rol');
        $this->where('permisos.estado', $estado);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }

    public function colocarPermisos($id, $estado){
        $this->select('permisos.*, permisos.id_acciones as id_acciones, permisos.id_rol as id_rol, permisos.usuario_crea as usuario_crea');
        $this->join('acciones', 'permisos.id_acciones = acciones.id_acciones');
        $this->join('roles', 'permisos.id_rol = roles.id_rol');
        $this->join('usuarios', 'permisos.usuario_crea = usuarios.id_usuario');
        $this->where('permisos.id_permisos', $id);
        $this->where('permisos.estado', $estado);
        $datos = $this->first();
        return $datos;
    } 

      // -----------Eliminar y Restaurar el Registro--------------

      public function elimina_Permisos($id,$estado){
        $datos = $this->update($id, ['estado' => $estado]);         
        return $datos;
    }

   
}