<?php
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

if($username == NULL || $password == NULL) {

    echo "<script>alert('Você deve digitar seu email e senha');</script>";
    echo "<script> window.location.href='.../login-teste.php'</script>";
    exit;
} else {
    require_once 'Models/connect-teste.php';

    $connect->login($username, $password);
}

?>