<?php 


 include_once('../../model/transladacao.php');
 include_once('../../controller/crud-transladacao.php');



     if(isset($_POST['delete'])) {

    $id = $_POST['id'];
    $deletar = new CrudTransladacao();
    $deletar->delete($id);
    header('Location: ver.php');
} else {
    header('Location: ver.php');
}

?>