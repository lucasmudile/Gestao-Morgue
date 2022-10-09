<?php 


 include_once('../../model/funcionario.php');
 include_once('../../controller/crud-funcionario.php');



     if(isset($_POST['delete'])) {

    $id = $_POST['id'];
    $deletar = new CrudFuncionario();
    $deletar->delete($id);
    header('Location: ver_funcionario.php');
} else {
    header('Location: ver_funcionario.php');
}


 include_once('../../model/usuario.php');
 include_once('../../controller/crud-usuario.php');


     if(isset($_POST['delete2'])) {

    $id = $_POST['id'];
    $deletar = new CrudUsuario();
    $deletar->delete($id);
    header('Location: ver_usuario.php');
} else {
    header('Location: ver_usuario.php');
}