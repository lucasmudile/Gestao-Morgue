   
<?php  
include('../includes/header-sub.php');
include_once('../../controller/crud-transferenca.php');
$crud = new CrudTransferenca();
// $model = new Transferenca();
?>
 <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="app.js"></script>

<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<div class="row">
				  <div class="col-lg-12">
                       
                        <div class="p-5">
                            <h1 class="h4 text-gray-900 mb-4">Editar tranferença</h1>
                            <?php if (isset($_REQUEST['id'])){ $dados  = $crud->getById($_REQUEST['id']);?>
                            <form action="">
                            	<?php foreach ($dados as $key => $value) {?>
                            		<div class="form-group row">
                            			<div class="col-sm-6 mb-3 mb-sm-0">
                            				<span class="text-gray-900"> Nome Completo: </span>
                            				<input type="text" name="" id="" value="<?php echo $value->getNome(); ?>"class="form-control" readonly>
                                            <input type="hidden" name="id_cadaver" value="<?php echo $value->getIdCadaver(); ?>">
                            				
                            			</div>
                            			<div class="col-sm-3 mb-3 mb-sm-0">
                            				<span class="text-gray-900"> Camara actual: </span>
                            				<input type="text" name="" id="" value="<?php echo $value->getCamara(); ?>"class="form-control" readonly>
                            				<input type="hidden" name="idcamara" value="<?php echo $value->getIdCamara(); ?>"> 
                            				
                            			</div>

                            			<div class="col-sm-3 mb-3 mb-sm-0">
                            				<span class="text-gray-900"> Gaveta actual: </span>
                            				<input type="text" name="" id="" value="<?php echo $value->getGaveta(); ?>"class="form-control" readonly>
                            				<input type="hidden" name="idgaveta" value="<?php echo $value->getIdGaveta(); ?>"> 
                            				
                            			</div>
                            		</div>
                            		<div class="form-group row">
                            			<div class="col-sm-4">
                            				<label class="text-gray-900">Camara</label>
                            				<select id="camara" name="camara" class="form-control camara">
                            					<?php
                                                    include_once('../../model/camara.php');
                                                    include_once('../../controller/crud-camara.php');
                                                     $select = new CrudCamara();
                                                     $select->options();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                        	<label class="text-gray-900">Gaveta</label>
                                        	<select id="gaveta" name="gaveta" class="form-control gaveta">
                                        	</select>
                                        </div>
                                        <div class="col-sm-2 mb-3 mb-sm-0">
                                        	<label class="text-gray-900" style="color: white;">&nbsp;</label><br>
                                        	<input type="submit" class="btn btn-primary btn-user btn-md" name="salvar" id="salvar" value="Cadastrar" >
                                        	
                                        </div>
										<div class="col-sm-2 mb-3 mb-sm-0">
											<label class="text-gray-900" style="color: white;">&nbsp;</label><br>
											<a class="btn btn-danger btn-user btn-md" href="index.php">cancelar</a>
										</div>
                            		</div>
                            <?php  } ?>
                            </form>
                            <?php  } ?>

                        </div>

                    </div>

                    <div class="col-lg-12">
                    <?php  

                    if (isset($_REQUEST['salvar'])) {
                    $id=$_REQUEST['id_cadaver'];


                    $idgaveta=$_REQUEST['idgaveta'];
                    $idcamara=$_REQUEST['idcamara'];
                   
                    $gaveta=$_REQUEST['gaveta'];
                    $camara=$_REQUEST['camara'];
                  
                    $model = new Transferenca();
                    //$model->setId($id);
                    $model->setIdCadaver($id);
                    $model->setIdGaveta($idgaveta);
                    $model->setIdCamara($idcamara);
                    $model->setGaveta($gaveta);
                    $model->setCamara($camara);

                    $crud = new CrudTransferenca();
                    $updt=$crud->update_transf($model);
                    // echo $updt;
                   if ($updt==1) {
                    $model = new Transferenca();
                    $model->setIdCadaver($id);
                    $model->setIdGaveta($idgaveta);
                    $model->setIdCamara($idcamara);
                    $model->setGaveta($gaveta);
                    $model->setCamara($camara);
                    $crud = new CrudTransferenca();
                    $transferir=$crud->editarTransferencia($model);
                    if ($transferir==1) {
                        // echo "registro actualizado com sucesso";
                        ?>
                        <script type="text/javascript">location.href = './ver.php';</script>
                        <?php
                    }else{
                    echo "erro ao actualizar registro";
                   }
                   }else{
                    echo "erro";
                   }
                    } 
                    ?>
                    </div>

			</div>
		</div>
	</div>
</div>



<script src="api.js"></script>
<?php  include('../includes/footer-sub.php');?>