<?php

namespace App\Models\EstudiantesModels; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class SolicitarCitaModel extends Model{
    protected $table      = 'citas'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_cita';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['title','aula','disponibilidad','id_asunto','hora_de_inicio','hora_de_finalizacion','juicio','usuario_Dueño','estado','usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = 'id_cita'; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function AllCitas($estado){
        $this->select('citas.*, asunto.asunto as asuntos, CONCAT(usuarios.nombre_p, " ", usuarios.nombre_s, " ", usuarios.apellido_p, " ", usuarios.apellido_s) as usuarios, CONCAT((SELECT CONCAT(nombre_p, " ", nombre_s, " ", apellido_p, " ", apellido_s) FROM usuarios WHERE id_usuario = pruebaeventos.usuario_crea)) as Dueño');
        $this->join('asunto','asunto.id_asunto = citas.id_asunto');
        $this->join('usuarios','usuarios.id_usuario = citas.usuario_crea');
        $this->join('pruebaeventos','pruebaeventos.id = citas.disponibilidad');
        // $this->where('citas.estado', );
        $datos = $this->findAll();
        return $datos;
    }


    public function CitasPorIdUsuarioAgenda($estado) {
        //Id usuario que esta logeado actualmente.
        $session = session();
        $id_usuario = $session->get('id_usuario');

        $this->select('citas.*, asunto.asunto as asuntos, CONCAT(usuarios.nombre_p, " ", usuarios.nombre_s, " ", usuarios.apellido_p, " ", usuarios.apellido_s) as usuarios, CONCAT((SELECT CONCAT(nombre_p, " ", nombre_s, " ", apellido_p, " ", apellido_s) FROM usuarios WHERE id_usuario = pruebaeventos.usuario_crea)) as Dueño');
        $this->join('asunto','asunto.id_asunto = citas.id_asunto');
        $this->join('usuarios','usuarios.id_usuario = citas.usuario_crea');
        $this->join('pruebaeventos','pruebaeventos.id = citas.disponibilidad');
        $this->where('citas.usuario_crea', $id_usuario);
        $this->where('citas.estado', $estado);
        $this->orderBy('citas.fecha_crea','desc');
        $datos = $this->findAll();
        return $datos;
    }
    
    public function CitasAgendadasDocente() {
        //Id usuario que esta logeado actualmente.
        $session = session();
        $id_usuario = $session->get('id_usuario');
    
        $this->select('citas.*, asunto.asunto as asuntos, CONCAT(usuarios.nombre_p, " ", usuarios.nombre_s, " ", usuarios.apellido_p, " ", usuarios.apellido_s) as usuarios, CONCAT((SELECT CONCAT(nombre_p, " ", nombre_s, " ", apellido_p, " ", apellido_s) FROM usuarios WHERE id_usuario = pruebaeventos.usuario_crea)) as Dueño');
        $this->join('asunto','asunto.id_asunto = citas.id_asunto');
        $this->join('usuarios','usuarios.id_usuario = citas.usuario_crea');
        $this->join('pruebaeventos','pruebaeventos.id = citas.disponibilidad');
        $this->where('pruebaeventos.usuario_crea', $id_usuario);
        $this->orderBy('pruebaeventos.fecha_crea','desc');
        $datos = $this->findAll();
        return $datos;
    }

    public function CitasSuperAdministrador($estado) {
        $this->select('citas.*, asunto.asunto as asuntos, CONCAT(usuarios.nombre_p, " ", usuarios.nombre_s, " ", usuarios.apellido_p, " ", usuarios.apellido_s) as usuarios, CONCAT((SELECT CONCAT(nombre_p, " ", nombre_s, " ", apellido_p, " ", apellido_s) FROM usuarios WHERE id_usuario = pruebaeventos.usuario_crea)) as Dueño');
        $this->join('asunto', 'asunto.id_asunto = citas.id_asunto');
        $this->join('usuarios', 'usuarios.id_usuario = citas.usuario_crea');
        $this->join('pruebaeventos', 'pruebaeventos.id = citas.disponibilidad');
        $this->where('citas.estado', $estado);
        $this->orderBy('pruebaeventos.fecha_crea DESC');
        $this->orderBy('citas.fecha_crea DESC');
        $datos = $this->findAll();
        return $datos;
    }

    public function elimina_Cita($id,$estado){
        $datos = $this->update($id, ['estado' => $estado]);         
        return $datos;
    }
}
