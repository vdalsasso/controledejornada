<?php
require_once 'App/auth.php';

if($email && $perm) {

    header('Location: views/index.php');
} else {
    header ('Location: login.php');
}

?>