<?php
	$idP = $_GET["idP"];
	$pdo = new PDO('mysql:host=localhost;dbname=sistemaproduto;charset=utf8', "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "delete from Produto where idP = ?";
	$query = $pdo->prepare($sql);
	$query->execute(array($idP));	
	$sql = "delete from entrada where idP = ?";
	$query = $pdo->prepare($sql);
	$query->execute(array($idP));
	$sql = "delete from saida where idP = ?";
	$query = $pdo->prepare($sql);
	$query->execute(array($idP));
	$pdo = null;
	
	echo"<script>alert('Delete Realizado!');</script>";
	echo"<script>window.location='estoque.php';</script>";
?>