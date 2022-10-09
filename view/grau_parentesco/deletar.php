<?php 


 include_once('../../model/grau_parentesco.php');
 include_once('../../controller/crud-grau_parentesco.php');


     if(isset($_POST['delete'])) {

    $id = $_POST['id'];
    $deletar = new CrudGrauParentesco();
    $deletar->delete($id);
    header('Location: ver_grau.php');
} else {
    header('Location: ver_grau.php');
}