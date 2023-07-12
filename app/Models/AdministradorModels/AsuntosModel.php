<?php

namespace App\Models\AdministradorModels; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class AsuntosModel extends Model{
    protected $table      = 'asunto'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_asunto';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['asunto', 'usuario_crea', 'estado']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerAsuntos($estado){
        $this->select('asunto.*, usuarios.nombre_corto as NomUsuario');
        $this->join('usuarios', 'usuarios.id_usuario = asunto.usuario_crea');
        $this->where('asunto.estado', $estado);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }

    public function colocarAsuntos($id, $estado){
        $this->select('asunto.*, asunto.usuario_crea as usuario_crea');
        $this->join('usuarios', 'asunto.usuario_crea = usuarios.id_usuario');
        $this->where('asunto.id_asunto', $id);
        $this->where('asunto.estado', $estado);
        $datos = $this->first();
        return $datos;
    } 

    // -----------Eliminar y Restaurar el Registro--------------

    public function elimina_Asunto($id,$estado){
        $datos = $this->update($id, ['estado' => $estado]);         
        return $datos;
    }


   
}