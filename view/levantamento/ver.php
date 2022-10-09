<?php  include('../includes/header-sub.php');?>




    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                               
                            </div>

  <div class="container">   
 

        <div class="row mx-1">
      <form class="form-inline mr-auto  my-3 my-md-0 mw-100 navbar-search" method="GET">
                                
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 shadow-lg"
                                            placeholder="Pesquisar por..." aria-label="Search"
                                            aria-describedby="basic-addon2" value="<?php echo isset($_GET['search'])? $_GET['search'] : ""?>" name="search" >



                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>

                                  <!-- Page Heading -->
                   
          </form>


                        <a href="../../util/relatorio/relatorio-candidato.php" class="ml-auto btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatório</a>

                    </div>

         

     <div class="card o-hidden border-0 shadow-lg my-3">


        <div class="card-body p-0">

            <div class="row">
                 

                <div class="col-lg-12">

                    <div class="p-3 mt-5">


                        <div class="text-left">
                            <h1 class="h4 text-gray-900 mb-2 font-weight-bold" style="text-transform: uppercase">
                                Levantamentos</h1>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Falecido</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Testemunha familiar</th>
                                    <th scope="col">Parentesco</th>
                                    <th scope="col">Contacto</th>
                                    <th scope="col">Funcionario</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                                 include_once('../../model/levantamento.php');
                                                include_once('../../controller/crud-levantamento.php');
                                                $select = new CrudLevantamento();
                                                $dados;

                                                if(isset($_GET['search'])) {
                                                    $search = $_GET['search'];
                                                    if($search != null) {
                                                        $dados = $select->search($search);
                                                    } else {
                                                        $dados = $select->select();
                                                    }
                                                } else {
                                                    $dados = $select->select();
                                                }
                                                foreach ($dados as $key => $value) {
                                                   echo '<tr>
                                                        
                                                            <td>'.$value->getIdCadaver().'</td>
                                                            <td>'.$value->getData().'</td>
                                                             <td>'.$value->getTestemunhaFamiliar().'</td>
                                                              <td>'.$value->getIdGrauParentesco().'</td>
                                                              <td>'.$value->getContacto().'</td>
                                                              <td>'.$value->getIdFuncionario().' </td>
                                                         
                                                            <td>
                                                                <a href="#"  data-toggle="modal" data-target="#delete'.$value->getId().'" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>';
                                                }

                                                


                                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

         <?php

        $select = new CrudLevantamento();
        $dados  = $select->select();
        foreach ($dados as $key => $value) {

            # MODAL PARA ELIMINAR O CURSO
            echo '
                <div class="modal fade" id="delete'.$value->getId().'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">'.$value->getIdCadaver().'</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Tens certeza que deseja eliminar ?</div>
                        <div class="modal-footer">
                            <form action="deletar.php" method="post">
                                <input type="hidden" name="id" value="'.$value->getId().'">
                                
                                <button type="submit" class="btn btn-danger" name="delete">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
            ';

          
        }
?>








<?php  include('../includes/footer-sub.php');?>