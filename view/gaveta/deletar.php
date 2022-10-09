<?php 


 include_once('../../model/gaveta.php');
 include_once('../../controller/crud-gaveta.php');


     if(isset($_POST['delete'])) {

    $id = $_POST['id'];
    $deletar = new CrudGaveta();
    $deletar->delete($id);
    header('Location: ver_gaveta.php');
} else {
    header('Location: ver_gaveta.php');
}