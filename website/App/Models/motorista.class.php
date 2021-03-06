<?php

/*
 Class Motorista
*/

 require_once 'connect.php';

class Motorista extends Connect {
 	
 	public function index() {
 		$this->query = "SELECT * FROM `motorista`";
 		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

 		if($this->result){
 		
 			while ($row = mysqli_fetch_array($this->result)) {
                  echo '<li>
                  <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="'.$row['motcod'].'">

                  <!-- todo text -->
                  <span class="badge left">'.$row['motcod'].'</span> '.$row['motnome'].'</span>
                ';
                /*
                  <div class="tools right">
                    
                    <form class="right" name="editMotorista'.$row['motcod'].'" action="editMotorista.php" method="post">
                      <input type="hidden" name="motcod" id="motcod" value="'.$row['motcod'].'">
                      <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-edit"></i></a></form>
                    <form class="right" name="delMotorista'.$row['motcod'].'" action="delMotorista.php" method="post">
                    <input type="hidden" name="motcod" id="motcod" value="'.$row['motcod'].'">
                     <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-trash-o"></i></a></form>
                  </div>
*/              echo '
                <div class="tools">
                  <a href="editMotorista.php?id='.$row['motcod'].'"<i class="fa fa-edit"></i></a>
                  <i class="fa fa-trash-o"></i>
                </div>
                </li>';
                 				
 			}
 			
 		}

 	}

 	public function InsertMotorista($motNome, $motRua, $motBairro, $motCidade, $motEstado, $motEmail, $motSenha, $motFone, $motCpf, $motRg, $motCnh, $motDtAdmissao, $motDtAfast, $motSituacao, $regrasjornada_rjocod){

    $this->query = "INSERT INTO `motorista`(`motcod`, `motnome`, `motrua`, `motbairro`, `motcidade`, `motestado`, `motemail`, `motsenha`, `motfone`, `motcpf`, `motrg`, `motcnh`, `motdtadmissao`, `motdtafast`, `motsituacao`, `regrasjornada_rjocod`) VALUES (NULL, '$motNome', '$motRua', '$motBairro', '$motCidade', '$motEstado', '$motEmail', '$motSenha', '$motFone', '$motCpf', '$motRg', '$motCnh', '$motDtAdmissao', '$motDtAfast','$motSituacao','$regrasjornada_rjocod')";
 		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

 			header('Location: ../../views/motorista/index.php?alert=1');
 		}else{
 			header('Location: ../../views/motorista/index.php?alert=0');
 		}
 	}//InsertItens

  public function editMotorista($value) {
    $this->query = "SELECT *FROM `motorista` WHERE `motcod` = '$value'";
    $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

    if($row = mysqli_fetch_array($this->result)){

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

  public function updateMotorista($motCod, $motNome, $motRua, $motBairro, $motCidade, $motEstado, $motEmail, $motSenha, $motFone, $motCpf, $motRg, $motCnh, $motDtAdmissao, $motDtAfast, $motSituacao, $regrasjornada_rjocod) {
    $this->query = "UPDATE `motorista` SET 
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
      header('Location: ../../views/motorista/index.php?alert=1');
    } else {
      header('Location: ../../views/motorista/index.php?alert=0');
    }

  }

  public function listMotorista($value = NULL){

    $this->query = "SELECT * FROM `motorista`";
    $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

    if($this->result){
    
      while ($row = mysqli_fetch_array($this->result)) {
            if($value == $row['motcod']){ 
               $selected = "selected";
           }else{
               $selected = "";
           }
        echo '<option value="'.$row['motcod'].'" '.$selected.' >'.$row['motnome'].'</option>';
      }
    }	
  }

 }

 $motoristas = new Motorista;