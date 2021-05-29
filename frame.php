<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>ECON | Sistema de Estoque</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=yes">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css" >
    </head>
<?php
	session_start();
	if (isset($_SESSION["Logado"]))
	{
		echo"<frameset rows='9%,*%' frameborder='0' border='0' noresize='noresize'>";
			echo"<frame name='menu' src='menuCabeca.php'>";
			echo"<frameset cols='18%,*%' frameborder='0' border='0' noresize='noresize'>";
				echo"<frame name='menu' src='menuLateral.php'>";
				echo"<frame name='pag' src='estoque.php'>";
			echo"</frameset>";
		echo"</frameset>";
		echo"<body>"; 
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