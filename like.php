<?php
include('conexao.php');
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['nome'])) {
    echo ("Você não pode acessar essa página sem estar logado.<br> <p><a href=\"cadastro.php\">cadastro</a></p>");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <main>
    <div class= "exemplo">
        <div class= "imagem">
            <img style=" height:200px;" src = "./imagem/oip.jpeg">
        </div>
        <form action="" method="post">
            <input type = "submit" value="like">


        </form>
        <h5>
        <a href="destruir.php">deseja sair?</a>
        </5>
    </div>

    </main>
</body>
</html>