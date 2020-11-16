<?php
require_once '../auth.php';
require_once '../Models/jornada.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$jorTitulo = $_POST['jortitulo'];
$jorDia = $_POST['jordia'];
$jorHoraInicial = $_POST['jorhorainicial'];
$jorHoraFinal = $_POST['jorhorafinal'];
$jorRefInicial = $_POST['jorrefinicial'];
$jorRefFinal = $_POST['jorreffinal'];
$jorHoraExt = $_POST['jorhoraext'];
$jorDescanso = $_POST['jordescanso'];
$jorInterInicial = $_POST['jorinterinicial'];
$jorInterFinal = $_POST['jorinterfinal'];
$jorEspInicial = $_POST['jorespinicial'];
$jorEspFinal = $_POST['jorespfinal'];
$motorista_motcod = $_POST['motcod'];
$cidade_cidcodinicial = $_POST['cidcodinicial'];
$cidade_cidcodfinal = $_POST['cidcodfinal'];
$veiculo_veicod = $_POST['veicod'];


//$jorCod, $jorTitulo, $jorDia, $jorHoraInicial, $jorHoraFinal, $jorRefInicial, $jorRefFinal, $jorHoraExt, $jorDescanso, 
//$jorInterInicial, $jorInterFinal, $jorEspInicial, $jorEspFinal, $motorista_motcod, $cidade_cidcodinicial, $cidade_cidcodfinal, 
//$veiculo_veicod


if($jorTitulo != NULL){
	if(isset($_POST['jorcod'])){

		$motCod = $_POST['jorcod'];
		$jornadas->editJornada($jorCod, $jorTitulo, $jorDia, $jorHoraInicial, $jorHoraFinal, $jorRefInicial, $jorRefFinal, $jorHoraExt, $jorDescanso, $jorInterInicial, $jorInterFinal, $jorEspInicial, $jorEspFinal, $motorista_motcod, $cidade_cidcodinicial, $cidade_cidcodfinal, $veiculo_veicod);
	}else{
		$jornadas->InsertJornada($jorTitulo, $jorDia, $jorHoraInicial, $jorHoraFinal, $jorRefInicial, $jorRefFinal, $jorHoraExt, $jorDescanso, $jorInterInicial, $jorInterFinal, $jorEspInicial, $jorEspFinal, $motorista_motcod, $cidade_cidcodinicial, $cidade_cidcodfinal, $veiculo_veicod);
	}

}else{
	header('Location: ../../views/jornada/index.php?alert=3');
 }
}else{
	header('Location: ../../views/jornada/index.php');
}