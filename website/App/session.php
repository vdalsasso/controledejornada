<?php
session_start();

$username = $_POST['usunome'];
$senha = md5($_POST['ususenha']);

if($username == NULL || $senha == NULL) {

    echo "<script>alert('Você deve digitar seu nome e senha');</script>";
    echo "<script> window.location.href='.../login.php'</script>";
    exit;
} else {
    require_once 'Models/connect.php';

    $connect->login($username, $senha);
} 

?>