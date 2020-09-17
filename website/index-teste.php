<?php
require_once 'App/auth-teste.php';

if($usuario && $perm) {

    header('Location: views/index-teste.php');
} else {
    header ('Location: login-teste.php');
}

?>