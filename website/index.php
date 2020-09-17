<?php
require_once 'App/auth.php';

if($usuario) {

    header('Location: views/');
} else {

    header('Location: login.php');
}

header('Location: login.php');
?>