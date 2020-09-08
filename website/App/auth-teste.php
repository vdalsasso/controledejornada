<?php
session_start();
//require_once 'connect-teste.php';
require_once ''.__DIR__.'\models\connect-teste.php';

if(!isset($_SESSION["idUsuario"]) || !isset($_SESSION["usuario"])){
    header('Location: ../login-teste.php');
} else {

    $idUser = $_SESSION["idUsuario"];
    $user = $_SESSION["usuario"];
    $perm = $_SESSION["perm"];
}