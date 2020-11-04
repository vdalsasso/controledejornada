<?php
require_once '../../App/auth.php';
require_once '../../App/Models/usuario.class.php';

	if( isset( $_POST['usuativo'])){

		$id = $_POST['id'];
		$value = $_POST['usuativo'];
		$usuarios->UsuarioAtivo($value, $id);

	}
	