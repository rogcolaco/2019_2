<?php
include("util.php");

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$_SESSION["firstname"] = $_POST["firstname"];
		$_SESSION["lastname"] = $_POST["lastname"];
		$_SESSION["email"] = $_POST["email"];
		$_SESSION["telefone"] = $_POST["telefone"];
		$_SESSION["country"] = $_POST["country"];
		$_SESSION["cursos"] = $_POST["cursos"];
}


debug($_POST);

if($_POST["firstname"]===$_POST["password"]){
	$senha = "Informe uma senha mais segura";
	header("Location:index.php?senha=".$senha);
}else{
	$msgErro = "";
	if ($_POST["firstname"]=="") {
		$msgErro = "Informe o primeiro nome;";
	}
	if ($_POST["lastname"]=="") {
		$msgErro .= "Informe o último nome;";
	}
	if ($_POST["country"]=="NULL") {
		$msgErro .= "Informe um pais;";
	}
	if ($_POST["email"]=="") {
		$msgErro .= "Informe um email;";
	}
	if ($_POST["password"]=="") {
		$msgErro .= "Informe uma senha;";
	}
	if ($_POST["telefone"]=="") {
		$msgErro .= "Informe um telefone;";
	}
	if (!isset($_POST["cursos"])) {
		$msgErro .= "Escolha pelo menos um curso;";
	}
	//Se a msgErro estiver vazia é pq deu tudo certo
	if($msgErro==""){
		$msgSucesso .= "Curso cadastrado com sucesso!";
		$_SESSION["msgSucesso"]=$msgSucesso;
		header("Location:index.php");
	}else{
		$_SESSION["msgErro"]=$msgErro;
		header("Location:index.php");
	}
	

}




