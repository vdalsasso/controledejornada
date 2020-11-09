<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';



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
                  <label for="exampleInputEmail1">Placa:</label>
                  <input type="text" name="motnome" class="form-control" id="exampleInputEmail1" placeholder="Informe o nome...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Ano:</label>
                  <input type="text" name="veiano" class="form-control" id="exampleInputEmail1" placeholder="Informe o ano do veículo...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Modelo:</label>
                  <input type="text" name="veimodelo" class="form-control" id="exampleInputEmail1" placeholder="Informe o modelo...">
                </div>

                <label for="exampleInputEmail1">Tipo do veículo (caminhão, ônibus...):</label>

                <select class="form-control" name="tpvcod">
                ';
                $tpMotorista->listTpMotorista();
                echo '</select>
  
               '; 

              echo ' <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/veiculo">Cancelar</a>
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