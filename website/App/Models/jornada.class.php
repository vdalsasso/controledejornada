<?php

/*
 Class Jornada
*/

 require_once 'connect.php';

class Jornada extends Connect {
 	
 	public function index() {
 		$this->query = "SELECT * FROM `jornada`";
 		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

 		if($this->result){
 		
 			while ($row = mysqli_fetch_array($this->result)) {
 				echo '<li>
                  <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <span class="text">
                  <!-- checkbox -->
                  <form class="badge" name="ativ'.$row['jorcod'].'" action="action.php" method="post">
                  <input type="hidden" name="id" id="id" value="'.$row['jorcod'].'">
                  <input type="checkbox" id="status" name="status"</form>
                  <!-- todo text -->
                  <span class="badge left">'.$row['jorcod'].'</span> '.$row['jortitulo'].'</span>

                  <div class="tools right">
                    
                    <form class="right" name="editJornada'.$row['jorcod'].'" action="editJornada.php" method="post">
                      <input type="hidden" name="jorcod" id="jorcod" value="'.$row['jorcod'].'">
                      <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-edit"></i></a></form>
                    <form class="right" name="delJornada'.$row['jorcod'].'" action="delJornada.php" method="post">
                    <input type="hidden" name="jorcod" id="jorcod" value="'.$row['jorcod'].'">
                     <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-trash-o"></i></a></form>
                  </div>
                </li>';
                 				
 			}
 			
 		}

 	}

 	public function InsertJornada($jorTitulo, $jorDia, $jorHoraInicial, $jorHoraFinal, $jorRefInicial, $jorRefFinal, $jorHoraExt, $jorDescanso, $jorInterInicial, $jorInterFinal, $jorEspInicial, $jorEspFinal, $motorista_motcod, $cidade_cidcodinicial, $cidade_cidcodfinal, $veiculo_veicod){ //$jorTitulo, $jorDia, $jorHoraInicial, $jorHoraFinal, $jorRefInicial, $jorRefFinal, $jorHoraExt, $jorDescanso, $jorInterInicial, $jorInterFinal, $jorEspInicial, $jorEspFinal, $motorista_motcod, $cidade_cidcodinicial, $cidade_cidcodfinal, $veiculo_veicod

    $this->query = "INSERT INTO `jornada`(`jorcod`, `jortitulo`, `jordia`, `jorhorainicial`, `jorhorafinal`, `jorerefinicial`, `jorereffinal`,`jorhoraext`, `jordescanso`, `jorinterinicial`, `jorinterfinal`, `jorespinicial`, `jorespfinal`, `motorista_motcod`, `cidade_cidcodinicial`, `cidade_cidcodfinal`, `veiculo_veicod`, `usuario_usucod`) VALUES (NULL, '$jorTitulo', '$jorDia', '$jorHoraInicial', '$jorHoraFinal', '$jorRefInicial', '$jorRefFinal', '$jorHoraExt', '$jorDescanso', '$jorInterInicial', '$jorInterFinal', '$jorEspInicial', '$jorEspFinal', '$motorista_motcod','$cidade_cidcodinicial','$cidade_cidcodfinal','$veiculo_veicod')";
 		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

 			header('Location: ../../views/jornada/index.php?alert=1');
 		}else{
 			header('Location: ../../views/jornada/index.php?alert=0');
 		}
 	}//InsertItens

  public function editJornada($value) {
    $this->query = "SELECT *FROM `jornada` WHERE `jorcod` = '$value'";
    $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

    if($row = mysqli_fetch_array($this->result)){
//
      $motcod = $row['motcod'];
      $motNome = $row['motnome'];
      $motRua = $row['motrua'];
      $motBairro = $row['motbairro'];
      $motCidade = $row['motcidade'];
      $motEstado = $row['motestado'];
      $motEmail = $row['motemail'];
      $motSenha = $row['motsenha'];
      $motFone = $row['motfone'];
      $motCpf = $row['motcpf'];
      $motRg = $row['motrg'];
      $motCnh = $row['motcnh'];
      $motDtAdmissao = $row['motdtadmissao'];
      $motDtAfast = $row['motdtafast'];
      $motSituacao = $row['motsituacao'];
      $regrasjornada_rjocod = $row['regrasjornada_rjocod'];
        
      return $resp = array('Itens' => ['motcod' => $motcod,
      'motnome'   => $motNome,
      'motrua' => $motRua,
      'motbairro' => $motBairro,
      'motcidade'   => $motCidade,
      'motestado' => $motEstado,
      'motemail' => $motEmail,
      'motsenha'   => $motSenha,
      'motfone' => $motFone,
      'motcpf' => $motCpf,
      'motrg'   => $motRg,
      'motcnh' => $motCnh,
      'motdtadmissao' => $motDtAdmissao,
      'motdtafast'   => $motDtAfast,
      'motsituacao' => $motSituacao,
      'regrasjornada_rjocod' => $regrasjornada_rjocod] , ); 
     }
    
  }

  public function updateJornada($jorCod, $jorTitulo, $jorDia, $jorHoraInicial, $jorHoraFinal, $jorRefInicial, $jorRefFinal, $jorHoraExt, $jorDescanso, $jorInterInicial, $jorInterFinal, $jorEspInicial, $jorEspFinal, $motorista_motcod, $cidade_cidcodinicial, $cidade_cidcodfinal, $veiculo_veicod) {
    $this->query = "UPDATE `jornada` SET 
                    `motnome`= '$motNome',
                    `motrua`='$motRua',
                    `motbairro`='$motBairro',
                    `motcidade`= '$motCidade',
                    `motestado`='$motEstado',
                    `motemail`='$motEmail',
                    `motsenha`= '$motSenha',
                    `motfone`='$motFone',
                    `motcpf`='$motCpf',
                    `motrg`= '$motRg',
                    `motcnh`='$motCnh',
                    `motdtadmissao`='$motDtAdmissao',
                    `motdtafast`= '$motDtAfast',
                    `motsituacao`='$motSituacao',
                    `regrasjornada_rjocod`='$regrasjornada_rjocod',
                    WHERE `motcod`= '$motCod'";

    if ($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
      header('Location: ../../views/jornada/index.php?alert=1');
    } else {
      header('Location: ../../views/jornada/index.php?alert=0');
    }

  }

 }

 $jornadas = new Jornada;