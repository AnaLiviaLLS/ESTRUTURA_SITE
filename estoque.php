<!DOCTYPE html>
<html lang="pt-br">
    <head>
		<!-- Meta tags Obrigatórias -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=yes">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css" >
        <title>Cabecario</title>
    </head>

    <body>
		<table class="table table-hover text-center table-dark">
			<thead>
				<tr>
					<th scope="col" >#</th>
					<th > ID </th>
					<th > Nome </th>
					<th > Sexo </th>
					<th> Tipo </th>
					<th> Marca </th>
					<th> Tamanho </th>
					<th> Quantidade </th>
					<th class="text-danger"> Estoque </th>
				</tr>
			</thead>
		
<?php
	session_start();
	if (isset($_SESSION["Logado"]))
	{
		try{
			$pdo = new PDO('mysql:host=localhost;dbname=sistemaproduto;charset=utf8', "root", "");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException  $e){
			echo   $e->getMessage();
		}

		$paginaAtual = (!isset($_GET['pagina'])) ? 1 : $_GET['pagina'];
		$sqlTotal = $pdo->prepare("select * from produto");
		$sqlTotal ->execute();
		$resultTotal = $sqlTotal->fetchAll();
		$exibirQts = 10;
		$totalPag=ceil((count($resultTotal)/$exibirQts));
		$exibirQtsPag = ($exibirQts * $paginaAtual)-$exibirQts;

		$sqlLimit = $pdo->prepare("select * from produto limit $exibirQtsPag, $exibirQts");
		$sqlLimit->execute();
		$resultLimit = $sqlLimit->fetchAll();
		if($paginaAtual==1)
			$numero=1;
		else
			$numero=(10*$paginaAtual)-9;
		if($sqlTotal->rowCount()>0)
		{
			for($j=0;$j < count($resultLimit);$j++)
			{
				echo"<tbody class='bg-secondary'>";
				echo "<tr >";
				echo "<th scope='row'>".$numero."</th>";
				echo "<td> ".$resultLimit[$j][0]." </td>";
				echo "<td> ".$resultLimit[$j][1]." </td>";
				echo "<td> ".$resultLimit[$j][2]." </td>";
				$idTipo=$resultLimit[$j][3];
				$sqlTipo = "select nomeT from Tipo where idTipo = $idTipo";
				foreach($pdo->query($sqlTipo) as $Tipo )
				{
					echo "<td> ".$Tipo["nomeT"]." </td>";
				}
				$idMarca=$resultLimit[$j][4];
				$sqlMarca = "select nomeM from Marca where idMarca = $idMarca";
				foreach($pdo->query($sqlMarca) as $Marca )
				{
					echo "<td> ".$Marca["nomeM"]." </td>";
				}
				echo "<td> ".$resultLimit[$j][5]." </td>";
				echo "<td> ".$resultLimit[$j][6]." </td>";
				echo " <td><a title='Entrada' href='entradaC.php?idP=".$resultLimit[$j][0]."'><img src='../img/entrada.jpg' width='16' height='16'> &nbsp</a>";
				echo " <a title='Saida' href='saidaC.php?idP=".$resultLimit[$j][0]."'><img src='../img/baixa.jpg' width='17' height='17'>&nbsp</a>";
				echo " <a title='Editar' href='editar.php?idP=".$resultLimit[$j][0]."'><img src='../img/editar.jpg' width='16' height='16'>&nbsp</a>";
				echo " <a title='Deletar' href='deletar.php?idP=".$resultLimit[$j][0]."'><img src='../img/delete.jpg' width='17' height='17'></a></td>";
				echo "</tr>";
				$numero++;
			}
			echo "</tbody>";
			echo "</table>";
			echo"<nav class='bg-dark mx-auto text-warning navbar-default fixed-bottom ' style='font-size: 12px;'>";
				echo"<ul class='pagination justify-content-center m-1 '>";
					echo"<li class='page-item'>";
					$Anterior=$paginaAtual;                         
						if($paginaAtual>1)
							$Anterior=$paginaAtual-1;
						echo"<a class='page-link text-warning bg-dark border-white' href='?pagina=".$Anterior."'>Anterior</a>";
					echo"</li>";
					for($i=1;$i<=$totalPag;$i++){
						if($i == $paginaAtual){
							echo "<li class='page-item m-1'><a class='page-link bg-warning text-white border-white' >".$i."</a></li>";
						}else{
							echo"<li class='page-item '><a class='page-link text-warning bg-dark border-white' href='?pagina=".$i."'>".$i."</a></li>";
						}
					}
					echo"<li class='page-item'>";
						$Proximo=$paginaAtual;  
						if($paginaAtual<$totalPag)
							$Proximo=$paginaAtual+1;
						echo"<a class='page-link text-warning bg-dark border-white' href='?pagina=".$Proximo."'>Próximo</a>";
					echo"</li>";
				echo"</ul>";
			echo"</nav>";
		}
		$pdo = null;
	}
	else
	{
		echo"<script>alert('Você não tem permissão para acessar está página')</script>)";
		echo"<script>window.location='login.html';</script>";
	}
?>

            <script type="text/javascript" src="../js/jquery-slim.min.js" ></script>
            <script type="text/javascript" src="../js/popper.min.js" ></script>
            <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    </body>
</html>