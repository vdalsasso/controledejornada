<?php
require_once '../auth.php';
require_once '../Models/escopo.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$escNome = $_POST['escnome'];

//$iduser = $_POST['iduser'];

if($escNome != NULL){
	$escopo->InsertEscopo($escNome);
	}else{
		header('Location: ../../views/escopo/index.php?alert=0');
 	}
 }else{
	header('Location: ../../views/escopo/index.php');
}