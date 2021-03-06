<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/escopo.class.php';


echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adicionar <small>Usuários</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Usuários</li>
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
              <h3 class="box-title">Usuário</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../../App/Database/insertusuario.php" method="POST">
              <div class="box-body">
              	<div class="form-group">
            </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nome de Usuário (username para acesso):</label>
                  <input type="text" name="usuusername" class="form-control" id="exampleInputEmail1" placeholder="Informe o nome utilizado para acesso...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nome da Pessoa:</label>
                  <input type="text" name="usunome" class="form-control" id="exampleInputEmail1" placeholder="Informe o nome da pessoa...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email:</label>
                  <input type="text" name="usuemail" class="form-control" id="exampleInputEmail1" placeholder="Informe o E-mail...">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Senha de acesso:</label>
                  <input type="password" name="ususenha" class="form-control" id="exampleInputEmail1" placeholder="Informe a senha de acesso...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Imagem:</label>
                  <input type="text" name="usuimagem" class="form-control" id="exampleInputEmail1" placeholder="Imagem para o usuário">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Fone:</label>
                  <input type="text" name="usufone" class="form-control" id="exampleInputEmail1" placeholder="Fone do usuário...">
                </div>


                <label for="exampleInputEmail1">Nome do Escopo</label>

                <select class="form-control" name="esccod">
                ';
                $escopo->listEscopo();
                echo '</select>
  
               '; 

              echo ' <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/usuarios">Cancelar</a>
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
echo  $footer;
echo $javascript;
?>