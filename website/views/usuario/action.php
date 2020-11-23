<?php
require_once '../../App/auth.php';
require_once '../../App/Models/usuario.class.php';

	if( isset( $_POST['status'])){

		$id = $_POST['id'];
		$value = $_POST['status'];
		$usuarios->UsuarioAtivo($value, $id);

	}
	