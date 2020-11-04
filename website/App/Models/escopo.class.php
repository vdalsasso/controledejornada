<?php

/*
 Class produtos
*/

 require_once 'connect.php';

 class Escopo extends Connect
 {
 	
 	public function index()
 	{
 		$this->query = "SELECT *FROM `escopo`";
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
                  <input type="checkbox" value="'.$row['esccod'].'">
                  <!-- todo text -->
                  <span class="text"><span class="badge left">'.$row['esccod'].'</span> '.$row['escnome'].'</span>
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

 	public function listEscopo($value = NULL){

 		$this->query = "SELECT *FROM `escopo`";
 		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

 		if($this->result){
 		
 			while ($row = mysqli_fetch_array($this->result)) {
       			if($value == $row['esccod']){ 
          			$selected = "selected";
        		}else{
          			$selected = "";
        		}
 				echo '<option value="'.$row['esccod'].'" '.$selected.' >'.$row['escnome'].'</option>';
 			}
 		}	
 	}

 	public function InsertEscopo($escNome){

 		$this->query = "INSERT INTO `escopo`(`esccod`, `escnome`) VALUES (NULL,'$escNome')";
 		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

 			header('Location: ../../views/escopo/index.php?alert=1');
 		}else{
 			header('Location: ../../views/escopo/index.php?alert=0');
 		}
 	}
 }

 $escopo = new Escopo;