<?php
require_once '../auth.php';
require_once '../Models/produto.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$nomeProduto = $_POST['nomeproduto'];

$usucod = $_POST['usucod'];

if($usucod == $usucod && $nomeProduto != NULL){

$produtos->InsertProd($nomeProduto, $usucod);
}else{
	header('Location: ../../views/prod/index.php?alert=0');
 }
 }else{
	header('Location: ../../views/prod/index.php');
}
