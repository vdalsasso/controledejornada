<?php

/*
 Class Usuario
*/

 require_once 'connect.php';

class Usuario extends Connect
 {
 	
 	public function index()
 	{
 		$this->query = "SELECT * FROM `usuario`";
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
                  <form class="badge" name="ativ'.$row['usucod'].'" action="action.php" method="post">
                  <input type="hidden" name="id" id="id" value="'.$row['usucod'].'">
                  <input type="hidden" name="status" id="status" value="'.$row['usuativo'].'">
                  <input type="checkbox" id="status" name="status" ';
                   if($row['usuativo'] == 1){ echo 'checked'; } 
                  echo ' value="'.$row['usuativo'].'" onclick="this.form.submit();"></form>
                  <!-- todo text -->
                  <span class="badge left">'.$row['usucod'].'</span> '.$row['usuusername'].'
                   - '.$row['usunome'].'
                  - '.$row['usuemail'].'
                  - '.$row['ususenha'].'
                  - '.$row['usuimagem'].'
                  - '.$row['usufone'].'
                  - '.$row['usupermissao'].'
                  - '.$row['usuativo'].'
                  - '.$row['escopo_esccod'].'</span>

                  <!-- Emphasis label -->
                  
                  <!-- General tools such as edit or delete-->
                  <div class="tools right">
                    
                    <form class="right" name="editUsuario'.$row['usucod'].'" action="editUsuario.php" method="post">
                      <input type="hidden" name="usucod" id="usucod" value="'.$row['usucod'].'">
                      <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-edit"></i></a></form>
                    <form class="right" name="delUsuario'.$row['usucod'].'" action="delUsuario.php" method="post">
                    <input type="hidden" name="usucod" id="usucod" value="'.$row['usucod'].'">
                     <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-trash-o"></i></a></form>
                  </div>
                </li>';
                 				
 			}
 			
 		}

 	}

 	public function InsertUsuario($usuUsername, $usuNome, $usuEmail, $usuSenha, $usuImagem, $usuFone, $usuPermissao, $escopo_esccod){

 		$this->query = "INSERT INTO `usuario`(`usucod`, `usuusername`, `usunome`, `usuemail`, `ususenha`, `usuimagem`, `usufone`, `usupermissao`, `usuativo`, `escopo_esccod`) VALUES (NULL, '$usuUsername', '$usuNome', '$usuEmail', '$usuSenha', '$usuImagem', '$usuFone', '$usuPermissao', 1, '$escopo_esccod')";
 		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

 			header('Location: ../../views/usuario/index.php?alert=1');
 		}else{
 			header('Location: ../../views/usuario/index.php?alert=0');
 		}
 	}//InsertItens

  public function editUsuario($value)
  {
    $this->query = "SELECT *FROM `usuario` WHERE `usucod` = '$value'";
    $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

    if($row = mysqli_fetch_array($this->result)){

        $usuCod = $row['usucod'];
        $usuUsername = $row['usuusername'];
        $usuNome = $row['usunome'];
        $usuEmail = $row['usuemail'];
        $usuSenha = $row['ususenha'];
        $usuImagem = $row['usuimagem'];
        $usuFone = $row['usufone'];
        $usuPermissao = $row['usupermissao'];
        $escopo_esccod = $row['escopo_esccod'];
        
       return $resp = array('Itens' => ['usucod' => $usuCod,
                      'usuusername'   => $usuUsername,
                      'usunome' => $usuNome,
                      'usuemail' => $usuEmail,
                      'ususenha' => $usuSenha,
                      'usuimagem' => $usuImagem,
                      'usufone' => $usuFone,
                      'usupermissao' => $usuPermissao,
                      'escopo_esccod' => $escopo_esccod] , );  
     }
    
  }

  public function updateUsuario($usuCod, $usuUsername, $usuNome, $usuEmail, $usuSenha, $usuImagem, $usuFone, $usuPermissao, $escopo_esccod)
  {
    $this->query = "UPDATE `usuario` SET 
                    `usuusername`= '$usuUsername',
                    `usunome`='$usuNome',
                    `usuemail`='$usuEmail',
                    `ususenha`='$usuSenha',
                    `usuimagem`='$usuImagem',
                    `usufone`='$usuFone',
                    `usupermissao`='$usuPermissao',
                    `escopo_esccod`='$escopo_esccod',
                    WHERE `usucod`= '$usuCod'";

    if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

      header('Location: ../../views/usuario/index.php?alert=1');
    }else{
      header('Location: ../../views/usuario/index.php?alert=0');
    }

  }


  public function UsuarioAtivo($value, $usuCod)
  {

    if($value == 0){ $v = 1; }else{ $v = 0; }

    $this->query = "UPDATE `usuario` SET `usuativo` = '$v' WHERE `usucod` = '$usuCod'";
    $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
       
    header('Location: ../../views/usuario/');
    /*

    $this->queryAtivo = "SELECT `Ativo` FROM `itens` WHERE `idItens`= '$idItens'";
    $this->resultAtivo = mysqli_query($this->SQL, $this->queryAtivo) or die ( mysqli_error($this->SQL));
      
      if($rep = mysqli_fetch_array($this->resultAtivo)) {
       $valueResp = $rep['Ativo'];
      } 

    switch ($valueResp) {
      case 1:
          $value = 0;
        break;
      case 0:
          $value = 1;
        break;      
     
   }

    
    $this->query = "UPDATE `itens` SET `Ativo` = '$value' WHERE `idItens`= '$idItens'";
    if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

      header('Location: ../../views/itens/index.php?alert=1');
    }else{
      header('Location: ../../views/itens/index.php?alert=0');
    }*/
  
  }//ItensAtivo



 }

 $usuarios = new Usuario;