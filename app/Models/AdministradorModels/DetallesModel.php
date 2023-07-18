<?php

namespace App\Models\AdministradorModels; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class DetallesModel extends Model{
    protected $table      = 'detalles'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_detalles';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre', 'resumen','estado', 'usuario_crea','id_encabezado']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerDetalles($estado){
        $this->select('detalles.*, usuarios.nombre_corto as NomUsuario, encabezado.nombre as NomEncabezado');
        $this->join('usuarios', 'usuarios.id_usuario = detalles.usuario_crea');
        $this->join('encabezado', 'encabezado.id_encabezado = detalles.id_encabezado');
        $this->where('detalles.estado', $estado);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }

    public function obtenerDetallesConexion($id_encabezado, $estado){
        $this->select('detalles.*, usuarios.nombre_corto as NomUsuario, encabezado.nombre as NomEncabezado');
        $this->join('usuarios', 'usuarios.id_usuario = detalles.usuario_crea');
        $this->join('encabezado', 'encabezado.id_encabezado = detalles.id_encabezado');
        $this->where('detalles.id_encabezado', $id_encabezado);
        $this->where('detalles.estado', $estado);
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }

    public function colocarDetalles($id, $estado){
        $this->select('detalles.*, detalles.usuario_crea as usuario_crea');
        $this->join('usuarios', 'detalles.usuario_crea = usuarios.id_usuario');
        $this->where('detalles.id_detalles', $id);
        $this->where('detalles.estado', $estado);
        $datos = $this->first();
        return $datos;
    } 

     // -----------Eliminar y Restaurar el Registro--------------

     public function elimina_Detalles($id,$estado){
        $datos = $this->update($id, ['estado' => $estado]);         
        return $datos;
    }
   
    
}