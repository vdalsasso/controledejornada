<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/regras.class.php';

if(isset($_POST['rjocod'])){

$resp = $regras->editRegras($_POST['rjocod']);


echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';

echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adicionar <small>Regras</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Itens</li>
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
              <h3 class="box-title">Regra</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../../App/Database/insertregras.php" method="POST">
              <div class="box-body">
              	<div class="form-group">
            ';

            echo '</select>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Nome da Regra:</label>
            <input type="text" name="rjonome" class="form-control" id="exampleInputEmail1" placeholder="nome...">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Horas de trab. ininterrupto:</label>
            <input type="text" name="rjotrabinint" class="form-control" id="exampleInputEmail1" placeholder="horas de trab inint...">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Horas de descanso:</label>
            <input type="text" name="rjodesc" class="form-control" id="exampleInputEmail1" placeholder="rjodesc">
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Horas minimas de descanso</label>
            <input type="text" name="rjodescinint" class="form-control" id="exampleInputEmail1" placeholder="Horas minimas de descanso interrupto...">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Hora(s) de refeição:</label>
            <input type="text" name="rjorefeicao" class="form-control" id="exampleInputEmail1" placeholder="hora de refeição...">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Horas máximas de trabalho por dia:</label>
            <input type="text" name="rjomaxdia" class="form-control" id="exampleInputEmail1" placeholder="horas máximas por dia...">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Horas de espera:</label>
            <input type="text" name="rjoesprep" class="form-control" id="exampleInputEmail1" placeholder="horas de espera...">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Horas de descanso interjornada:</label>
            <input type="text" name="rjodescinter" class="form-control" id="exampleInputEmail1" placeholder="horas de desncaso interjornada...">
          </div>
          
          <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/regras">Cancelar</a>
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