<?php
include("util.php");

debug($_POST);

if ($_POST["senha"] == $_POST["firstname"] || $_POST["senha"] == $_POST["lastname"] ){
	$senha = "<li>Senha fraca</li>";
	$senha2 = "<li>Informe senha mais segura</li>";
	header ("Location:index.php?senha=".$senha .$senha2 );
	exit();
} else {
	$msgErro="";
	if ($_POST["firstname"]==""){
		$msgErro .= "<li>Informe primeiro nome</li>";
	} if ($_POST["lastname"]==""){
		$msgErro .= "<li>Informe sobrenome</li>";
	} if ($_POST["country"]== "NULL"){
		$msgErro .= "<li>Informe pais</li>";
	} if (!isset($_POST["cursos"])){
		$msgErro .= "<li>Informe ao menos um curso</li>";
	} if ($_POST["telefone"]==""){
		$msgErro .= "<li>Informe telefone</li>";
	}
}
if ($msgErro==""){
	$msgErro = "<li>Cadastro Efetuado com sucesso</li>";
	header ("Location:index.php?msgErro=" .$msgErro);
} else {
	header("Location:index.php?msgErro=" .$msgErro);
}



//header ("Location:index.php?msg=".$msg);

//header("Location:index.php");
