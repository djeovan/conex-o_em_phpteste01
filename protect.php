<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['nome'])) {
    die ("Você não pode acessar essa página sem estar logado.<br> <p><a href=\"cadastro.php\">cadastro</a></p>");
    require('like.php');
}