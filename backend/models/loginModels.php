<?php
echo json_encode(["email" => $email, "senha" => $senha]);
include './backend/models/connectionDB.php';

	$pesquisa = "SELECT * FROM usuarios where login='$email' AND senha = '$senha'";
	$result = $mysqli->query($pesquisa) or die("Erro na consulta: $pesquisa");
	if ($result->num_rows > 0) {
	while (list($id,$nome, $email,$pwssd)=$result->fetch_row()){	
	if(password_verify($senha, $pwssd)){
		$_SESSION['nome']= $nome;
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		header("Location: inicio.php"); //redireciona para a página inicial
	}else{
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		header("Location: index.php?erro=1"); // retorna ao login
	}
	
	}
	}
	else if(!$email||!$senha){
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		header("Location: index.php?erro=1"); // retorna ao login
	}
	else{
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		header("Location: index.php?erro=1"); // retorna ao login
	}
?>