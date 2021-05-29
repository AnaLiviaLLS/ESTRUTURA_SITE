<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>ECON | Sistema de Estoque</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=yes">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css" >
    </head>
    <body>
		<form action="inserirE.php" method="get">
<!----------------------------Inicio do Card--------------------------> 	
			<div class="card mx-auto border-dark " style="max-width: 35rem;" >
<!----------------------------Cabeca do Card-------------------------->
				<div class="card-header p-1 bg-secondary text-white m-1">
					<p class="font-weight-bold text-center " style="font-size: 36px;">Entrada</p>
				</div>
<!----------------------------Inicio Corpo do Card-------------------------->
				<div class="card-body  bg-transparent ">			
					<?php
						$idP = $_GET["idP"];   
						$pdo = new PDO('mysql:host=localhost;dbname=sistemaproduto;charset=utf8', "root", "");
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$consulta = $pdo->prepare("SELECT * FROM Produto where idP = ?");  
						$consulta->execute(array($idP)); 
						$linha = $consulta->fetch(PDO::FETCH_ASSOC); 
						$idP = $linha["idP"];
						$nomeP = $linha["nomeP"];
						$sexoP = $linha["sexoP"];
						$idTipo = $linha["idTipo"];
						$quantidadeP = $linha["quantidadeP"];
						$idMarca = $linha["idMarca"];
						$tamanhoP = $linha["tamanhoP"];
						$precoC = $linha["precoC"];  	   
					?>    
<!----------------------------Corpo 1 do Card-------------------------->
					<div class="form-row">
						<div class="form-group col-md-2">
							<label for="idP">ID</label>
							<input type="text" class="form-control" id="" name="" disabled="disabled" <?php echo "value='$idP'"?> >
							<input type="hidden" class="form-control" id="idP" name="idP" <?php echo "value='$idP'"?> >
						</div>
						<div class="form-group col-md-8">
							<label for="nome">Nome</label>
							<input type="text" class="form-control" id="nomeP" name="nomeP" disabled="disabled" <?php echo "value='$nomeP'"?> >
						</div>
						<div class="form-group col-md-2">
							<label for="sexoP">Sexo</label>
							<input type="text" class="form-control" id="sexoP" name="sexoP" disabled="disabled" <?php echo "value='$sexoP'"?> >
						</div>
					</div>
<!----------------------------Corpo 2 do Card-------------------------->
					<div class="form-row">
						<div class="form-group col-md-5">
							<label for="idTipo">Tipo</label>
							<select id="idTipo" name="idTipo" class="form-control" disabled="disabled">
								<?php
									$sql = "Select * from Tipo";
									foreach($pdo->query($sql) as $row)
									{
										if ($idTipo == $row["idTipo"])
											echo "<option value='".$row["idTipo"] ."' selected >".$row["nomeT"]." </option>" ;
									}
								?>
							</select>
						</div>
						<div class="form-group col-md-5">
							<label for="idMarca">Marca</label>
							<select id="idMarca" name="idMarca" class="form-control" disabled="disabled">
								<?php
									$sql = "Select * from Marca";
									foreach($pdo->query($sql) as $row)
									{
										if ($idMarca == $row["idMarca"])
											echo "<option value='".$row["idMarca"] ."' selected >".$row["nomeM"]." </option>" ;	
									}
									$pdo = null;
								?>
							</select>
						</div>
						<div class="form-group col-md-2">
							<label for="tamanhoP">Tamanho</label>
							<input type="text" class="form-control" id="tamanhoP" name="tamanhoP" disabled="disabled" <?php echo "value='$tamanhoP'"?> >
						</div>
					</div>	
<!----------------------------Corpo 3 do Card tabela-------------------------->	
					<table border="0">
						<tbody >
							<tr>
								<td>
									<label for="quantidadeE">Quantidade</label>
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text">UND</span>
										</div>
										<input type="text" class="form-control col-md-10" id="quantidadeE" name="quantidadeE" maxlength="7" required>
									</div>
									<label for="precoC">Preço da Compra</label>
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text">R$</span>
										</div>
										<input type="text" class="form-control col-md-10" id="precoC" name="precoC" disabled="disabled" <?php echo "value='$precoC'"?> >
									</div>
								</td>
								<td>
									<div class="form-group p-2 m-1">
										<label for="dataE">Data</label>
										<input type="date" class="form-control col-md-12" id="dataE" name="dataE"  required>
									</div>	
								</td>
							</tr>
						</tbody>
					</table>
				</div>
<!----------------------------Fim do Corpo do Card-------------------------->
<!----------------------------Rodape do Card-------------------------->
				<div class="card-footer m-1 bg-secondary text-white">
					<div class="btn-group btn-block " role="group" >
						<button type="submit" class="btn btn-dark btn-md border-white text-warning">Inserir</button>
					</div>
				</div>
			</div>
<!----------------------------Fim do Card----------------------------->
		</form>
        <script type="text/javascript" src="../js/jquery-slim.min.js" ></script>
        <script type="text/javascript" src="../js/popper.min.js" ></script>
        <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    </body>
</html>