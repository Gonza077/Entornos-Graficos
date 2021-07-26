<?php
include_once 'db.php';
class ProfesorAdapter extends DB{
    
    function getAllProfesores(){
        try{
            $sql="SELECT id,nombre,apellido FROM persona where docente is true";
            if(isset($_GET['docente'])){
                $docente = $_GET['docente'];
                $sql = "SELECT persona.id as 'id',
                        persona.nombre as 'nombre',
                        persona.apellido as 'apellido'
                        FROM materia 
                        INNER JOIN materia_docente
                        ON materia.id = materia_docente.materia_id
                        INNER JOIN persona
                        ON persona.id = materia_docente.docente_id
                        WHERE materia_docente.docente_id = $docente
                        ORDER BY anio ASC, nombre ASC ";
            }
            $registros = $this -> connect() -> query($sql);
            while( $row = $registros -> fetch_assoc()) {
                echo '<option value="'.$row["id"]. '">' . $row["apellido"] . ", ". $row["nombre"] .'</option>';
            }
        }
        catch(Exception $e){
            throw new Exception("Error al cargar todos los profesores");
        }
        finally{
            $db -> disconnect();
        }
    }
}
?>
  