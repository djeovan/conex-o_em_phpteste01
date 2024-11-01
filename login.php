<?php
include('conexao.php');


if(isset($_POST['emailAtualizado']) || isset($_POST['senhaAtualizada'])){
    if (strlen($_POST['emailAtualizado']) == 0) {
        echo "Seu email";
    }elseif(strlen($_POST['senhaAtualizada']) == 0){
        echo "Seu Email";
    }else {
        $email = $mysqli -> real_escape_string($_POST['emailAtualizado']);
        $senha = $mysqli -> real_escape_string($_POST['senhaAtualizada']);
        //$telefone = $mysqli -> real_escape_string($_POST['telefone']);
        


        $banco= "SELECT * FROM cadastro WHERE email = '$email' AND senha = '$senha' ";
        $sql_query = $mysqli->query($banco) or die("Falha na execução do código: ". $mysqli->error);
          
        $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {
        $usuario = $sql_query->fetch_assoc();
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['nome'] = $usuario['nome'];
        sleep(1);
        echo "estamos te redirecionado a página de acesso";
        header("Location:like.php");

        //problema!

    }else{
        echo "falha ao logar";
    }
        
    };


};

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>login/senha</h1>
    <form action="" method="post">
        seu email:<input type = "email" name="emailAtualizado">
        sua senha:<input type ="password" name="senhaAtualizada">
        <input type="submit" value="acessar">
        <h4><a href="cadastro.php">não é logado, e deseja se cadastrar?</a></h4>
    </form>
</body>
</html>