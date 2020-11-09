<?php
require_once '../auth.php';
require_once '../Models/motorista.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$motNome = $_POST['motnome'];
$motRua = $_POST['motrua'];
$motBairro = $_POST['motbairro'];
$motCidade = $_POST['motcidade'];
$motEstado = $_POST['motestado'];
$motEmail = $_POST['motemail'];
$motSenha = $_POST['motsenha'];
$motFone = $_POST['motfone'];
$motCpf = $_POST['motcpf'];
$motCnh = $_POST['motcnh'];
$motDtAdmissao = $_POST['motdtadmissao'];
$motDtAfast = $_POST['motdtafast'];
$motSituacao = $_POST['motsituacao'];

if($motNome != NULL){
	if(isset($_POST['motcod'])){

		$motCod = $_POST['motcod'];
		$motoristas->editMotorista($motCod, $motNome, $motRua, $motBairro, $motCidade, $motEstado, $motEmail, $motSenha, $motFone, $motCpf, $motRg, $motCnh, $motDtAdmissao, $motDtAfast, $motSituacao);
	}else{
		$motoristas->InsertMotorista($motNome, $motRua, $motBairro, $motCidade, $motEstado, $motEmail, $motSenha, $motFone, $motCpf, $motRg, $motCnh, $motDtAdmissao, $motDtAfast, $motSituacao);
	}

}else{
	header('Location: ../../views/motorista/index.php?alert=3');
 }
}else{
	header('Location: ../../views/motorista/index.php');
}