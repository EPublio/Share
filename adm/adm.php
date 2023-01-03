<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './includes/conexao.php';


if(!isset($_SESSION['id_user'])){
    die("Acesso negado");
} elseif ($_SESSION['id_user'] != 1) {
    die("Acesso negadoo");
}

?>

<form action="adm/cadastro_genero_db.php" method="post" enctype="multipart/form-data" class="container-cadastro">

    <h1>Cadastrar genero</h1>

    <div>
        <input type="text" placeholder="nome genero:" name="genero" id="genero" required>
    </div>
    <div>
        <input type="submit" value="Salvar">
    </div>

</form>

<form action="adm/troca_apagardb.php" method="post" enctype="multipart/form-data" class="container-cadastro">

    <h1>Troca_apagar</h1>
    <div>
        <input type="submit" value="APAGAR TROCA">
    </div>
</form>

<form action="adm/user_apagardb.php" method="post" enctype="multipart/form-data" class="container-cadastro">

    <h1>user</h1>
    <div>
        <input type="submit" value="APAGAR USERS">
    </div>
</form>

<form action="adm/livro_apagardb.php" method="post" enctype="multipart/form-data" class="container-cadastro">

    <h1>livros_apagar</h1>
    <div>
        <input type="submit" value="APAGAR livros">
    </div>
</form>


    <h1>Generos</h1>
<?php

    $sql ="SELECT * FROM genero";
    $generos = $conexao->query($sql);

    echo '<ul>';
    foreach($generos as $g){
        echo '<li>';
        echo $g['nome'];
        echo '<a href="main.php?page=genero_apagar&id_gen='.$g['id_genero'].'">Apagar</a>';
        echo '<a href="main.php?page=genero_editar&id_gen='.$g['id_genero'].'">Editar</a>';
        
        echo '</li>';
    }
    echo '</ul>';

    echo '<br>';

    echo '<h1>Users</h1>';

    $sql ="SELECT * FROM user";
    $users = $conexao->query($sql);

    echo '<ul>';
    foreach($users as $u){
        echo '<li>';
        echo $u['id_user']."  /  ";
        echo $u['login']."  /  ";
        echo $u['password']."  /  ";
        echo $u['nome_completo']."  /  ";
        echo $u['email']."  /  ";
        echo $u['reputacao']."  /  ";
        echo $u['numero_telefone']."  /  ";
        echo '</li>';
    }
    echo '</ul>';

    echo '<br>';
    echo '<h1>Livro</h1>';

    $sql ="SELECT * FROM livro";

    $livros = $conexao->query($sql);

    echo '<ul>';
    foreach($livros as $l){
        echo '<li>';
        echo $l['id_livro']."  /  ";
        echo $l['id_dono']."  /  ";
        echo $l['titulo']."  /  ";
        echo $l['autor']."  /  ";
        echo $l['img_path']."  /  ";
        echo $l['genero']."  /  ";
        echo '</li>';
    }
    echo '</ul>';

    echo '<br>';
    
    $sql ="SELECT * FROM troca";

    $trocas = $conexao->query($sql);

    echo '<ul>';
    foreach($trocas as $l){
        echo '<li>';
        echo $l['id_troca']."  /  ";
        echo $l['id_user1']."  /  ";
        echo $l['id_user2']."  /  ";
        echo $l['id_item_user1']."  /  ";
        echo $l['id_item_user2']."  /  ";
        echo $l['descricao']."  /  ";
        echo $l['status']."  /  ";
        echo '</li>';
    }
    echo '</ul>';

    echo '<br>';

?>

<form action="adm/delete_sharedb.php">
    <input type="submit" value="Apagar tudo">
</form>