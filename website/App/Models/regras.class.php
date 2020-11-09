<?php

/*
 Class Motorista
*/

 require_once 'connect.php';

class Regras extends Connect
 {
 	
 	public function index()
 	{
 		$this->query = "SELECT * FROM `regrasjornada`";
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
                  <form class="badge" name="ativ'.$row['rjocod'].'" action="action.php" method="post">
                  <input type="hidden" name="id" id="id" value="'.$row['rjocod'].'">
                  <input type="checkbox" id="status" name="status"</form>
                  <!-- todo text -->
                  <span class="badge left">'.$row['rjocod'].'</span> '.$row['rjonome'].'</span>

                  <!-- Emphasis label -->
                  
                  <!-- General tools such as edit or delete-->
                  <div class="tools right">
                    
                    <form class="right" name="editRegras'.$row['rjocod'].'" action="editRegras.php" method="post">
                      <input type="hidden" name="rjocod" id="rjocod" value="'.$row['rjocod'].'">
                      <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-edit"></i></a></form>
                    <form class="right" name="delRegras'.$row['rjocod'].'" action="delRegras.php" method="post">
                    <input type="hidden" name="rjocod" id="rjocod" value="'.$row['rjocod'].'">
                     <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-trash-o"></i></a></form>
                  </div>
                </li>';
                 				
 			}
 			
 		}

 	}

 	public function InsertRegras($rjoNome, $rjoTrabInint, $rjoDesc, $rjoDescInint, $rjoRefeicao, $rjoMaxDia, $rjoExtra, $RjoEspRep, $motCpf, $motRg, $motCnh, $motDtAdmissao, $motDtAfast, $motSituacao){

    $this->query = "INSERT INTO `motorista`(`motcod`, `motnome`, `motrua`, `motbairro`, `motcidade`, `motestado`, `motemail`, `motsenha`, `motfone`, `motcpf`, `motrg`, `motcnh`, `motdtadmissao`, `motdtafast`, `motsituacao`) VALUES (NULL, '$motNome', '$motRua', '$motBairro', '$motCidade', '$motEstado', '$motEmail', '$motSenha', '$motFone', '$motCpf', '$motRg', '$motCnh', '$motDtAdmissao', '$motDtAfast','$motSituacao')";
 		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

 			header('Location: ../../views/motorista/index.php?alert=1');
 		}else{
 			header('Location: ../../views/motorista/index.php?alert=0');
 		}
 	}//InsertItens

  public function editMotorista($value)
  {
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
      'motsituacao' => $motSituacao] , ); 
     }
    
  }

  public function updateMotorista($motCod, $motNome, $motRua, $motBairro, $motCidade, $motEstado, $motEmail, $motSenha, $motFone, $motCpf, $motRg, $motCnh, $motDtAdmissao, $motDtAfast, $motSituacao)
  {
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
                    WHERE `motcod`= '$motCod'";

    if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

      header('Location: ../../views/motorista/index.php?alert=1');
    }else{
      header('Location: ../../views/motorista/index.php?alert=0');
    }

  }

 }

 $motoristas = new Motorista;