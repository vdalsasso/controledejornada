<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/regras.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adicionar <small>Motoristas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Motoristas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">';

echo ' <a href="./" class="btn btn-success">Voltar</a>
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Motorista</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../../App/Database/insertmotorista.php" method="POST">
              <div class="box-body">
              	<div class="form-group">
            </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nome:</label>
                  <input type="text" name="motnome" class="form-control" id="exampleInputEmail1" placeholder="Informe o nome...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Rua:</label>
                  <input type="text" name="motrua" class="form-control" id="exampleInputEmail1" placeholder="Informe o nome da rua...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Bairro:</label>
                  <input type="text" name="motbairro" class="form-control" id="exampleInputEmail1" placeholder="Informe o bairro...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Cidade:</label>
                  <input type="text" name="motcidade" class="form-control" id="exampleInputEmail1" placeholder="Informe a cidade...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Estado:</label>
                  <input type="text" name="motestado" class="form-control" id="exampleInputEmail1" placeholder="Informe o estado...">
                </div>

                
                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail:</label>
                  <input type="text" name="motemail" class="form-control" id="exampleInputEmail1" placeholder="Informe o e-mail...">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Senha:</label>
                  <input type="text" name="motsenha" class="form-control" id="exampleInputEmail1" placeholder="Informe a senha...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Fone:</label>
                  <input type="text" name="motfone" class="form-control" id="exampleInputEmail1" placeholder="Informe o fone...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">CPF:</label>
                  <input type="text" name="motcpf" class="form-control" id="exampleInputEmail1" placeholder="Informe o CPF...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">RG:</label>
                  <input type="text" name="motrg" class="form-control" id="exampleInputEmail1" placeholder="Informe o RG...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">CNH:</label>
                  <input type="text" name="motcnh" class="form-control" id="exampleInputEmail1" placeholder="Informe o cnh...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Data admissão:</label>
                  <input type="text" name="motdtadmissao" class="form-control" id="exampleInputEmail1" placeholder="Informe a data de admissao...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Data afastamento:</label>
                  <input type="text" name="motdtafast" class="form-control" id="exampleInputEmail1" placeholder="Informe a data de afast...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Situação:</label>
                  <input type="text" name="motsituacao" class="form-control" id="exampleInputEmail1" placeholder="Informe a situação...">
                </div>
              
                <label for="exampleInputEmail1">Regra de jornada:</label>

                <select class="form-control" name="rjocod">
                ';
                $regras->listRegras();
                echo '</select>
  
               '; 

              echo ' <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/motorista">Cancelar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>
</div>';

echo '</div>';
echo '</div>';
echo '</section>';
echo '</div>';
echo $footer;
echo $javascript;
?>