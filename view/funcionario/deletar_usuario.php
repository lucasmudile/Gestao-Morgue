   <?php
 include_once('../../model/usuario.php');
 include_once('../../controller/crud-usuario.php');


     if(isset($_POST['delete'])) {

    $id = $_POST['id'];
    $deletar = new CrudUsuario();
    $deletar->delete($id);
    header('Location: ver_usuario.php');
} else {
    header('Location: ver_usuario.php');
}