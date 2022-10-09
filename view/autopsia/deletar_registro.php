<?php 


 include_once('../../model/sala_autopsia.php');
 include_once('../../controller/crud-autopsia.php');


     if(isset($_REQUEST['delete'])) {

    $id = $_REQUEST['id'];
    $deletar = new CrudAutopsia();
    $deletar->delete($id);
    header('Location: registro.php');
} else {
    header('Location: registro.php');
}
?>