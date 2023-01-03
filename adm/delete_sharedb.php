<?php

session_start();
require './includes/conexao.php';
require 'conexao.php';
require '../includes/conexao.php';
if(!isset($_SESSION['id_user'])){
    die("Acesso negado");
} elseif ($_SESSION['id_user'] != 1) {
    die("Acesso negadoo");
}

else{

    $sql = "DELETE FROM troca";
    $conexao->query($sql);
    $sql = "DELETE FROM livro";
    $conexao->query($sql);
    $sql = "DELETE FROM user";
    $conexao->query($sql);
    
    header('Location: ./main.php?page=adm');
}
