<?php 


 include_once('../../model/sala_autopsia.php');
 include_once('../../controller/crud-sala-autopsia.php');


     if(isset($_POST['delete'])) {

    $id = $_POST['id'];
    $deletar = new CrudSalaAutopsia();
    $deletar->delete($id);
    header('Location: sala.php');
} else {
    header('Location: sala.php');
}