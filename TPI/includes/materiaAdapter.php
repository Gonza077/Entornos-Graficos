<?php
include_once 'db.php';

class MateriaAdapter extends DB{

    function getAllMaterias(){
        try{
            $sqlQuery = "SELECT id,nombre FROM materia ORDER BY nombre ASC";
            if(isset($_GET['docente'])){
                $docente = $_GET['docente'];
                $sqlQuery = "SELECT * FROM materia 
                INNER JOIN materia_docente
                ON materia.id = materia_docente.materia_id
                WHERE materia_docente.docente_id = $docente
                ORDER BY nombre ASC";
            }
            $registros = $this-> connect() -> query($sqlQuery);
            while( $row = $registros -> fetch_assoc()) {
            echo '<option value="'.$row["id"] .'">' . $row["nombre"] . '</option>';};
        }catch(Exception $e){
            throw new Exception("Error al cargar todos las materias");
        }
        finally{
            $db -> disconnect();  
        }     
    }
}

?>
  