<?php
include ('conexao.php');  

if(isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['senha'])){
    if (strlen($_POST['nome']) == 0) {
        echo "Seu Nome";
    }elseif(strlen($_POST['email']) == 0){
        echo "Seu Email";
    }elseif (strlen($_POST['senha'])== 0 ) {
        echo "Sua Senha";
    }else {
        $nome = $mysqli -> real_escape_string($_POST['nome']);
        $email = $mysqli -> real_escape_string($_POST['email']);
        $senha = $mysqli -> real_escape_string($_POST['senha']);
        //$telefone = $mysqli -> real_escape_string($_POST['telefone']);
        


        $banco= "INSERT INTO  cadastro (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        //$slq_query = $sqli->query($banco) or die ("Falha na execução do código SLQ:" .$mysqli->error);
        
        if (mysqli_query($mysqli, $banco)){

            if (isset($nome)) {
                echo "novo cadastro criada com sucesso";     
            }
            

          header("Location:login.php");
        }else {
            echo "Error:" .$banco. "<br>" . mysqli_error($banco);
        }
        
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Insira seu Nome:<input type = "text" name= "nome">
        Insira seu email:<input type = "email" name= "email">
        Insira sua senha:<input type = "password" name= "senha">
        <!--Insira seu telefone:<input type = "tel" placeholder="(xx) xxxxx-xxxx" name= "telefone">-->
        <input type = "submit" value = "cadastrar">
        <h4><a href="login.php">logar</a></h4>
    </form>
 
</body>
</html>