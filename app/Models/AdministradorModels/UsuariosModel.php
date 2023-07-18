<?php

namespace App\Models\AdministradorModels; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class UsuariosModel extends Model{
    protected $table      = 'usuarios'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = [
        'nombre_corto',
        'nombre_p',
        'nombre_s',
        'apellido_p',
        'apellido_s',
        'contrasena',
        'sexo',
        'tipo_de_documento',
        'numero_de_documento',
        'direccion',
        'estado',
        'usuario_crea',
        'id_rol'

    ]; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerUsuariosTodo($estado){
        $this->select('usuarios.*, detalleSexo.nombre as nomSexo, detalleTipoDoc.nombre as nomTipoDoc, roles.nombre as nRol');
        $this->join('detalles as detalleSexo','detalleSexo.id_detalles = usuarios.sexo');
        $this->join('detalles as detalleTipoDoc','detalleTipoDoc.id_detalles = usuarios.tipo_de_documento');
        $this->join('roles','roles.id_rol = usuarios.id_rol');
        $this->where('usuarios.estado', $estado);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }

    public function obtenerUsuarios($id_rol, $estado){
        $this->select('usuarios.*, detalleSexo.nombre as nomSexo, detalleTipoDoc.nombre as nomTipoDoc, roles.nombre as nomCargo');
        $this->join('detalles as detalleSexo','detalleSexo.id_detalles = usuarios.sexo');
        $this->join('detalles as detalleTipoDoc','detalleTipoDoc.id_detalles = usuarios.tipo_de_documento');
        $this->join('roles','roles.id_rol = usuarios.id_rol');
        $this->where('usuarios.id_rol', $id_rol);
        $this->where('usuarios.estado', $estado);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }


    public function traer_usuario($id){
        $this->select('usuarios.*, roles.nombre as rol_nombre, dt_sexo.nombre as sexo_nombre, dt_documento.nombre as tp_nombre, telefonos.tipo_telefono as id_detalle, telefonos.numero as telefono_usuario, correos.correo_electronico as correo_usuario, dt_telefo.nombre as tipo_telefono, usuarios.tipo_de_documento as id_documento');
        $this->join('roles', 'roles.id_rol = usuarios.id_rol');
        $this->join('telefonos', 'telefonos.id_usuario = usuarios.id_usuario');
        $this->join('detalles as dt_telefo', 'dt_telefo.id_detalles = telefonos.tipo_telefono');
        $this->join('correos', 'correos.id_usuarios = usuarios.id_usuario');
        $this->join('detalles as dt_documento', 'dt_documento.id_detalles = usuarios.tipo_de_documento');
        $this->join('detalles as dt_sexo', 'dt_sexo.id_detalles = usuarios.sexo');
        $this->where('usuarios.estado', 'A');
        $this->where('usuarios.id_usuario', $id);
        $datos = $this->first();
        // var_dump($datos);
        return $datos;
    }

    //-------------------------------------------------------------

    public function colocarUsuarios($id, $estado){
        $this->select('usuarios.*, usuarios.usuario_crea as usuario_crea, detalleSexo.id_detalles as detalleSexo, detalleTipoDoc.id_detalles as detalleTipoDoc, correos.correo_electronico as correo, telefonos.numero as numero, correos.id_correo as id_correo');
        $this->join('detalles as detalleSexo','detalleSexo.id_detalles = usuarios.sexo');
        $this->join('telefonos','telefonos.id_usuario = usuarios.id_usuario');
        $this->join('correos','correos.id_usuarios = usuarios.id_usuario');
        $this->join('detalles as detalleTipoDoc','detalleTipoDoc.id_detalles = usuarios.tipo_de_documento');
        $this->where('usuarios.id_usuario', $id);
        $this->where('usuarios.estado', $estado);
        $datos = $this->first();
        return $datos;
    } 

    // -----------Eliminar y Restaurar el Registro--------------
    public function elimina_Usuarios($id,$estado){
            $datos = $this->update($id, ['estado' => $estado]);         
            return $datos;
        }

    public function Auth_usuario($usuario)
      {
        $this->select('usuarios.*');
        $this->where('nombre_corto', $usuario);
        $datos = $this->first();
          return $datos;
      }

      public function traer_info_usuario_rol( $id )
        {
            $this->select('usuarios.*, roles.nombre as rol_nombre');
            $this->join('roles', 'roles.id_rol = usuarios.id_rol');
            $this->where('usuarios.estado','A');
            $this->where('usuarios.id_usuario',$id);
            $datos = $this->first();  
            return $datos;
        }

        public function obtenerRolreceptor($id_rol, $estado){
            $this->select('usuarios.*, usuarios.nombre_p as NomRol , usuarios.nombre_s as NomRol2, usuarios.apellido_p as NomRol3, usuarios.apellido_s as NomRol4 ');
            $this->join('roles', 'roles.id_rol = usuarios.id_rol');
            $this->where('usuarios.id_rol', $id_rol);
            $this->where('usuarios.estado', $estado);
            $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
            return $datos;

        
}
}

// usuarios.nombre_p as NomRol2, usuarios.nombre_s as NomRol3