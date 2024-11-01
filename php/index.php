<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

    <h1>email</h1>
    <input type="text" name= email>
    <h1>senha</h1>
    <input type="password" name= senha>
    <input type="submit" value= enviar>
    </form>

</body>
</html>

<?php

$usuario = $_POST["email"];
$senha = $_POST["senha"];

$conn = new mysqli("localhost", "root","", "db_database");

if($conn->connect_error){

    echo "Error:".$conn->connect_error;
}

$st = $conn->prepare("INSERT INTO funcionario (usuario, senha) VALUES(?, ?)");
$st ->bind_param("ss", $usuario, $senha);

$st->execute();

$login = "root";
$password = "";

$st->execute();
