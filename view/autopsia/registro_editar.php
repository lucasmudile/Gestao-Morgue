
<?php  include('../includes/header-sub.php');?>


<?php
  include_once('../../controller/crud-autopsia.php');

  if (isset($_REQUEST['id'])) {
     $crud = new CrudAutopsia();
     $model = new ModelAutopsia();
     $dados=$crud->getById($_REQUEST['id']);
     if ($dados == null) {
        header('Location: registro.php');
     }
      
  }

    
?>

 

  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>

                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="">
                                <h1 class="h4 text-gray-900 mb-4">Editar <?php echo $dados->getIdautopsia(); ?></h1>
                            </div>
                            <form class="user" method="POST">
                              <hr>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select style="border-radius: 30px;height: 50px;" id="idsala" name="idsala" class="form-control">
                                          <option value="<?php echo $dados->getIdSala(); ?>" title="<?php echo $dados->getIdSala(); ?>" selected>
                                            <?php echo $dados->getSala(); ?>
                                          </option>
                                       <?php
                                       $select = new CrudAutopsia();
                                       $select->salaId();
                                                ?>
                                    </select>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <select style="border-radius: 30px;height: 50px;" id="idcadaver" name="idcadaver" class="form-control">
                                     <option value="<?php echo $dados->getId(); ?>" selected>
                                            <?php echo $dados->getNome(); ?>
                                          </option>
                                    </select>
                                    </div>

                 
                                </div>

                                <div class="form-group row">
                                 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                       <textarea class="form-control" id="obs" name="obs" placeholder="observação"><?php echo $dados->getObs()?></textarea>
                                    
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <input type="submit" class="btn btn-primary btn-user " name="guardar" value="actualizar">
                                    </div>
                 
                                </div>



                               
                                <hr>
                               
                            </form>

                             <?php
                              if (isset($_REQUEST['obs'])){
                                // setIdCadaver
                                // setIdSala
                                // setObs

                                $crud = new CrudAutopsia();
                                $model = new ModelAutopsia();
                                $model->setIdCadaver($_REQUEST['idcadaver']);
                                $model->setIdSala($_REQUEST['idsala']);
                                $model->setObs($_REQUEST['obs']);
                                $model->setIdautopsia($dados->getIdautopsia());

                               $crud->update($model);
                              }

                              ?>

                             
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

         
                  

<!-- create view view_autopsia as
SELECT c.*, aut.id_sala_autopsia,aut.obs,aut.data FROM autopsia aut INNER JOIN cadaver c ON c.id_cadaver=aut.id_cadaver

create view view_autopsia as
SELECT 
gp.descricao parentesco,
c.*,
sl.descricao sala,
us.usuario,
pro.local,
cm.referencia camara,
gv.numero n_gaveta
FROM autopsia aut 

INNER JOIN cadaver c 
ON c.id_cadaver=aut.id_cadaver
INNER JOIN sala_autopsia sl 
ON aut.id_sala_autopsia=sl.idsala_autopsia
INNER JOIN grau_parentestico gp 
ON c.id_grau_parentesco=gp.idgrau_parentestico
INNER JOIN camara cm 
ON c._id_camara=cm.idcamara
INNER JOIN gaveta gv
ON c.id_gaveta_=gv.idgaveta
INNER JOIN usuario us
ON c.id_usuario_=us.idusuario
INNER JOIN proveniencia pro
ON c.id_proveniencia_=pro.idproveniencia



create view view_autopsia as
SELECT 
gp.descricao parentesco,
c.*,
sl.descricao sala,
us.usuario,
pro.local,
cm.referencia camara,
gv.numero n_gaveta,
aut.obs,
aut.data,
aut.idautopsia,
sl.idsala_autopsia
FROM autopsia aut 

INNER JOIN cadaver c 
ON c.id_cadaver=aut.id_cadaver
INNER JOIN sala_autopsia sl 
ON aut.id_sala_autopsia=sl.idsala_autopsia
INNER JOIN grau_parentestico gp 
ON c.id_grau_parentesco=gp.idgrau_parentestico
INNER JOIN camara cm 
ON c._id_camara=cm.idcamara
INNER JOIN gaveta gv
ON c.id_gaveta_=gv.idgaveta
INNER JOIN usuario us
ON c.id_usuario_=us.idusuario
INNER JOIN proveniencia pro
ON c.id_proveniencia_=pro.idproveniencia
 -->



<?php  include('../includes/footer-sub.php');?>