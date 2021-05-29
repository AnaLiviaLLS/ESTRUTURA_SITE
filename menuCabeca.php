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
		<nav class="navbar bg-dark">
			<img src="../img/logo.jpeg" width="100" height="43">
			<p class="text-warning m-1" style="font-size: 18px;">Clotheyeasy</p>
			<p class="text-warning m-1" style="font-size: 12px;">
			
			<?php 
				session_start();
				if (isset($_SESSION["Logado"]))
				{
					echo"Bem vindo(a), ".$_SESSION["nome"];
				}
				else
				{
					echo"<script>alert('Você não tem permissão para acessar está página')</script>)";
					echo"<script>window.location='login.html';</script>";
				}
			?>
			</p>
		</nav>
		
		<!-- JavaScript (Opcional) -->
		<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script type="text/javascript" src="../js/jquery-slim.min.js" ></script>
        <script type="text/javascript" src="../js/popper.min.js" ></script>
        <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    </body>
</html>

