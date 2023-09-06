<?php

require 'config.php';

//pegando o nome e email
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//tratando nome e email
if($nome && $email){
    //select do email
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    //verificando contem o email
    if($sql->rowCount() === 0){
        //inserindo dado no banco
        $sql = $pdo->prepare("INSERT INTO usuario (nome, email) VALUES (:nome, :email)");
        //definindo os valores das variaves (VALUES)
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        
        //executando a SQL
        $sql->execute();
        
        //retornando para pagina index
        header("Location: index.php");
        exit;
    }
    else {
        header("Location: cadastrar.php");
    }
}
else{
    header("Location: cadastrar.php");
    exit;
}

?>