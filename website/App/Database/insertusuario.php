<?php
require_once '../auth.php';
require_once '../Models/usuario.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$usuUsername = $_POST['usuusername'];
$usuNome = $_POST['usunome'];
$usuEmail = $_POST['usuemail'];
$usuSenha = $_POST['ususenha'];
$usuImagem = $_POST['usuimagem'];
$usuFone = $_POST['usufone'];
$usuPermissao = $_POST['usupermissao'];
$escopo_esccod = $_POST['esccod'];

//$iduser = $_POST['iduser'];

if($usuUsername != NULL){
	if(isset($_POST['usucod'])){

		$usuCod = $_POST['usucod'];
		$usuarios->editUsuario($usuCod, $usuUsername, $usuEmail, $usuSenha, $usuImagem, $usuFone, $usuPermissao, $escopo_esccod);
	}else{
		$usuarios->InsertUsuario($usuUsername, $usuNome, $usuEmail, $usuSenha, $usuImagem, $usuFone, $usuPermissao, $escopo_esccod);
	}

}else{
	header('Location: ../../views/usuario/index.php?alert=3');
 }
}else{
	header('Location: ../../views/usuario/index.php');
}