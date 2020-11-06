<?php
require_once '../auth.php';
require_once '../Models/veiculo.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

	$veiPlaca = $_POST['veiplaca'];
	$veiAno = $_POST['veiano'];
	$veiModelo = $_POST['veimodelo'];
	$tpveiculo_tpvcod = $_POST['tpvcod'];

	//usucod = $_POST['usucod'];

	if($veiModelo != NULL){

		if(isset($_POST['veicod'])){
		
			$veiCod = $_POST['veicod'];
			$veiculos->updateVeiculo($veiCod, $veiPlaca, $veiAno, $veiModelo, $tpveiculo_tpvcod);
		}else{
			$veiculos->insertVeiculo($veiPlaca, $veiAno, $veiModelo, $tpveiculo_tpvcod);
		}
	}else{
		header('Location: ../../views/veiculo/index.php?alert=3');
	}
}else{
	header('Location: ../../views/veiculo/index.php');
}