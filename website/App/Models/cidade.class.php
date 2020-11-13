<?php

/*
 Class cidade
*/

 require_once 'connect.php';

 class Cidade extends Connect
 {
 	
 	public function index()
 	{
 		$this->query = "SELECT * FROM `cidade`";
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
                  <input type="checkbox" value="'.$row['cidcod'].'">
                  <!-- todo text -->
                  <span class="text"><span class="badge left">'.$row['cidcod'].'</span> '.$row['cidnome'].'</span>
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

 	public function listCidade($value = NULL){

 		$this->query = "SELECT * FROM `cidade`";
 		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

 		if($this->result){
 		
 			while ($row = mysqli_fetch_array($this->result)) {
       			if($value == $row['cidcod']){ 
          			$selected = "selected";//
        		}else{
          			$selected = "";
        		}
 				echo '<option value="'.$row['cidcod'].'" '.$selected.' >'.$row['cidnome'].'</option>';
 			}
 		}	
 	}

 	public function InsertCidade($cidNome){

 		$this->query = "INSERT INTO `cidade`(`cidcod`, `cidnome`) VALUES (NULL,'$cidNome')";
 		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

 			header('Location: ../../views/cidade/index.php?alert=1');
 		}else{
 			header('Location: ../../views/cidade/index.php?alert=0');
 		}
 	}
 }

 $cidades = new Cidade;