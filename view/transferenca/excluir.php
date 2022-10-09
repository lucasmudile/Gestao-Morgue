<?php 


 include_once('../../controller/crud-transferenca.php');



     if(isset($_REQUEST['delete'])) {

    $id = $_REQUEST['id'];
    $deletar = new CrudTransferenca();
    $deletar->delete($id);
    header('Location: ver.php');
} else {
    header('Location: ver.php');
}

?>