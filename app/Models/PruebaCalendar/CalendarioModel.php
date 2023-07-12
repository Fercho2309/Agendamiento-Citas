<?php

namespace App\Models\PruebaCalendar; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class CalendarioModel extends Model{
    protected $table      = 'pruebaeventos'; /* nombre de la tabla modelada*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['title','aulas','start','end','color','usuario_crea','estado']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = 'id'; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

//     public function getEvents($start, $end){
//         return $this->where('start >=', $start)
//                 ->where('end <=', $end)
//                 ->findAll();
//         }   

    public function traer_todos_los_eventos_por_usuario(){

        $session = session();
        $id_usuario = $session->get('id_usuario');

        $this->select('pruebaeventos.*');
        $this->where('usuario_crea', $id_usuario);
        // $this->where('estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }

    public function TomarIDEventos($estado){
        $this->select('pruebaeventos.*');
        $this->where('estado', $estado);
        $datos = $this->findAll();
        return $datos;
    }


    // public function buscar_calendario(){
    //     $this->select('pruebaeventos.*');
    //     $this->where('id', id);
    //     $this->where('estado', 'A');
    //     $datos = $this->first();
    //     return $datos;
    // }

    function eventosByIdUsuario($id){
        $this->select('pruebaeventos.*');
        $this->where('usuario_crea', $id);
        $datos = $this->findAll();
        return $datos;
    }


}

