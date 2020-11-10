<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/tpveiculo.class.php';
require_once '../../App/Models/veiculo.class.php';

if(isset($_POST['veicod'])){

$resp = $veiculos->editVeiculo($_POST['veicod']);


echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';

echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adicionar <small>Veículos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Veiculos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">';


echo ' 
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../../App/Database/insertveiculo.php" method="POST">
              <div class="box-body">
              	<div class="form-group">
            ';

            echo '</select>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Placa</label>
              <input type="text" name="veiplaca" class="form-control" id="exampleInputEmail1" placeholder="Insira a placa...">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Ano</label>
              <input type="text" name="veiano" class="form-control" id="exampleInputEmail1" placeholder="Insira o ano do veiculo...">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Modelo</label>
              <input type="text" name="veimodelo" class="form-control" id="exampleInputEmail1" placeholder="Insira o modelo do carro...">
            </div>
          
            <div class="form-group">
              <label for="exampleInputEmail1">Senha</label>
              <input type="text" name="ususenha" class="form-control" id="exampleInputEmail1" placeholder="ususenha">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Imagem</label>
              <input type="text" name="usuimagem" class="form-control" id="exampleInputEmail1" placeholder="usuimagem">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Fone</label>
              <input type="text" name="usufone" class="form-control" id="exampleInputEmail1" placeholder="usufone">
            </div>

            <label for="exampleInputEmail1">Tipo do veículo (caminhão, ônibus...):</label>

            <select class="form-control" name="tpvcod">
            ';
            $tpVeiculo->listTpVeiculo();
            echo '</select>

           '; 

          echo ' <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/usuario">Cancelar</a>
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
}else{
	header('Location: ./');
}
?>