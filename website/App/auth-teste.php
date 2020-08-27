<?php
session_start();
//require_once 'connect-teste.php';

if(!isset($_SESSION["idUsuario"]) || !isset($_SESSION["usuario"]){
    header('Location: ../login-teste.php');
} else {

    $idUsuario = $_SESSION["idUsuario"];
    $usuario = $_SESSION["usuario"];
    $perm = $_SESSION["perm"]
}