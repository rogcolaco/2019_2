<?php
include("util.php");

debug($_POST);

if ($_POST["senha"] == $_POST["firstname"] || $_POST["senha"] == $_POST["lastname"] ){
	/*$senha .= "<li>Senha fraca</li>;";
	$senha = "<li>Informe senha mais segura</li>";
	header ("Location:index.php?senha=".$senha );*/
	echo "Informe senha mais segura";
} else {
	if ($_POST["firstname"]==""){
		/*$msg = "<li>Informe primeiro nome</li>";*/
		echo "Prencha o primeiro nome";
	} if ($_POST["lastname"]==""){
		/*$msg = "<li>Informe primeiro nome</li>";*/
		echo "Prencha o sobrenome";
	} if ($_POST["country"]== "NULL"){
		/*$msg = "<li>Informe primeiro nome</li>";*/
		echo "Prencha o pais";
	} if ($_POST["cursos"]==""){
		/*$msg = "<li>Informe primeiro nome</li>";*/
		echo "Prencha ao menos um curso";
	}if ($_POST["telefone"]==""){
		/*$msg = "<li>Informe primeiro nome</li>";*/
		echo "Prencha o telefone";
	}
}



//header ("Location:index.php?msg=".$msg);

//header("Location:index.php");
