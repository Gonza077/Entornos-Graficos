
<?php  
use PhpOffice\PhpSpreadsheet\Spreadsheet;
require('includes/db.php');
require_once('includes/user.php');
require_once('includes/user_session.php');
$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
//ACA HABIA QUE VERIFICAR QUE SEA EL ADMIN O PROFESOR EN FORMATO PDF QUE SBUA SUS HORARIOS?
if(isset($_POST["submit"])) {
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if (isset($_POST["import"]))
{
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  if(in_array($_FILES["fileToUpload"]["type"],$allowedFileType)){
        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES["fileToUpload"]["name"], $targetPath);
        $Reader = PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");;
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);     
            foreach ($Reader as $Row)
            {       
                $name = "";
                $description="";
                if(isset($Row[0])) {
                    $name = $db -> connect() -> real_escape_string($Row[0]);
                }            
              
                if(isset($Row[1])) {
                    $description = $db -> connect() -> real_escape_string($Row[1]);
                }               
                if (!empty($name) || !empty($description)) {
                    $query = "insert into tbl_info(name,description) values('".$name."','".$description."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}  
    /*
    $target_dir = "uploads/"; 
    $uploadOk = 1;
    $filename = $_FILES["fileToUpload"]["name"];
    $ext = substr($filename,-4);    
    $target_file = $target_dir . $filename;
    // Chequeo de existencia de archivo
    if (file_exists($target_file) && $uploadOk != 0 ) {
        echo "El archivo ya fue cargado.";
        $reader= PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
        $spreadSheet= $reader -> load($target_file);
        $spreadSheet -> getActiveSheet(0);
        $uploadOk = 0;
    }

    // Permitir solo el tipo de archivo xlsx
    if( $ext != "xlsx" && $uploadOk != 0) {
        echo "Solo los archivos de tipo xlsx son permitidos";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "El archivo no fue cargado.";
        // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "El archivo ". htmlspecialchars( basename( $filename )). "fue cargado.";
    } else {
        echo "Hubo un error al cargar el archivo.";
    }
    }*/
}
?>