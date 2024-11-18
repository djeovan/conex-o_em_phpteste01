<?php
session_start();
include 'conexao.php';


    
//função para criar um usuário
if (isset($_POST['create_usuario'])) { 

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $senha = $_POST['senha'];

    if ($nome == "" || $nome == "" || $data_nascimento == "" || $senha =="") {
        $_SESSION['mensagem'] = 'Nenhum Usuário cadastrado, Verifique os dados e tente novamente';
                header("Location: index.php");
                exit;
    }else {

    
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) : '';

        $sql = "INSERT INTO usuarios( nome, email, data_nascimento, senha) VALUES ('$nome', '$email', '$data_nascimento', '$senha')";

        mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Usuário criado com sucesso';
            header("Location: index.php");
            exit;
        }else {
            $_SESSION['mensagem'] = 'nada foi enviado';
            header("Location: index.php");
            exit;
        }
    }
    
}
    
//função para editar um valor no banco de dados
if (isset($_POST['update_usuario'])) { 

    $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', data_nascimento = '$data_nascimento'";

        if(!empty($senha)){
            $sql .=", senha='".password_hash($senha,PASSWORD_DEFAULT). "'";
        }
        
        $sql .= "WHERE id = '$usuario_id'";
       
        mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) > 0){
            $_SESSION['mensagem'] = 'Usuário editado com sucesso';
            header("Location: index.php");
            exit;
        }else {
            $_SESSION['mensagem'] = 'Usuário não foi editado';
            header("Location: index.php");
            exit;
        }
        
    }
    




//função para deletar usuário
if(isset($_POST['delete_usuario'])){
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);
     $sql = "DELETE  FROM usuarios WHERE id = '$usuario_id'";
     
     mysqli_query($conexao, $sql);

      if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = 'Usuário Deletado';
        header('Location:index.php');
        exit;

      }else{
        $_SESSION['mensagem'] = 'Usuário Não Deletado';
        header('Location:index.php');
        exit;
      }
}

?>