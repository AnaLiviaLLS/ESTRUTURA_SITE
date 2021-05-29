<?php
	session_start();
	if (isset($_SESSION["Logado"]))
	{
		$idS = $_GET["idS"];
		
		$pdo = new PDO('mysql:host=localhost;dbname=sistemaproduto;charset=utf8', "root", "");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select * from saida where idS = $idS ";
		foreach($pdo->query($sql) as $row)
		{
			$idP=$row["idP"];
			$quantidadeS = (int)$row["quantidadeS"];			
		}

		$sql = "select quantidadeP from produto where idP = $idP ";
		foreach($pdo->query($sql) as $row)
		{
			$quantidadeP = (int)$row["quantidadeP"];			
		}
		
		$quantidadeP = (int)$quantidadeS + (int)$quantidadeP ;
		
		$up = "UPDATE Produto SET quantidadeP = ? WHERE idP = ?";
		$query = $pdo->prepare($up);
		$query ->execute(array($quantidadeP,$idP));   
				
		$sql = "delete from saida where idS = ?";
		$query = $pdo->prepare($sql);
		$query->execute(array($idS));
		$pdo = null;
		

		echo"<script>alert('Delete Realizado!');</script>";
		echo"<script>window.location='saida.php';</script>";
	}
	else
	{
		echo"<script>alert('Você não tem permissão para acessar está página')</script>)";
		echo"<script>window.location='login.html';</script>";
	}
?>