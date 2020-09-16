<?php

//Conexão com banco de dados

class Connect
{

    var $localhost = "localhost";
    var $root = "root";
    var $passwd = "";
    var $database = "controledeestoque";
    var $SQL;

    public function __construct()
    {
        $this->SQL = mysqli_connect($this->localhost, $this->root, $this->passwd);
        mysqli_select_db($this->SQL, $this->database);

        if(!$this->SQL) {
            die("Conexão com o banco de dados falhou:" . mysqli_connect_error($this->SQL));
        }
    }

    function login($username, $password) {

        $this->query = "SELECT * FROM  `user` WHERE  `username` = '$username'";
        $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
        $this->total = mysqli_num_rows($this->result);

        if($this->total) {
            
            $this->dados = mysqli_fetch_array($this->result);

            if(!strcmp($password, $this->dados['Password'])) {

                $_SESSION['idUsuario'] = $this->dados['idUser'];
                $_SESSION['usuario'] = $this->dados['Username'];
                $_SESSION['perm'] = $this->dados['Permissao'];

                header("Location: ../pages/index-teste.php");
            } else {
                header("Location: ../login-teste.php?alert=2");
            }
        } else {
            header("Location: ../login-teste.php?alert=5");
        }
    }
}

$connect = new Connect;
