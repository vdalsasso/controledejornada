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
        Adicionar <small>Regras</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Regras</li>
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
              <h3 class="box-title">Regra</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../../App/Database/insertregra.php" method="POST">
              <div class="box-body">
              	<div class="form-group">
            </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Nome da Regra:</label>
                <input type="text" name="rjonome" class="form-control" id="exampleInputEmail1" placeholder="nome...">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Valor máximo de horas de trabalho ininterruptas:</label>
                <input type="time" name="rjotrabinint" class="form-control" id="exampleInputEmail1" placeholder="Horas de trab inint...">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Horas de descanso diário obrigatórias por lei:</label>
                <input type="time" name="rjodesc" class="form-control" id="exampleInputEmail1" placeholder="Horas de descanso">
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Mínimo de horas de descanso diário:</label>
                <input type="time" name="rjodescinint" class="form-control" id="exampleInputEmail1" placeholder="Horas minimas de descanso interrupto...">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Mínimo de Hora(s) de refeição por dia:</label>
                <input type="time" name="rjorefeicao" class="form-control" id="exampleInputEmail1" placeholder="hora de refeição...">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Máximo de horas de trabalho (regular) por dia:</label>
                <input type="time" name="rjomaxdia" class="form-control" id="exampleInputEmail1" placeholder="horas máximas por dia...">
              </div>
              
            <div class="form-group">
              <label for="exampleInputEmail1">Valor máximo de horas extras por dia:</label>
              <input type="time" name="rjoextra" class="form-control" id="exampleInputEmail1" placeholder="horas extra...">
            </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Horas de espera necessárias para que seja considerado repouso:</label>
                <input type="time" name="rjoesprep" class="form-control" id="exampleInputEmail1" placeholder="horas de espera...">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Mínimo de horas de descanso interjornadas:</label>
                <input type="time" name="rjodescinter" class="form-control" id="exampleInputEmail1" placeholder="horas de desncaso interjornada...">
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
?>