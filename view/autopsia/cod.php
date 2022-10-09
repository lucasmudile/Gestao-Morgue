<?php
 

?>

<div class="text-left">
    <h1 class="h4 text-gray-900 mb-2 font-weight-bold" style="text-transform: uppercase">
       listar Autopsia</h1>
</div>
<table class="table table-striped">
    <thead>
        <tr>
           
            <th scope="col">Nome</th>
            <th scope="col">BI</th>
            <th scope="col">Sexo</th>
            <th scope="col">DataNascimento</th>
            <th scope="col">Proveniência</th>
            <th scope="col">OBS</th>
            <th scope="col">Funcionario</th>
            <th scope="col">Outras</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
          <?php
          $select = new CrudAutopsia();
          // $model = new ModelAutopsia();
                         
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
                                      <td>'.$value->getObs().' </td>
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