<?php

 if (isset($_POST['nome'])) {

    $banco= "SELECT * FROM cadastro WHERE nome = $nome ";
    $sql_query = $mysqli->query($banco) or die("Falha na execução do código: ". $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {
        $usuario = $sql_query->fetch_assoc();
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['nome'] = $usuario['nome'];
        header("Location/like.php");

    }else{
        echo "falha ao logar";
    }
   }

   header("location:like.php");

   sleep(2);
   echo "estamos te redirecionado a página de acesso";