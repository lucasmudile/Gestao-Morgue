<?php 


 include_once('../../model/proveniencia.php');
 include_once('../../controller/crud-proveniencia.php');


     if(isset($_POST['delete'])) {

    $id = $_POST['id'];
    $deletar = new CrudProveniencia();
    $deletar->delete($id);
    header('Location: ver_proveniencia.php');
} else {
    header('Location: ver_proveniencia.php');
}