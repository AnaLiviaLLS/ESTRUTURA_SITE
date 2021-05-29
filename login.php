<?php
	$loginFormulario = $_GET["login"]; 
    $senhaFormulario = $_GET["senha"]; 
	
    $pdo = new PDO('mysql:host=localhost;dbname=sistemaproduto;charset=utf8', "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consulta = $pdo->prepare("SELECT * FROM login where login = ? and senha = ?");
    $consulta->bindParam(1, $_GET['login'], PDO::PARAM_STR);
    $consulta->bindParam(2, $_GET['senha'], PDO::PARAM_STR);
	
    $consulta->execute();
    $linha = $consulta->fetch(PDO::FETCH_ASSOC); 
 
    $login = $linha['login']; 
    $senha = $linha['senha']; 
	$nome = $linha['nome']; 
	
    if ($login == $loginFormulario && $senha == $senhaFormulario )
	{
		 session_start();
		 $_SESSION["Logado"]="ok";
		 $_SESSION["nome"]= $nome;
		 echo"<script>alert('Login e senha correto');</script>";
		 echo"<script>window.location='frame.php';</script>";

	}
    else
	{
		echo"<script>alert('Login ou senha inválidos');</script>";
		echo"<script>window.location='login.html';</script>";
	}
	$pdo=null;
?>      