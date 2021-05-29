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

        <title>Menu Lateral</title>
    </head>
    <body >
		<div class="card mx-auto border-dark  " >
	<!-------------------------------Cabeça--------------------------------------> 
			<div class="card-header m-1 bg-dark text-white">
				<p class="font-weight-bold text-center " style="font-size: 36px;">Painel de Controle</p>
			</div>
	<!-------------------------------Corpo 1 -------------------------------------->
			<div class="card-body bg-white "> 
				<div class="btn-group-vertical btn-block " >
					<a class="btn btn-dark btn-md border-white text-warning" href="estoque.php" role="button " target="pag" title="Estoque">Estoque</a>
					<a class="btn btn-dark btn-md border-white text-warning" href="buscar.php" role="button " target="pag" title="Buscar">Buscar Produto</a>
					<a class="btn btn-dark btn-md border-white text-warning" href="cadastrarP.php" role="button " target="pag" title="Cadastrar">Cadastrar Produto</a>
					<a class="btn btn-dark btn-md border-white text-warning" href="entrada.php" role="button " target="pag" title="Entrada">Entrada de Produto</a>
					<a class="btn btn-dark btn-md border-white text-warning" href="saida.php" role="button " target="pag" title="Saida">Saida de Produto</a>
					<a class="btn btn-dark btn-md border-white text-warning" href="Sair.php" role="button " target="_blank" title="Sair">Sair</a>
			
				</div>
			</div>
		<!-------------------------------Rodapé-------------------------------------->
			<div class="card-footer bg-dark m-1 text-white">
				<p class="text-left" style="font-size: 12px;"></br> Desenvolvedores:
					</br>
					</br>
					Ana Lívia Louise Silva</br>
					Bruno César de Almeida</br>
					Bárbara Melo Nunes</br>		
				</p>
			</div>
		</div>
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