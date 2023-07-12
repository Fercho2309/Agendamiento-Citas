<?php

namespace App\Models\AdministradorModels; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class EncabezadoModel extends Model{
    protected $table      = 'encabezado'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_encabezado';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre', 'estado', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerEncabezado($estado){
        $this->select('encabezado.*, usuarios.nombre_corto as NomUsuario');
        $this->join('usuarios', 'usuarios.id_usuario = encabezado.usuario_crea');
        $this->where('encabezado.estado', $estado);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }
    
    public function colocarEncabezado($id, $estado){
        $this->select('encabezado.*, encabezado.usuario_crea as usuario_crea');
        $this->join('usuarios', 'encabezado.usuario_crea = usuarios.id_usuario');
        $this->where('encabezado.id_encabezado', $id);
        $this->where('encabezado.estado', $estado);
        $datos = $this->first();
        return $datos;
    } 

     // -----------Eliminar y Restaurar el Registro--------------

    public function elimina_Encabezado($id,$estado){
        $datos = $this->update($id, ['estado' => $estado]);         
        return $datos;
    }

   
}