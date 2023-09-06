<?php

$db_name = 'test';
$db_host = 'localhost:3306';
$db_user = 'root';
$db_password = '';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_password);

// $sql = $pdo->query('SELECT * FROM usuario');

// $dados = $sql ->fetchAll(pdo::FETCH_ASSOC);

// //formatação
// echo '<pre>';
// print_r($dados);

?>