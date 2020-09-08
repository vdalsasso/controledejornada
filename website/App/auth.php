<?php
session_start();
//require_once 'connect.php';

if(!isset($_SESSION["idUsuario"]) || !isset($_SESSION["username"])){
    header('Location: ../login.php');
} else {

    $idUsuario = $_SESSION["idUsuario"];
    $username = $_SESSION["username"];
    $perm = $_SESSION["perm"];
}
?>