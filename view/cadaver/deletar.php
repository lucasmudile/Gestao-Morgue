<?php 


 include_once('../../model/cadaver.php');
 include_once('../../controller/crud-cadaver.php');


     if(isset($_POST['delete'])) {

    $id = $_POST['id'];
    $deletar = new CrudCadaver();
    $deletar->delete($id);
    header('Location: ver.php');
} else {
    header('Location: ver.php');
}