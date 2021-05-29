<?php
	session_start();
	if (isset($_SESSION["Logado"]))
	{
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
		<!-- Meta tags Obrigatórias -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=yes">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css" >
		<title>Busca</title>
    </head>

    <body>
		<form action="Pesquisa.php" method="GET">
			<div class="card bg-secondary text-white border-dark m-1" style="max-width: 69rem;">
				<div class="form-row m-1">
					<div class="form-group  col-md-1">
						<label for="id">ID</label>
						<input type="text" class="form-control" id="idP" name="idP" maxlength="5">
					</div>
					<div class="form-group col-md-2">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" id="nomeP" name="nomeP" placeholder="Nome do produto" maxlength="60">
					</div>
					<div class="form-group col-md-1">
						<label for="sexoP">Sexo</label>
						<select id="sexoP" name="sexoP" class="form-control">
							<option value="" selected="selected"></option>
							<option value="M">M</option>
							<option value="F">F</option>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="idTipo">Tipo</label>
						<select id="idTipo" name="idTipo" class="form-control">
							<?php
								$null=null;
								echo"<option selected>".$null."</option>";
								$pdo = new PDO('mysql:host=localhost;dbname=sistemaproduto;charset=utf8', "root", "");
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "Select * from Tipo";
								foreach($pdo->query($sql) as $row)
								{
									if ($idTipo == $row["idTipo"])
										echo "<option value='".$row["idTipo"] ."' selected >".$row["nomeT"]." </option>" ;
									else
										echo "<option value='".$row["idTipo"] ."'>".$row["nomeT"]."</option>" ;
		
								}
							?>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="idMarca">Marca</label>
						<select id="idMarca" name="idMarca" class="form-control">
							<?php
								echo"<option selected>".$null."</option>";
								$sql = "Select * from Marca";
								foreach($pdo->query($sql) as $row)
								{
									if ($idMarca == $row["idMarca"])
										echo "<option value='".$row["idMarca"] ."' selected >".$row["nomeM"]." </option>" ;
									else
										echo "<option value='".$row["idMarca"] ."'>".$row["nomeM"]."</option>" ;
		
								}
								$pdo = null;
							?>
						</select>
					</div>
					<div class="form-group col-md-1">
						<label for="tamanhoP">Tamanho</label>
						<select id="tamanhoP" name="tamanhoP" class="form-control">
							<option value="" selected="selected"></option>
							<option value="PP">PP</option>
							<option value="P">P</option>
							<option value="M">M</option>
							<option value="G">G</option>
							<option value="GG">GG</option>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="fornecedor">Fornecedor</label>
						<input type="text" class="form-control " id="fornecedor" name="fornecedor" placeholder="Nome do Fornecedor" maxlength="60" >
					</div>
					<div class="form-group col-md-1">
					<label> &nbsp&nbsp</label>
						<input class="btn btn-dark btn-md border-white text-warning" type="submit" value="Buscar">
						
					</div>
				</div>
			</div>
		</form>
		<!-- JavaScript (Opcional) -->
		<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script type="text/javascript" src="../js/jquery-slim.min.js" ></script>
        <script type="text/javascript" src="../js/popper.min.js" ></script>
        <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    </body>
</html>
<?php 
	}
	else
	{
		echo"<script>alert('Você não tem permissão para acessar está página')</script>)";
		echo"<script>window.location='login.html';</script>";
	}
?>