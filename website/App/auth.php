<?php
session_start();
//require_once 'connect.php';
require_once ''.__DIR__.'\models\connect.php';

if(!isset($_SESSION["idUsuario"]) || !isset($_SESSION["usuario"])){
    header('Location: ../login.php');
} else {

    $idUsuario = $_SESSION["idUsuario"];
    $email = $_SESSION["email"];
    $perm = $_SESSION["perm"];
}
?>