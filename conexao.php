<?php
$usuario = 'root';
$database = 'sistemadecadastro';
$senha = '';
$host = 'localhost';

    $mysqli = new mysqli ($host, $usuario, $senha, $database);

    if ($mysqli->error) {
        die( "Falha ao conectar ao servido: " .$mysqli->error);
    }

?>