<?php

/*
 Class tpveiculo
*/

 require_once 'connect.php';

 class TpVeiculo extends Connect
 {
 	
 	public function index()
 	{
 		$this->query = "SELECT * FROM `tpveiculo`";
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
                  <input type="checkbox" value="'.$row['tpvcod'].'">
                  <!-- todo text -->
                  <span class="text"><span class="badge left">'.$row['tpvcod'].'</span> '.$row['tpvnome'].'</span>
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

 	public function listTpVeiculo($value = NULL){

 		$this->query = "SELECT * FROM `tpveiculo`";
 		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

 		if($this->result){
 		
 			while ($row = mysqli_fetch_array($this->result)) {
       			if($value == $row['tpvcod']){ 
          			$selected = "selected";
        		}else{
          			$selected = "";
        		}
 				echo '<option value="'.$row['tpvcod'].'" '.$selected.' >'.$row['tpvnome'].'</option>';
 			}
 		}	
 	}

 }

 $tpVeiculo = new TpVeiculo;