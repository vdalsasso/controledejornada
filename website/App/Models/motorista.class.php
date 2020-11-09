<?php

/*
 Class produtos
*/

 require_once 'connect.php';

class Motorista extends Connect
 {
 	
 	public function index()
 	{
 		$this->query = "SELECT *FROM `motorista`";
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
                  <form class="badge" name="ativ'.$row['motcod'].'" action="action.php" method="post">
                  <input type="hidden" name="id" id="id" value="'.$row['motcod'].'">
                  <!-- todo text -->
                  <span class="badge left">'.$row['motcod'].'</span> '.$row['motnome'].'
                   - '.$row['motcidade'].'
                  - '.$row['motfone'].'</span>

                  <!-- Emphasis label -->
                  
                  <!-- General tools such as edit or delete-->
                  <div class="tools right">
                    
                    <form class="right" name="editMotorista'.$row['motcod'].'" action="editMotorista.php" method="post">
                      <input type="hidden" name="motcod" id="motcod" value="'.$row['motcod'].'">
                      <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-edit"></i></a></form>
                    <form class="right" name="delMotorista'.$row['motcod'].'" action="delMotorista.php" method="post">
                    <input type="hidden" name="motcod" id="motcod" value="'.$row['motcod'].'">
                     <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-trash-o"></i></a></form>
                  </div>
                </li>';
                 				
 			}
 			
 		}

 	}

 	public function insertMotorista($motNome, $motRua, $motBairro, $motCidade, $motEstado, $motEmail, $motSenha, $motFone, $motCpf, $motRg, $motCnh, $motDtAdmissao, $MotDtAfast, $motSituacao){

 		$this->query = "INSERT INTO `motorista`(`motcod`, `motrua`, `motbairro`, `motcidade`, `motestado`, `motemail`, `motsenha`, `motfone`, `motcpf`, `motrg`, `motcnh`, `motdtadmissao`, `motdtafast`, `motsituacao`) VALUES (NULL, '$motNome', '$motRua', '$motBairro', '$motCidade', '$motEstado', '$motEmail', '$motSenha', '$motFone', '$motCpf', '$motRg', '$motCnh', '$motDtAdmissao', '$motDtAdmissao', '$motSituacao')";
 		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

 			header('Location: ../../views/motorista/index.php?alert=1');
 		}else{
 			header('Location: ../../views/motorista/index.php?alert=0');
 		}
 	}

  public function editMotorista($value)
  {
    $this->query = "SELECT *FROM `motorista` WHERE `motcod` = '$value'";
    $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

    if($row = mysqli_fetch_array($this->result)){

        $motcod = $row['motcod'];
        $motNome = $row['veiplaca'];
        $motRua = $row['veiano'];
        $motBairro = $row['veimodelo'];
        $motCidade = $row['veiplaca'];
        $motEstado = $row['veiano'];
        $motEmail = $row['veimodelo'];
        $motSenha = $row['veiplaca'];
        $motFone = $row['veiano'];
        $motCpf = $row['veimodelo'];
        $motRg = $row['veiplaca'];
        $motCnh = $row['veiano'];
        $motDtAdmissao = $row['veimodelo'];
        $motDtAfast = $row['veiplaca'];
        $motSituacao = $row['veiano'];
        
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

  public function updateMotorista($motCod, $motNome, $motRua, $motBairro, $motCidade, $motEstado, $motEmail, $motSenha, $motFone, $motCpf, $motRg, $motCnh, $motDtAdmissao, $MotDtAfast, $motSituacao)
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