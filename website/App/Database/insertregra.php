<?php
require_once '../auth.php';
require_once '../Models/regras.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$rjoNome = $_POST['rjonome'];
$rjoTrabInint = $_POST['rjotrabinint'];
$rjoDesc = $_POST['rjodesc'];
$rjoDescInint = $_POST['rjodescinint'];
$rjoRefeicao = $_POST['rjorefeicao'];
$rjoMaxDia = $_POST['rjomaxdia'];
$rjoExtra = $_POST['rjoextra'];
$rjoEspRep = $_POST['rjoesprep'];
$rjoDescInter = $_POST['rjodescinter'];

//$iduser = $_POST['iduser'];

if($rjoNome != NULL){
	if(isset($_POST['rjocod'])){

		$rjoCod = $_POST['rjoCod'];
		$regras->editRegras($rjoCod, $rjoNome, $rjoTrabInint, $rjoDesc, $rjoDescInint, $rjoRefeicao, $rjoMaxDia, $rjoExtra, $rjoEspRep, $rjoDescInter);
	}else{
		$regras->InsertRegras($rjoNome, $rjoTrabInint, $rjoDesc, $rjoDescInint, $rjoRefeicao, $rjoMaxDia, $rjoExtra, $rjoEspRep, $rjoDescInter);
	}

}else{
	header('Location: ../../views/regras/index.php?alert=3');
 }
}else{
	header('Location: ../../views/regras/index.php');
}