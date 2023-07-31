<?php
require_once("config.php");
session_destroy();
$usuario = new Usuario();

$usuario->logar("Rafael","123456");

var_dump($_SESSION['mensagem']) ;


?>