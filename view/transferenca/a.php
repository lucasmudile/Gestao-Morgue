<form class="user" id="cadaver" method="POST">
<div class="form-group row">
<div class="col-sm-4">

<select style="border-radius: 30px;height: 50px;" id="proveniencia" name="proveniencia" class="form-control">
<?php
include_once('../../model/proveniencia.php');
include_once('../../controller/crud-proveniencia.php');
$select = new CrudProveniencia();
$select->options();
?>
</select>
</div>
</div>
</form>

<?php if (isset($_REQUEST['idcadaver'])){?>
    <?php echo $var ?>
<?php  } ?>

<?php if (isset($_REQUEST['idcadaver'])){
$crud = new CrudTransferenca();
$dados  = $crud->getById($_REQUEST['idcadaver']);

?>
<?php  } ?>





<?php foreach ($dados as $key => $value) {?>
<?php  } ?>



<?php 
if (isset($_REQUEST['idcadaver'])) {
// getIdCadaver
$dad  = $crud->getById($_REQUEST['idcadaver']);
foreach ($dad as $key => $value) {
echo '<option value="'.$value->getIdCadaver().'">'.$value->getNome().'</option>';
}

}else{
$crud->teste();
} 







if (isset($_REQUEST['idcadaver'])) {
                                              // getIdCadaver
                                              $dad  = $crud->getById($_REQUEST['idcadaver']);
                                                foreach ($dad as $key => $value) {
                                                echo '<option value="'.$value->getIdCadaver().'">'.$value->getNome().'</option>';
                                                }

                                            }else{
                                            $crud->teste();
                                            } 

 ?>




<?php if (isset($_REQUEST['idcadaver'])){
$dados  = $crud->getById($_REQUEST['idcadaver']);
?>
<?php  } ?>




<?php foreach ($dados as $key => $value) {?>
<?php  } ?>

<?php 
     # Função para fazer o update do Cadaver
    public function update($model) {

         $id = $model->getId();
         $idGaveta=$model->getIdGaveta();
         $idCamara=$model->getIdCamara();

         $gaveta=$model->getGaveta();
         $camara=$model->getCamara();

         $query = $this->conexao->prepare("UPDATE cadaver SET id_gaveta_='$gaveta', _id_camara='$camara' WHERE id_cadaver='$id'");

                    if($query->execute()) {
                        echo 1;
                    
                    } else {
                        echo 2;
                    }   


       

        # FECHANDO O COMANDO
        $query->close();
        # FECHANDO A CONEXÃO
        $this->conexao->close();
    }










     # Função para fazer o update do Cadaver
    public function update($model) {

         // $id = $model->getId();
         // $idGaveta=$model->getIdGaveta();
         // $idCamara=$model->getIdCamara();

         // $gaveta=$model->getGaveta();
         // $camara=$model->getCamara();

         // $query = $this->conexao->prepare("UPDATE cadaver SET id_gaveta_='4', _id_camara='4' WHERE id_cadaver='6'");
         // $query = $this->conexao->prepare("UPDATE cadaver SET _id_camara='3' WHERE id_cadaver='6'");
      $query= $this->conexao->prepare("SELECT * FROM view_cadaver");
      $query->execute();
               // if() {
               //          echo 1;
                    
               //      } else {
               //          echo 2;
               //      }   


       

        # FECHANDO O COMANDO
        $query->close();
        # FECHANDO A CONEXÃO
        $this->conexao->close();
    }

?>
<?php  
if (isset($_REQUEST['salvar'])) {
$id=$_REQUEST['id'];
$idgaveta=$_REQUEST['idgaveta'];
$idcamara=$_REQUEST['idcamara'];

$gaveta=$_REQUEST['gaveta'];
$camara=$_REQUEST['camara'];
$model = new Transferenca();
$model->setId($id);
$model->setIdCadaver($id);
$model->setIdGaveta($idgaveta);
$model->setGaveta($gaveta);
$model->setIdCamara($idcamara);
$model->setCamara($camara);
$crud->update($model);
} 
?>