<?php 


 include_once('../../model/camara.php');
 include_once('../../controller/crud-camara.php');


     if(isset($_POST['delete'])) {

    $id = $_POST['id'];
    $deletar = new CrudCamara();
    $deletar->delete($id);
    header('Location: ver_camara.php');
} else {
    header('Location: ver_camara.php');
}