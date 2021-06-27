<?php

include_once 'db.php';

class Consulta{
    public $id;
    public $horario;
    // Datos para el excel
    public $id_materia;
    public $id_profesor;
    public $legajo_profesor;
    public $codigo_materia;
    // Datos para el excel
    public $cupo;
    public $descripcion_baja;
    public $fecha_baja;
    public $materia_nombre;
    public $docente_nombre;
    public $docente_apellido;

    public function __construct(){
    }

    public function setConsulta($consultaArr){
        $this->id = $consultaArr[0];
        $this->horario = $consultaArr[1];
        $this->cupo = $consultaArr[2];
        $this->descripcion_baja = $consultaArr[3];
        $this->fecha_baja = $consultaArr[4];
        $this->materia_nombre = $consultaArr[5];
        $this->docente_nombre = $consultaArr[6];
        $this->docente_apellido = $consultaArr[7];
    }
}


class ConsultaRepository extends DB{

    public function getConsultaById($consulta_id){
        
        $query=" SELECT
                consulta.id AS 'id',
                consulta.fecha AS 'horario',
                consulta.cupo AS 'cupo',
                consulta.descripcion_baja AS 'descripcion_baja',
                consulta.fecha_baja AS 'fecha_baja',
                materia.nombre AS 'materia_nombre',
                persona.nombre AS 'docente_nombre',
                persona.apellido AS 'docente_apellido'
                FROM consulta
                INNER JOIN persona
                ON consulta.docente_id = persona.id
                INNER JOIN materia
                ON consulta.materia_id = materia.id
                WHERE consulta.id =$consulta_id" ;

        // $this->fetchConsultaFromDatabase($query);
        return $this->fetchConsultaFromDatabase($query);
    }

    private function fetchConsultaFromDatabase($query){
        $stmt = $this->connect()->query($query);

        $fila = $stmt->fetch_row();
        $consulta = new Consulta();
        isset($fila) ? $consulta->setConsulta($fila) : $consulta = NULL ;
        return $consulta;
    }

    private function query($materiaSelected,$profesorSelected,$estadoSelected){

    }

    private function fetchConsultasFromDatabase($query){
        $stmt = $this->connect()->query($query);

        $fila = $stmt->fetch_row();
        return $fila;
    }

    // private function setConsulta($consultaArr){
    //     $this->id = $consultaArr[0];
    //     $this->horario = $consultaArr[1];
    //     $this->cupo = $consultaArr[2];
    //     $this->descripcion_baja = $consultaArr[3];
    //     $this->fecha_baja = $consultaArr[4];
    //     $this->materia_nombre = $consultaArr[5];
    //     $this->docente_nombre = $consultaArr[6];
    //     $this->docente_apellido = $consultaArr[7];
    // }
    public function bloquearConsulta($consultaId,$descripcionBaja){
       
        $query= "UPDATE consulta SET fecha_baja = CURRENT_TIMESTAMP(), descripcion_baja ='$descripcionBaja',update_time = CURRENT_TIMESTAMP()  WHERE consulta.id = $consultaId";
        $this->executeQuery($query);
    }

    public function addCupoToConsulta($consultaId){
        $query="UPDATE consulta SET cupo = cupo + 1, update_time = CURRENT_TIMESTAMP() WHERE consulta.id = $consultaId";
        $this->executeQuery($query);
    }

    public function subctractCupoToConsulta($consultaId){
        $query="UPDATE consulta SET cupo = cupo - 1, update_time = CURRENT_TIMESTAMP() WHERE consulta.id = $consultaId";
        $this->executeQuery($query);
    }

    private function executeQuery($query){
        $this->connect()->query($query);
    }

}

?>
