<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/motorista.class.php';
require_once '../../App/Models/cidade.class.php';
require_once '../../App/Models/veiculo.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adicionar <small>Jornada</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jornadas</li>
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
              <h3 class="box-title">Jornadas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../../App/Database/insertjornada.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Título da jornada:</label>
                  <input type="text" name="jortitulo" class="form-control" id="exampleInputEmail1" placeholder="Título...:">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Dia da jornada:</label>
                  <input type="date" name="jordia" class="form-control" id="exampleInputEmail1" placeholder="Dia...:">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Hora de Início da Jornada:</label>
                  <input type="time" name="jorhorainicial" class="form-control" id="exampleInputEmail1" min="00:00" max="24:00" placeholder=""Hora de início..">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Hora de Término da Jornada:</label>
                  <input type="time" name="jorhorafinal" class="form-control" id="exampleInputEmail1" min="00:00" max="24:00" placeholder="Hora final...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Hora de Início de Refeição:</label>
                  <input type="time" name="jorrefinicial" class="form-control" id="exampleInputEmail1" min="00:00" max="24:00" placeholder="Hora de início..">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Hora de Término de Refeição:</label>
                  <input type="time" name="jorreffinal" class="form-control" id="exampleInputEmail1" min="00:00" max="24:00" placeholder="Hora final...">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Horas Extras:</label>
                  <input type="time" name="jorhoraext" class="form-control" id="exampleInputEmail1" min="00:00" max="24:00" placeholder="Horas extras:">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Horas de Descanso:</label>
                  <input type="time" name="jordescanso" class="form-control" id="exampleInputEmail1" min="00:00" max="24:00" placeholder="Horas de descanso:">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Hora de Início Interjornada:</label>
                  <input type="time" name="jorinterinicial" class="form-control" id="exampleInputEmail1" min="00:00" max="24:00" placeholder="Hora de início..">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Hora de Término Interjornada:</label>
                  <input type="time" name="jorinterfinal" class="form-control" id="exampleInputEmail1" min="00:00" max="24:00" placeholder="Hora de término..">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Hora de Início de Espera:</label>
                  <input type="time" name="jorespinicial" class="form-control" id="exampleInputEmail1" min="00:00" max="24:00" placeholder="Hora de início..:">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Hora de Término de Espera:</label>
                  <input type="time" name="jorespfinal" class="form-control" id="exampleInputEmail1" min="00:00" max="24:00" placeholder="Hora de término.."">
                </div>

                <label for="exampleInputEmail1">Motorista:</label>
                <select class="form-control" name="motcod">
                ';
                $motoristas->listMotorista();
                echo '</select>

                

                <label for="exampleInputEmail1">Cidade de Início:</label>
                <select class="form-control" name="cidcodinicial">
                ';
                $cidades->listCidade();
                echo '</select>

                <!-- /.box-body -->

                <label for="exampleInputEmail1">Cidade Destino:</label>
                <select class="form-control" name="cidcodfinal">
                ';
                $cidades->listCidade();
                echo '</select>

                <label for="exampleInputEmail1">Veículo:</label>
                <select class="form-control" name="veicod">
                ';
                $veiculos->listVeiculo();
                echo '</select>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/jornada">Cancelar</a>
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