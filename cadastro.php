<?php
	session_start();
	if (isset($_SESSION["Logado"]))
	{
		$nome = $_GET["nome"];
		$login = $_GET["login"];
		$senha = $_GET["senha"];

		$pdo = new PDO('mysql:host=localhost;dbname=sistemaproduto;charset=utf8', "root", "");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "insert into login (nome, login, senha)  Values(?,?,?)";
		$query = $pdo->prepare($sql);
		$query->execute(array($nome,$login,$senha));
		$pdo = null;

		echo"<script>alert('Cadastro Realizado!');</script>";
		echo"<script>window.location='login.html';</script>";
	}
	else
	{
		echo"<script>alert('Você não tem permissão para acessar está página')</script>)";
		echo"<script>window.location='login.html';</script>";
	}
?>















































<?php
// explicando o código
/* 

$pdo = new PDO('mysql:host=localhost;dbname=livraria;charset=utf8', "root", "");
A variável $pdo é definida para armazenar a conexão com o banco de de dados e quando definimos 
new PDO, estamos instânciando a classe do PDO para poder conectar ao banco de dados. Desta forma, 
a função PDO recebe os parametros para conexão ao banco de dados.

new PDO('dblib:host=your_hostname;dbname=your_db;charset=UTF-8', $user, $pass);
dblid -> define o seu banco de dados (SQL, mysql, Oracle etc)
host -> define o endereço onde está o seu servidor
dbname -> define o nome do seu banco de dados
charset - > define qual códificação de caracteres seu banco de dados utilizará
$user - > nome do usuário do banco de dados
$pass --> senha do usuário do banco de dados

Após montarmos a string de conexão com o banco de dados devemos montar o select que iremos executar no banco de dados, 
desta forma criamos a variável $sql que irá conter a nossa instrução de comando SQL.

$sql = "insert into Acervo (idEditora, titulo, autor, ano)  Values(?,?,?,?)";

O comando acima insere os dados dentro da tabela acervo, e perceba que para cada coluna do banco devemos representar seu valor
com uma interrogação, essa interrogação será substituída pelo comando execute abaixo

$query = $pdo->prepare($sql);

Definimos uma $query, que é a instrução a ser executada, e em seguida usamos a conexão $pdo para preparar a $query para execução, perceba que toda vez que utilizamos um formulário existe a necessidade de inserir dados ou manipular informação vinda de um formulário, devemos obrigatoriamente utlizar a função prepare();

A função prepare(); ela serve para evitar que o usuário malicioso utilize sql injection, mas não podemos garantir que ela irá defender de todo e qualquer sql injection.

$query->execute(array($idEditora,$titulo,$autor,$ano));

Agora que temos a $query preparada, devemos executar a instrução que será realizada no banco de dados, perceba que a funão execute recebe um array(); com os parametros que serão inseridos dentro do banco de dados. Estes parametros serão os mesmo que irão substituir as interrogações lá na variável $sql.

$pdo = null;

e por último temos a instrução acima, que basicamente desconecta-se do banco de dados, uma vez que já inserimos o que queríamos no banco de dados e não há mais nada o que fazer.

Lembre-se que todo banco de dados possui um pool de conexões e que desta forma, devemos nos desconectar, pois se ocuparmos
todo o pool de conexões, um próximo cliente não conseguirá se conectar ao banco de dados.


*/

?>