<?php
	session_start();
	if (isset($_SESSION["Logado"]))
	{
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>ECON | Sistema de Estoque</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=yes">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css" >
    </head>
    <body>
		<form action="update.php" method="get">
<!----------------------------Inicio do Card--------------------------> 
			<div class="card mx-auto border-dark " style="max-width: 35rem;" >
<!----------------------------Cabeca do Card-------------------------->
				<div class="card-header p-1 bg-secondary text-white m-1">
					<p class="font-weight-bold text-center " style="font-size: 36px;">Editar Produto</p>
				</div>
<!----------------------------Inicio Corpo Card-------------------------->
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
						$idMarca = $linha["idMarca"];
						$tamanhoP = $linha["tamanhoP"];
						$quantidadeP = $linha["quantidadeP"];
						$precoC = $linha["precoC"];
						$precoV = $linha["precoV"];
						$assunto = $linha["assunto"];
						$fornecedor = $linha["fornecedor"];   		   
					?>    
<!----------------------------Corpo 1 do Card-------------------------->
					<div class="form-row">
						<div class="form-group col-md-2">
							<label for="idP">ID</label>
							<input type="text" class="form-control" id="" name="" disabled="disabled" <?php echo "value='$idP'"?> >
							<input type="hidden" class="form-control" id="idP" name="idP" <?php echo "value='$idP'"?> >
						</div>
						<div class="form-group col-md-8">
							<label for="nomeP">Nome</label>
							<input type="text" class="form-control" id="nomeP" name="nomeP" placeholder="Nome do produto" maxlength="60" required <?php echo "value='$nomeP'"?> >
						</div>
						<div class="form-group col-md-2">
							<label for="sexoP">Sexo</label>
							<select id="sexoP" name="sexoP" class="form-control">
								<?php 
									echo "<option value='$sexoP' selected >$sexoP</option>" ;
									if($sexoP=="M")
										echo "<option value='F'>F</option>" ;
									else
										echo "<option value='M'>M</option>" ;
								?>
							</select>
						</div>
					</div>
		<!----------------------------Corpo 2 do Card-------------------------->
					<div class="form-row">
						<div class="form-group col-md-5">
							<label for="idTipo">Tipo</label>
							<select id="idTipo" name="idTipo" class="form-control">
								<?php
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
						<div class="form-group col-md-5">
							<label for="idMarca">Marca</label>
							<select id="idMarca" name="idMarca" class="form-control">
								<?php
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
						<div class="form-group col-md-2">
							<label for="tamanhoP">Tamanho</label>
							<select id="tamanhoP" name="tamanhoP" class="form-control" >
								<?php
									$tamanho = array("PP","P","M","G","GG");
									foreach ($tamanho as $linha)
									{
										if ($tamanhoP == $linha)
											echo "<option value='$linha' selected >".$linha." </option>" ;
										else
											echo "<option value='$linha' >".$linha." </option>" ;
									}
								?>
							</select>
						</div>
					</div>
		<!----------------------------Corpo 3 do Card tabela -------------------------->	
					<table border="0">
						<tbody >
							<tr>
								<td>
									<label for="quantidade">Quantidade</label>
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text">UND</span>
										</div>
										<input type="text" class="form-control col-md-10" id="quantidadeP" name="quantidadeP" maxlength="7" required <?php echo "value='$quantidadeP'"?> >
									</div>
									<label for="precoC">Preço de Compra</label>
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text">R$</span>
										</div>
										<input type="text" class="form-control col-md-10" id="precoC" name="precoC" maxlength="7" required <?php echo "value='$precoC'"?>>
									</div>
									<label for="precoV">Preço da Venda</label>
									<div class="input-group mb-2">
										<div class="input-group-prepend"> 
											<span class="input-group-text">R$</span>
										</div>
										<input type="text" class="form-control col-md-10" id="precoV" name="precoV" maxlength="7" required <?php echo "value='$precoV'"?> >
									</div>
								</td>
								<td>
									<div class="form-group m-1 mb-0">
										<label for="assunto">Descrição</label>
										<textarea class="form-control " cols="55" rows="4" id="assunto" name="assunto"placeholder="Digite a descrição do produto" maxlength="300" ><?php echo "$assunto"?></textarea>
									</div>
									<div class="form-group p-2 m-1">
										<label for="fornecedor">Fornecedor</label>
										<input type="text" class="form-control col-md-12" id="fornecedor" name="fornecedor" placeholder="Nome do Fornecedor" maxlength="60" required <?php echo "value='$fornecedor'"?> >
									</div>	
								</td>
							</tr>
						</tbody>
					</table>
				</div>
<!----------------------------Rodape do Card-------------------------->
				<div class="card-footer m-1 bg-secondary text-white">
					<div class="btn-group btn-block " role="group" >
						<button type="submit" class="btn btn-dark btn-md border-white text-warning">Alterar</button>
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
<?php 
	}
	else
	{
		echo"<script>alert('Você não tem permissão para acessar está página')</script>)";
		echo"<script>window.location='login.html';</script>";
	}
?>