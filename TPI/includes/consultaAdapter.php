<?php
include_once 'db.php';
include_once ('./includes/user_session.php');
include_once ('./includes/user.php');
$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
if(isset($USER)){
   $USER_ID = $USER->getId();
}

class ConsultaAdapter extends DB{

    function getAllConsultas(){
        try{
            $estadoSelected   = $_GET['estadoSelected'] != NULL ? $_GET['estadoSelected'] : "NULL";
            $profesorSelected = $_GET['profesorSelected'] != NULL ? $_GET['profesorSelected'] : "NULL";
            $materiaSelected  = $_GET['materiaSelected'] != NULL ? $_GET['materiaSelected'] : "NULL";
            $horarioSelected  = $_GET['horarioSelected'] != NULL ? $_GET['horarioSelected'] : "NULL";
            $sqlQuerySolicitudes="SELECT consulta.id FROM consultas_db.persona
                                INNER JOIN solicitud 
                                ON persona.id = solicitud.persona_id
                                INNER JOIN consulta 
                                ON solicitud.consulta_id = consulta.id
                                WHERE consulta.fecha >= CURDATE()";
            
            $solicitudes = $this -> connect() ->query($sqlQuerySolicitudes);
            $ids_solicitudes[] = [];
            while($row = $solicitudes-> fetch_assoc())
            {
            array_push($ids_solicitudes,$row['id']);
            }
            $sqlQuery="CALL queryConsulta($materiaSelected,$profesorSelected,$estadoSelected)";
            $registros = $this-> connect() ->query($sqlQuery);
            #Mostramos los resultados obtenidos dentro de una tabla
            $bloqueadaClass="class='table-danger'";
            while( $row = $registros -> fetch_assoc()){
                $id = $row["id"];
                $cupo = $row["cupo"];
                $docente_id = $row["docente_id"];
                $idInSolicitudes = in_array($id,$ids_solicitudes)? 1:0;
                echo "<tr class='".(TRUE == 'BLOQUEADA' ? "table-danger" : "")."'>";
                echo "<td>"."ACA VA UN ESTADO CALCULADO"."</td>";
                echo "<td>".$row["materia"]."</td>";
                echo "<td>".$row["docente_nombre"]."</td>";
                echo "<td>".$row["horario"]."</td>";
                echo "<td>".$cupo."</td>";
                echo "<td>";
                if(isset($USER)){
                    if(!$USER->isDocente()){
                        if ($cupo > 0 && !$idInSolicitudes ){
                            echo "<button type='button' class='btn btn-success' id='inscripcion-$id' onclick='openInscripcionConsultaModal($id)'>+</button>";
                        }
                        if($idInSolicitudes){
                            echo "<button type='button' class='btn btn-danger' id='cancelar-$id' onclick='openCancelarConsultaModal($id)'>-</button>";
                        }
                    }
                    if ($USER_ID == $docente_id){
                        echo "<button type='button' class='btn btn-danger' id='bloquear-$id' onclick='openBloquearConsultaModal($id)'>!=</button>";
                    }
                }
                echo "</td>";
                echo "<tr>";
                };
        }
        catch(Exception $e){
            throw new Exception("Error al cargar consultas");
        }
        finally
        {
            $db -> disconnect();
        }
    }

    function getConsultas(){
        try{
            if(isset($_GET['consultaId'])){
                $consulta_id  = $_GET['consultaId'];
                $query=" SELECT
                CONSULTA.id as 'id',
                CONSULTA.fecha as 'horario',
                CONSULTA.cupo as 'cupo',
                CONSULTA.descripcion_baja as 'descripcion_baja',
                CONSULTA.fecha_baja as 'fecha_baja',
                MATERIA.nombre as 'materia_nombre',
                PERSONA.nombre as 'docente_nombre',
                PERSONA.apellido as 'docente_apellido'
            
                FROM CONSULTA
                INNER JOIN PERSONA
                ON CONSULTA.docente_id = PERSONA.id
                INNER JOIN MATERIA
                ON CONSULTA.materia_id = MATERIA.id
                WHERE CONSULTA.id =$consulta_id" ;
                $stmt = $this-> connect()->query($query);
                $fila = $stmt->fetch_row();
                if (!is_null($fila)){
                    $response = new \stdClass();
                    $response->id = $fila[0];
                    $response->horario = $fila[1];
                    $response->cupo = $fila[2];
                    $response->descripcion_baja = $fila[3];
                    $response->fecha_baja = $fila[4];
                    $response->materia_nombre = $fila[5];
                    $response->docente_nombre = $fila[6];
                    $response->docente_apellido = $fila[7];
                    echo json_encode($response,200);
                } else {
                    echo json_encode("No ha sido encontrado",204);
                }
                return false;  
            } else {
                echo json_encode("No ha sido ingresado un id",JSON_FORCE_OBJECT,400);
            }
        }
        catch(Exception $e){
            throw new Exception("Error al cargar la consulta");
        }
        finally
        {
            $this -> disconnect();
        }
    }
}
?>