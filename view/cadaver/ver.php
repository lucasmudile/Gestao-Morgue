<?php  
include('../includes/header-sub.php');
include('../../controller/crud-cadaver.php');
require '../../model/cadaver.php';
?>

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


                        <a href="relatorio.php" class="ml-auto btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatório</a>

                    </div>

         

     <div class="card o-hidden border-0 shadow-lg my-3">


        <div class="card-body p-0">

            <div class="row">
                 

                <div class="col-lg-12">

                    <div class="p-3 mt-5">


                        <div class="text-left">
                            <h1 class="h4 text-gray-900 mb-2 font-weight-bold" style="text-transform: uppercase">
                                Cadaver Depositados</h1>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Nome</th>
                                    <th scope="col">BI</th>
                                    <th scope="col">Sexo</th>
                                    <th scope="col">DataNascimento</th>
                                    <th scope="col">Proveniência</th>
                                    <th scope="col">Residente</th>
                                    <th scope="col">Funcionario</th>
                                    <th scope="col">Outras</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                                
                                                $select = new CrudCadaver();
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
                                                        
                                                            <td>'.$value->getNome().'</td>
                                                            <td>'.$value->getBi().'</td>
                                                             <td>'.$value->getSexo().'</td>
                                                              <td>'.$value->getDataNascimento().'</td>
                                                              <td>'.$value->getIdProveniencia().'</td>
                                                              <td>'.$value->getResidente().' </td>
                                                            <td>'.$value->getIdUsuario().'</td>
                                                        	
                                                        	  <td>
                                                                <a href="#"  data-toggle="modal" data-target="#ver'.$value->getId().'" class="btn btn-outline-primary"><i class="fas fa-pen-alt"></i></a>
                                                            </td>


                                                        	  <td>
                                                                <a href="editar.php?id='.$value->getId().'" class="btn btn-outline-secondary"><i class="fas fa-pen"></i></a>
                                                            </td>
                                                         
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

        $select = new CrudCadaver();
        $dados  = $select->select();
        foreach ($dados as $key => $value) {

            # MODAL PARA ELIMINAR O CURSO
            echo '
                <div class="modal fade" id="delete'.$value->getId().'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">'.$value->getNome().'</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Tens certeza que deseja eliminar este funcionario ?</div>
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


     <?php

        $select = new CrudCadaver();
        $dados  = $select->select();
        foreach ($dados as $key => $value) {

            # MODAL PARA ELIMINAR O CURSO
            echo '
                <div class="modal fade bd-example-modal-lg" id="ver'.$value->getId().'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informações do falecido</h5>
                           
                        </div>
                        <div class="modal-body">


                      

                           <div class="form-group row">


                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Nome Completo:</strong> '.$value->getNome().'</label>
                                    </div>
                                   
                                   <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Nº do Bilhete: </strong>'.$value->getBi().'</label>
                                    </div>

                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Sexo: </strong>'.$value->getSexo().'</label>
                                    </div>

                                </div>

                                <div class="form-group row">
                                 <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Data de Nascimento: </strong>'.$value->getDataNascimento().'</label>
                                    </div>

                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Residente: </strong>'.$value->getResidente().'</label>
                                    </div>

                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Proveniência:</strong> '.$value->getIdProveniencia().'</label>
                                    </div>

                                    </div>

                                     <div class="form-group row">
                                 <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Nome do Pai:</strong> '.$value->getNomePai().'</label>
                                    </div>

                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Nome da Mãe: </strong>'.$value->getNomeMae().'</label>
                                    </div>

                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Grau Parentesco: </strong>'.$value->getIdGrauParentesco().'</label>
                                    </div>
                                    
                                    </div>



                                     <div class="form-group row">
                                 <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Testemunha Familiar: </strong>'.$value->getTestemunhaFamiliar().'</label>
                                    </div>

                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Testemunha Responsável: </strong>'.$value->getTestemunhaResponsavel().'</label>
                                    </div>

                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Gaveta: </strong>' .$value->getIdGaveta().'</label>
                                    </div>
                                    
                                    </div>

                                      <div class="form-group row">
                                 <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong> Camara: </strong>'.$value->getIdCamara().'</label>
                                    </div>

                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Atendido Por: </strong>'.$value->getIdUsuario().'</label>
                                    </div>

                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                         <label class="text-gray-900"><strong>Data de Registo: </strong>' .$value->getDataRegisto().'</label>
                                    </div>
                                    
                                    </div>





                        </div>
                        <div class="modal-footer">
                            <form action="" method="post">
                                <a class="btn btn-primary" href="imprimir.php?id='.$value->getId().'">imprimir</a>
                                <input type="hidden" name="id" value="'.$value->getId().'">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" name="ver">Fechar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
            ';

          
        }
?>







<?php  include('../includes/footer-sub.php');?>