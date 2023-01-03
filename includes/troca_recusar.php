<?php

require 'conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$troca = $conexao->query("SELECT * FROM troca WHERE id_troca = $id")->fetch();;

if($troca['id_user2']!=$_SESSION['id_user']){
    die("Acesso negado");
}

$conexao->query("DELETE FROM troca WHERE id_troca = $id");

?>

<script>
    alert("Troca recusada com sucesso!");
    window.location.href = "main.php?page=perfil";
</script>