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
				<th scope="col">#</th>
				<th > ID </th>
				<th> Nome </th>
				<th> Sexo </th>
				<th> Tipo </th>
				<th> Marca </th>
				<th> Tamanho </th>
				<th> Quantidade </th>
				<th> Fornecedor </th>
				<th class="text-danger"> Busca </th>
			</tr>
		</thead>
		

<?php
	session_start();
	if (isset($_SESSION["Logado"]))
	{	
		try{
			$pdo = new PDO('mysql:host=localhost;dbname=sistemaproduto;charset=utf8', "root", "");
		}catch(PDOException  $e){
			echo   $e->getMessage();
		}
		error_reporting(0);//nenhum erro é reportado, para ativar error_reporting(E_ALL);
		ini_set("display_errors", 0 );// nao exibir os erros, para ativar ini_set(“display_errors”, 1 );
		$buscar = "select * from produto";
		$busca=null;
		if(!empty($_GET["idP"] || $_GET["nomeP"]||$_GET["sexoP"]|| $_GET["idTipo"]|| $_GET["idMarca"]|| $_GET["tamanhoP"]|| $_GET["fornecedor"]))
		{
			$buscar = "select * from produto where ";
			$j=0;
			if(!empty($_GET["idP"]))
			{
				if($j==1){
					$buscar .=" and ";
					$busca.="&";
				}
				$idP = $_GET["idP"];
				$buscar .= "idP = '".$idP."'";
				$busca .= "idP=".$idP;
				$j=1;
			}
			if(!empty($_GET["nomeP"]))
			{
				if($j==1){
					$buscar.=" and ";
					$busca.="&";
				}
				$nomeP = $_GET["nomeP"];
				$buscar .= " nomeP like '%".$nomeP."%' ";
				$busca .= "nomeP=".$nomeP;
				$j=1;
			}
			if(!empty($_GET["sexoP"]))
			{
				if($j==1){
					$buscar.=" and ";
					$busca.="&";
				}
				$sexoP = $_GET["sexoP"];
				$buscar .= " sexoP like '%".$sexoP."%' ";
				$busca .= "sexoP=".$sexoP;
				$j=1;
			}
			if(!empty($_GET["idTipo"]))
			{
				if($j==1){
					$buscar .=" and ";
					$busca.="&";
				}
				$idTipo = $_GET["idTipo"];
				$buscar .= " idTipo = ".$idTipo." ";
				$busca .= "idTipo=".$idTipo;
				$j=1;
			}
			if(!empty($_GET["idMarca"]))
			{
				if($j==1){
					$buscar .=" and ";
					$busca.="&";
				}
				$idMarca = $_GET["idMarca"];
				$buscar .= " idMarca like '%".$idMarca."%' ";
				$busca .= "idMarca=".$idMarca;
				$j=1;
			}
			if(!empty($_GET["tamanhoP"]))
			{
				if($j==1){
					$buscar .=" and ";
					$busca.="&";
				}
				$tamanhoP = $_GET["tamanhoP"];
				$buscar .= " tamanhoP like '%".$tamanhoP."%' ";
				$busca .= "tamanhoP=".$tamanhoP;
				$j=1;
			}
			if(!empty($_GET["fornecedor"]))
			{
				if($j==1){
					$buscar .=" and ";
					$busca.="&";
				}
				$fornecedor = $_GET["fornecedor"];
				$buscar .= " fornecedor like '%".$fornecedor."%' ";
				$busca .= "fornecedor=".$fornecedor;
				$j=1;
			}
		}
		$paginaAtual = (!isset($_GET['pagina'])) ? 1 : $_GET['pagina'];
		$sqlTotal = $pdo->prepare($buscar);
		$sqlTotal ->execute();
		$resultTotal = $sqlTotal->fetchAll();
		$exibirQts = 10;
		$totalPag=ceil((count($resultTotal)/$exibirQts));
		$exibirQtsPag = ($exibirQts * $paginaAtual)-$exibirQts;
		
		$sqlLimit = $pdo->prepare("$buscar limit $exibirQtsPag, $exibirQts");
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
				echo "<td> ".$resultLimit[$j][10]." </td>";
				echo "<td><a title='Entrada' href='entradaC.php?idP=".$resultLimit[$j][0]."'><img src='imagem/entrada.jpg' width='16' height='16'> &nbsp</a>"; 
				echo "<a title='Saida' href='saidaC.php?idP=".$resultLimit[$j][0]."'><img src='imagem/baixa.jpg' width='17' height='17'>&nbsp</a>"; 
				echo "<a title='Editar' href='editar.php?idP=".$resultLimit[$j][0]."'><img src='imagem/editar.jpg' width='16' height='16'>&nbsp</a>"; 	
				echo "<a title='Deletar' href='deletar.php?idP=".$resultLimit[$j][0]."'><img src='imagem/delete.jpg' width='17' height='17'></a></td>";
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
						echo"<a class='page-link text-warning bg-dark border-white' href='Pesquisa.php?pagina=".$Anterior."&".$busca."'>Anterior</a>";
					echo"</li>";
					for($i=1;$i<=$totalPag;$i++){
						if($i == $paginaAtual){
							echo "<li class='page-item m-1'><a class='page-link bg-warning text-white border-white' >".$i."</a></li>";
						}else{
							echo"<li class='page-item '><a class='page-link text-warning bg-dark border-white' href='Pesquisa.php?pagina=".$i."&".$busca."'>".$i."</a></li>";
						}
					}
					echo"<li class='page-item'>";
						$Proximo=$paginaAtual;  
						if($paginaAtual<$totalPag)
							$Proximo=$paginaAtual+1;
						echo"<a class='page-link text-warning bg-dark border-white' href='Pesquisa.php?pagina=".$Proximo."&".$busca."'>Próximo</a>";
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