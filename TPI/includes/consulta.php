<?php

include_once 'db.php';

class Consulta{
    public $id;
    public $fecha;
    // Datos para el excel
    public $docente_id;
    public $materia_id;
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

    public function setConsulta($id,$docente_id,$materia_id,$fecha,$cupo,$descripcion_baja=null,$fecha_baja=null,$materia_nombre=null,$docente_nombre=null,$docente_apellido=null){
        $this->id = $id;
        $this->docente_id = $docente_id;
        $this->materia_id = $materia_id;
        $this->fecha = $fecha;
        $this->cupo = $cupo;
        $this->descripcion_baja = $descripcion_baja;
        $this->fecha_baja = $fecha_baja;
        $this->materia_nombre = $materia_nombre;
        $this->docente_nombre = $docente_nombre;
        $this->docente_apellido = $docente_apellido;
    }
}


class ConsultaRepository extends DB{

    public function getConsultaById($consulta_id){
        
        $query=" SELECT
                consulta.id AS 'id',
                consulta.docente_id AS 'docente_id',
                consulta.materia_id AS 'materia_id',
                consulta.fecha AS 'fecha',
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
                WHERE consulta.id = $consulta_id" ;

        return $this->fetchConsultaFromDatabase($query);
    }

    private function fetchConsultaFromDatabase($query){
        $stmt = $this->connect()->query($query);

        $fila = $stmt->fetch_row();
        $consulta = new Consulta();
        isset($fila) 
        ? $consulta->setConsulta($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9]) 
        : $consulta = NULL ;
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

    public function crearConsulta($docenteId,$materiaId,$fecha,$cupo,$consultaReemplazoId){
        $query="INSERT INTO consulta (docente_id,materia_id,create_time,update_time,fecha,cupo,consulta_reemplazo_id) VALUES ($docenteId,$materiaId,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP(),'$fecha',$cupo,$consultaReemplazoId)";
        return $this->executeQuery($query);
    }

    private function executeQuery($query){
        $this->connect()->query($query);
    }

}

?>
