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

    function login($email, $senha) {

        $this->query = "SELECT * FROM  `usuario` WHERE  `usuemail` =  '$email'";
        $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
        $this->total = mysqli_num_rows($this->result);

        echo 'bagulho1';

        if($this->total) {
            
            $this->dados = mysqli_fetch_array($this->result);

            echo 'bagulho2';

            if(!strcmp($senha, $this->dados['Senha'])) {

                $_SESSION[ 'idUsuario'] = $this->dados[ 'usucod'];
                $_SESSION[ 'email'] = $this->dados[ 'usuemail'];
                $_SESSION[ 'perm'] = $this->dados[ 'Permissao'];

                echo 'bagulho3';

                header("Location: ../pages/");
            } else {
                header("Location: ../login.php?alert=2");
            }
        } else {
            header("Location: ../login.php?alert=1");
        }
    }
}


$connect = new Connect;
