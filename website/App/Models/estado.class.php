<?php

/*
 Class cidade
*/

 require_once 'connect.php';

 class Cidade extends Connect
 {
 	
 	public function index()
 	{
 		$this->query = "SELECT * FROM `estado`";
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
                  <input type="checkbox" value="'.$row['estcod'].'">
                  <!-- todo text -->
                  <span class="text"><span class="badge left">'.$row['estcod'].'</span> '.$row['estnome'].'</span>
                  <!-- Emphasis label -->
                  <!-- <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small> -->
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>'; 				
 			}
 		}
 	}

 	public function listEstado($value = NULL){

 		$this->query = "SELECT * FROM `estado`";
 		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

 		if($this->result){
 		
 			while ($row = mysqli_fetch_array($this->result)) {
       			if($value == $row['estcod']){ 
          			$selected = "selected";//
        		}else{
          			$selected = "";
        		}
 				echo '<option value="'.$row['estcod'].'" '.$selected.' >'.$row['estnome'].'</option>';
 			}
 		}	
 	}

 	public function InsertEstado($estNome, $estSigla){

 		$this->query = "INSERT INTO `estado`(`estcod`, `estnome`,`estsigla`) VALUES (NULL,'$estNome','$estSigla')";
 		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

 			header('Location: ../../views/estado/index.php?alert=1');
 		}else{
 			header('Location: ../../views/estado/index.php?alert=0');
 		}
 	}
 }

 $estados = new Estado;