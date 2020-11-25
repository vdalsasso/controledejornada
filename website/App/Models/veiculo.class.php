<?php

/*
 Class produtos
*/

 require_once 'connect.php';

class Veiculo extends Connect
 {
 	
 	public function index()
 	{
 		$this->query = "SELECT *FROM `veiculo`";
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
                  <form class="badge" name="ativ'.$row['veicod'].'" action="action.php" method="post">
                  <input type="hidden" name="id" id="id" value="'.$row['veicod'].'">
                  <!-- todo text -->
                  <span class="badge left">'.$row['veicod'].'</span> '.$row['veiplaca'].'
                   - '.$row['veiano'].'
                  - '.$row['veimodelo'].'
                  - '.$row['tpveiculo_tpvcod'].'</span>

                  <!-- Emphasis label -->
                  
                  <!-- General tools such as edit or delete-->
                  <div class="tools right">
                    
                    <form class="right" name="editVeiculo'.$row['veicod'].'" action="editVeiculo.php" method="post">
                      <input type="hidden" name="veicod" id="veicod" value="'.$row['veicod'].'">
                      <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-edit"></i></a></form>
                    <form class="right" name="delVeiculo'.$row['veicod'].'" action="delVeiculo.php" method="post">
                    <input type="hidden" name="veicod" id="veicod" value="'.$row['veicod'].'">
                     <a href="#" type="button" onclick="this.form.submit();"><i class="fa fa-trash-o"></i></a></form>
                  </div>
                </li>';
                 				
 			}
 			
 		}

 	}

 	public function insertVeiculo($veiPlaca, $veiAno, $veiModelo, $tpveiculo_tpvcod){

 		$this->query = "INSERT INTO `veiculo`(`veicod`, `veiplaca`, `veiano`, `veimodelo`, `tpveiculo_tpvcod`) VALUES (NULL, '$veiPlaca', '$veiAno', '$veiModelo', '$tpveiculo_tpvcod')";
 		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

 			header('Location: ../../views/veiculo/index.php?alert=1');
 		}else{
 			header('Location: ../../views/veiculo/index.php?alert=0');
 		}
 	}

  public function editVeiculo($value)
  {
    $this->query = "SELECT *FROM `veiculo` WHERE `veicod` = '$value'";
    $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

    if($row = mysqli_fetch_array($this->result)){

        $veicod = $row['veicod'];
        $veiPlaca = $row['veiplaca'];
        $veiAno = $row['veiano'];
        $veiModelo = $row['veimodelo'];
        $tpveiculo_tpvcod = $row['tpveiculo_tpvcod'];
        
       return $resp = array('Itens' => ['veicod' => $veicod,
                      'veiplaca'   => $veiPlaca,
                      'veiano' => $veiAno,
                      'veimodelo' => $veiModelo,
                      'tpveiculo_tpvcod' => $tpveiculo_tpvcod] , );  
     }
    
  }

  public function updateVeiculo($veiCod, $veiPlaca, $veiAno, $veiModelo, $tpveiculo_tpvcod)
  {
    $this->query = "UPDATE `veiculo` SET 
                    `veiplaca`= '$veiPlaca',
                    `veiano`='$veiAno',
                    `veimodelo`='$veiModelo',
                    `tpveiculo_tpvcod`='$tpveiculo_tpvcod',
                    WHERE `veicod`= '$veiCod'";

    if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

      header('Location: ../../views/veiculo/index.php?alert=1');
    }else{
      header('Location: ../../views/veiculo/index.php?alert=0');
    }

  }

  public function listVeiculo($value = NULL){

		$this->query = "SELECT * FROM `veiculo`";
		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

		if($this->result){
		
			while ($row = mysqli_fetch_array($this->result)) {
				  if($value == $row['veicod']){ 
					 $selected = "selected";
			   }else{
					 $selected = "";
			   }
				echo '<option value="'.$row['veicod'].'" '.$selected.' >'.$row['veimodelo'].'</option>';
			}
		}	
	}
 }

 $veiculos = new Veiculo;