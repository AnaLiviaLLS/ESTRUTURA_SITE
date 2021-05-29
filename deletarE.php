<?php
	session_start();
	if (isset($_SESSION["Logado"]))
	{
		$idE = $_GET["idE"];
		
		$pdo = new PDO('mysql:host=localhost;dbname=sistemaproduto;charset=utf8', "root", "");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select * from entrada where idE = $idE ";
		foreach($pdo->query($sql) as $row)
		{
			$idP=$row["idP"];
			$quantidadeE = (int)$row["quantidadeE"];			
		}
		
		$sql = "select quantidadeP from produto where idP = $idP ";
		foreach($pdo->query($sql) as $row)
		{
			$quantidadeP = (int)$row["quantidadeP"];			
		}
		
		$quantidadeN = $quantidadeP;
		
		$quantidadeP = (int)$quantidadeP - (int)$quantidadeE;
		
		if($quantidadeP>0)
		{
			$up = "UPDATE Produto SET quantidadeP = ? WHERE idP = ?";
			$query = $pdo->prepare($up);
			$query ->execute(array($quantidadeP,$idP));   
					
			$sql = "delete from entrada where idE = ?";
			$query = $pdo->prepare($sql);
			$query->execute(array($idE));
			$pdo = null;
			

			echo"<script>alert('Delete Realizado!');</script>";
			echo"<script>window.location='entrada.php';</script>";
		}
		else
		{
			echo"<script>alert('A quantidade de produto no estoque = ".$quantidadeN." é menor que a quantidade que ira deletar = ".$quantidadeE." ')</script>)";
			echo"<script>window.location='estoque.php';</script>";
		}

	}
	else
	{
		echo"<script>alert('Você não tem permissão para acessar está página')</script>)";
		echo"<script>window.location='login.html';</script>";
	}
?>