<?php


session_start();
$dados_recebidos = json_decode(file_get_contents("php://input"), true);

$email = $dados_recebidos['email'];
$senha = sha1($dados_recebidos['senha']);
//echo json_encode(["email" => $email, "senha" => $senha]);
include './backend/models/loginModels.php';


?>