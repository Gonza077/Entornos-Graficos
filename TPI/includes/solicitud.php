<?php

include_once 'db.php';

class Solicitud extends DB{
    public $id;
    public $horario;
    public $cupo;
    public $descripcion_baja;
    public $fecha_baja;
    public $materia_nombre;
    public $docente_nombre;
    public $docente_apellido;

    public function __construct($arr=null){
        $this->id = $arr[0];
        $this->horario = $arr[1];
        $this->cupo = $arr[2];
        $this->descripcion_baja = $arr[3];
        $this->fecha_baja = $arr[4];
        $this->materia_nombre = $arr[5];
        $this->docente_nombre = $arr[6];
        $this->docente_apellido = $arr[7];
    }

}


class SolicitudRepository extends DB{

    public function queryByPersona($consulta_id){
        
        $query="SELECT consulta.id AS consulta_id , persona.id AS persona_id , MAX(solicitud.id)
        FROM consultas_db.persona
        INNER JOIN solicitud 
        ON persona.id = solicitud.persona_id
        INNER JOIN consulta 
        ON solicitud.consulta_id = consulta.id
        WHERE solicitud.fecha_baja IS NULL AND consulta.fecha >= CURDATE()
        GROUP BY consulta_id AND persona_id";

        // $this->fetchConsultaFromDatabase($query);
        return $this->query($query);
    }

    private function fetchConsultaFromDatabase($query){
        $stmt = $this->connect()->query($query);

        $fila = $stmt->fetch_row();
        return isset($fila) ? new Consulta($fila) : NULL ;
    }

    private function query($query){
        $solicitudesResult = $this->connect()->query($query)->fetch_all(MYSQLI_NUM);
        $solicitudes=[];
        while($row = $solicitudes-> fetch_assoc()) {
            array_push($solicitudes,$row['consulta_id']);
        }
        return $solicitudes;
    }

    private function fetchConsultasFromDatabase($query){
        $stmt = $this->connect()->query($query);

        $fila = $stmt->fetch_row();
        return $fila;
    }

    public function bajaSolicitudByPersonaAndConsulta($personaId,$consultaId){
        $query="UPDATE solicitud  SET fecha_baja = '".date('Y-m-d H:i:s')."', update_time = '".date('Y-m-d H:i:s')."' WHERE persona_id = $personaId AND consulta_id = $consultaId ";
        $this->executeQuery($query);
    }

    public function altaSolicitudByPersonaAndConsulta($personaId,$consultaId){
        $query="INSERT INTO solicitud (persona_id, consulta_id, update_time) VALUES ($personaId, $consultaId,'".date('Y-m-d H:i:s')."')";
        $this->executeQuery($query);
    }

    private function executeQuery($query){
        $this->connect()->query($query);
    }

}

?>
