<?php

require 'config.php';
 
$usuario = [];
//capturanddo parametro passado
$id = filter_input(INPUT_GET, 'id');

if($id){
    $sql = $pdo->prepare("SELECT *  FROM usuario WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("Location: index.php");
        exit;
    }
}else {
    header("Location: index.php");
    exit;
}

?>

<h1>Editar Usuário</h1>
<form action="editar_action.php" method="POST">
    <input type="hidden" name="id" value="<?=$usuario['id'];?>" >
    <label>
        Nome: <input type="text" name="nome" value="<?=$usuario['nome'];?>">
    </label>
    <label>
        Email: <input type="text" name="email"  value="<?=$usuario['email'];?>">
    </label>
    <input type="submit" value="Atualizar">
</form>