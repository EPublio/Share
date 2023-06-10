<?php
try {
$user_bd = '';
$senha_bd = '';
$bd = '';
$conexao = new \PDO('mysql:host=localhost; dbname='.$bd, $user_bd, $senha_bd);

} catch (\PDOExeptiom $e) {
echo '<div>'.$e->getMassage().'</div>';
}
