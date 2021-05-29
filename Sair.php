<?php
	if(isset($_SESSION["Logado"])){
		session_unset();
        session_destroy();

		setcookie("login", "", time() - $this->tempo_cookie);
        setcookie('senha', "", time() - $this->tempo_cookie);
        setcookie("nome", "", time() - $this->tempo_cookie); 
		exit();
	}

	echo"<script>alert('Deslogado do Sistema');</script>";
	echo"<script>window.location='login.html';</script>";
?>