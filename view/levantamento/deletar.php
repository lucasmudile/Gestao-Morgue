<?php 


 include_once('../../model/levantamento.php');
 include_once('../../controller/crud-levantamento.php');



     if(isset($_POST['delete'])) {

    $id = $_POST['id'];
    $deletar = new CrudLevantamento();
    $deletar->delete($id);
    header('Location: ver.php');
} else {
    header('Location: ver.php');
}