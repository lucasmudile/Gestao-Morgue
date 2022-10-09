
<?php  include('../includes/header-sub.php');?>

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="app.js"></script>
  <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-12">
                        <div class="p-5">
                          
                                <h1 class="h4 text-gray-900 mb-4">Cadastro de Cadáver</h1>
                     
                            <form class="user" id="cadaver" method="POST">

                            	<hr>
                                <div class="form-group row">


                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <label class="text-gray-900">Nome Completo</label>
                                        <input type="text" class="form-control form-control-user" name="nome" id="nome"
                                            placeholder="Nome Completo">
                                    </div>
                                   

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="text-gray-900">Data de Nascimento</label>
                                        <input type="date" class="form-control form-control-user"
                                            id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento">
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    
                                    <div class="col-sm-4">
                                        <label class="text-gray-900">Residente</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="residente" name="residente" placeholder="Residente">
                                    </div>
                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="text-gray-900">Nº do Bilhete</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="bilhete" name="bilhete" placeholder="Nº do Bilhete">
                                    </div>
                                      <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="text-gray-900">Sexo</label>
                                         <select style="border-radius: 30px;height: 50px;" class="form-control" id="sexo" name="sexo">
                                      <option value="Masculino">Masculino</option>
                                       <option value="Femenino">Femenino</option>
                                    </select>
                                    </div>
                                </div>

                              
                                <label class="custom-control">Dados do Familiar</label>
                                <hr>
                                 <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="text-gray-900">Nome da Mãe</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="nomeMae" name="nomeMae" placeholder="Nome da Mãe">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="text-gray-900">Nome do Pai</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="nomePai" name="nomePai" placeholder="Nome do Pai">
                                    </div>

                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="text-gray-900">Garu Parentesco</label>
                                        <select style="border-radius: 30px;height: 50px;" id="grau_parentesco" name="grau_parentesco" class="form-control">
                                       <?php
                                                    include_once('../../model/grau_parentesco.php');
                                                    include_once('../../controller/crud-grau_parentesco.php');
                                                     $select = new CrudGrauParentesco();
                                                     $select->options();
                                                ?>
                                    </select>

                                    </div>
                                </div>


                                <div class="form-group row">

                                	<div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="text-gray-900">Contacto</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="contacto" name="contacto" placeholder="Contacto">
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label class="text-gray-900">Testemunha Familiar</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="testemunhaFamiliar" name="testemunhaFamiliar" placeholder="Testemunha Familiar">
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="text-gray-900">Testemunha Responsável</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="testemunhaResponsavel" name="testemunhaResponsavel" placeholder="Testemunha Responsável">
                                    </div>
                                </div>

                                      <div class="form-group row">
                                    
                                    <div class="col-sm-4">
                        

                         

                        <label class="text-gray-900">Local de Proveniencia do cadaver</label>
                         <select style="border-radius: 30px;height: 50px;" id="proveniencia" name="proveniencia" class="form-control">
                                       <?php
                                                    include_once('../../model/proveniencia.php');
                                                    include_once('../../controller/crud-proveniencia.php');
                                                     $select = new CrudProveniencia();
                                                     $select->options();
                                                ?>
                                    </select>
                                    </div>

                                    <div class="col-sm-4">

                                         <label class="text-gray-900">Camara</label>
                                        <select style="border-radius: 30px;height: 50px;" id="camara" name="camara" class="form-control camara">
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
                                    <select style="border-radius: 30px;height: 50px;" id="gaveta" name="gaveta" class="form-control gaveta">
                                    

                                    

                                    </select>
                                       
                                    </div>
                                </div>


                                <input type="submit" class="btn btn-primary btn-user btn-md" name="salvar" id="salvar" value="Cadastrar" >

                                
                                <hr>



                           <!--  -->
                               
                            </form>


                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



<script src="api.js"></script>


<?php  include('../includes/footer-sub.php');?>