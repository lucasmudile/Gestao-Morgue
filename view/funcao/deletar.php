<?php 


 include_once('../../model/funcao.php');
 include_once('../../controller/crud-funcao.php');


     if(isset($_POST['delete'])) {

    $id = $_POST['id'];
    $deletar = new CrudFuncao();
    $deletar->delete($id);
    header('Location: ver_funcao.php');
} else {
    header('Location: ver_funcao.php');
}