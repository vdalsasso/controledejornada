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
   
   public function listRegras($value = NULL){

    $this->query = "SELECT * FROM `regrasjornada`";
    $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

    if($this->result){
    
      while ($row = mysqli_fetch_array($this->result)) {
            if($value == $row['rjocod']){ 
               $selected = "selected";
           }else{
               $selected = "";
           }
        echo '<option value="'.$row['rjocod'].'" '.$selected.' >'.$row['rjonome'].'</option>';
      }
    }	
  }

 	public function InsertRegras($rjoNome, $rjoTrabInint, $rjoDesc, $rjoDescInint, $rjoRefeicao, $rjoMaxDia, $rjoExtra, $rjoEspRep, $rjoDescInter){

    $this->query = "INSERT INTO `regrasjornada`(`rjocod`, `rjonome`, `rjoTrabInint`, `rjoDesc`, `rjoDescInint`, `rjoRefeicao`, `rjoMaxDia`, `rjoExtra`, `rjoEspRep`, `rjoDescinter`) VALUES (NULL, '$rjoNome', '$rjoTrabInint', '$rjoDesc', '$rjoDescInint', '$rjoRefeicao', '$rjoMaxDia', '$rjoExtra', '$rjoEspRep', '$rjoDescInter')";
 		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

 			header('Location: ../../views/regras/index.php?alert=1');
 		}else{
 			header('Location: ../../views/regras/index.php?alert=0');
 		}
 	}

  public function editRegras($value)
  {
    $this->query = "SELECT * FROM `regrasjornada` WHERE `rjocod` = '$value'";
    $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

    if($row = mysqli_fetch_array($this->result)){

      $rjocod = $row['rjocod'];
      $rjoNome = $row['rjonome'];
      $rjoTrabInint = $row['rjotrabinint'];
      $rjoDesc = $row['rjodesc'];
      $rjoDescInint = $row['rjodescinint'];
      $rjoRefeicao = $row['rjorefeicao'];
      $rjoMaxDia = $row['rjomaxdia'];
      $rjoExtra = $row['rjoextra'];
      $rjoEspRep = $row['rjoesprep'];
      $rjoDescInter = $row['rjodescinter'];

      return $resp = array('Itens' => ['rjocod' => $rjocod,
      'rjonome'   => $rjoNome,
      'rjotrabinint' => $rjoTrabInint,
      'rjodesc' => $rjoDesc,
      'rjodescinint'   => $rjoDescInint,
      'rjorefeicao' => $rjoRefeicao,
      'rjomaxdia' => $rjoMaxDia,
      'rjoextra'   => $rjoExtra,
      'rjoesprep' => $rjoEspRep,
      'rjodescinter' => $rjoDescInter] , ); 
     }
    
  }

  public function updateRegras($rjocod, $rjoNome, $rjoTrabInint, $rjoDesc, $rjoDescInint, $rjoRefeicao, $rjoMaxDia, $rjoExtra, $rjoEspRep, $rjoDescInter)
  {
    $this->query = "UPDATE `regrasjornada` SET 
                    `rjonome`= '$rjoNome',
                    `rjotrabinint`='$rjoTrabInint',
                    `rjodesc`='$rjoDesc',
                    `rjodescinint`= '$rjoDescInint',
                    `rjorefeicao`='$rjoRefeicao',
                    `rjomaxdia`='$rjoMaxDia',
                    `rjoextra`= '$rjoExtra',
                    `rjoesprep`='$rjoEspRep',
                    `rjodescinter`='$rjoDescInter'";

    if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

      header('Location: ../../views/regras/index.php?alert=1');
    }else{
      header('Location: ../../views/regras/index.php?alert=0');
    }

  }

 }

 $regras = new Regras;