<?php
	include("util.php");
	session_start();	
	debug($_SESSION);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>FORM PHP</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div id="conteudo">
		<header id="cabecalho">
			<h1>FORM PHP</h1>
			<nav id="menu">
				<ul>
					<a href="index.php"><li>FORM PHP</li></a>
					<a href="#"><li>Página 2</li></a>
					<a href="#"><li>Página 3</li></a>
				</ul>
			</nav>
		</header>
		<section id="principal">
			<?php
				if (isset($_GET["senha"])) {
					$retorno = $_GET["senha"];
					echo "<div class='erro'>".$retorno."</div>";
				}else if(isset($_SESSION["msgSucesso"])) {
					$retorno = $_GET["msgSucesso"];
					echo "<div class='sucesso'>".$retorno."</div>";
				} else if (isset($_SESSION["msgErro"])) {
					$retorno = $_SESSION["msgErro"];
					$retorno = explode(";", $retorno);
					//remove o último elemento do array. Que sempre será vazio pq cada msg de erro termina com;
					array_pop($retorno);
					echo "<div class='erro2'>";
					echo "<ul>";
					foreach ($retorno as $key => $value) {
						echo "<li>".$value."</li>";
					}
					echo "<ul>";
					echo "</div>";
				}
			?>
			<div id="calculadora" class="contorno">
				<form action="recebeForm.php" method="POST">
					<div id="divFormEsq">
					    <label for="fname">Primeiro Name</label>
					    <input type="text" id="fname" name="firstname" placeholder="Primeiro nome" value="<?php if (isset($_SESSION["firstname"]))echo $_SESSION["firstname"];?>">
					    
					    <label for="lname">Sobrenome</label>
					    <input type="text" id="lname" name="lastname" placeholder="Sobrenome" value="<?php if (isset($_SESSION["lastname"]))echo $_SESSION["lastname"];?>">
					    
					    <label for="country">País</label>
					    <select id="country" name="country">
					      <option value="NULL"></option>	
					      <option value="australia" <?php if (isset($_SESSION["country"])) if($_SESSION["country"]=="australia") echo "selected" ; ?> >Australia</option>
					      <option value="canada" <?php if (isset($_SESSION["country"])) if($_SESSION["country"]=="canada") echo "selected" ; ?> >Canada</option>
					      <option value="brasil" <?php if (isset($_SESSION["country"])) if($_SESSION["country"]=="brasil") echo "selected" ; ?> >Brasil</option>
					      <option value="usa" <?php if (isset($_SESSION["country"])) if($_SESSION["country"]=="usa") echo "selected" ; ?> >USA</option>
					    </select>
					    <div style="float: left">
						    <label for="cursos">Cursos</label><br>
						    <input type="checkbox" name="cursos[]" value="PHP" <?php if (isset($_SESSION["cursos"])) if(in_array("PHP",$_SESSION["cursos"])) echo "checked" ; ?> >PHP <br>
						    <input type="checkbox" name="cursos[]" value="HTML" <?php if (isset($_SESSION["cursos"])) if(in_array("HTML",$_SESSION["cursos"])) echo "checked" ; ?> >HTML <br>
						    <input type="checkbox" name="cursos[]" value="CSS" <?php if (isset($_SESSION["cursos"])) if(in_array("CSS",$_SESSION["cursos"])) echo "checked" ; ?>>CSS <br>
						</div>
				    </div>

				    <div id="divFormDir">
					    <label for="email">E-mail</label>
					    <input type="text" id="email" name="email" placeholder="E-mail" value="<?php if (isset($_SESSION["email"]))echo $_SESSION["email"];?>">		    	

					    <label for="senha">Senha</label>
					    <input type="password" id="password" name="password" placeholder="Senha">
						
						<label for="telefone">Telefone</label>
					    <input type="text" id="telefone" name="telefone" placeholder="Telefone" value="<?php if (isset($_SESSION["telefone"]))echo $_SESSION["telefone"];?>">

				    </div>
				  	<br style="clear: both">
				    <input type="submit" value="Submit">
			  	</form>
				
						
			</div>
		</section>
		<footer>
			Sistema desenvolvido por Rodrigo Henrique Ramos - 2019A
		</footer>
	</div>

	<?php
		session_unset();
	?>
	
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>