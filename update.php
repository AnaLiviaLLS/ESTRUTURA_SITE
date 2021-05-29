<?php
	session_start();
	if (isset($_SESSION["Logado"]))
	{
		$idP = $_GET["idP"];
		$nomeP = $_GET["nomeP"];
		$sexoP = $_GET["sexoP"];
		$idTipo = $_GET["idTipo"];
		$idMarca = $_GET["idMarca"];
		$tamanhoP = $_GET["tamanhoP"];
		$quantidadeP = $_GET["quantidadeP"];
		$precoC = $_GET["precoC"];
		$precoV = $_GET["precoV"];
		$assunto = $_GET["assunto"];
		$fornecedor = $_GET["fornecedor"];
		$pdo = new PDO('mysql:host=localhost;dbname=sistemaproduto;charset=utf8', "root", "");	                
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE Produto SET nomeP = ?,sexoP = ?, idTipo = ?, idMarca = ?, tamanhoP = ?, quantidadeP = ?, precoC = ?, precoV = ?, assunto = ?, fornecedor = ? WHERE idP = ?";
		$query = $pdo->prepare($sql);
		$query ->execute(array( $nomeP,$sexoP,$idTipo,$idMarca, $tamanhoP, $quantidadeP,$precoC,$precoV, $assunto, $fornecedor, $idP));                
		$pdo = null;
		echo"<script>alert('Atualização Realizado!');</script>";
		echo"<script>window.location='estoque.php';</script>";
	}
	else
	{
		echo"<script>alert('Você não tem permissão para acessar está página')</script>)";
		echo"<script>window.location='login.html';</script>";
	}
?>
