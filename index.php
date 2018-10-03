
<?php
require_once 'lib/bancoDeDados.php';

session_start ();

if (formularioEnviado ()) {

	if (conectar ()) {

		echo "select cod from Usuario where login='{$_POST["login"]}' and senha='{$_POST["senha"]}'";

		executarSQL ( "select cod from Usuario where login='{$_POST["login"]}' and senha='{$_POST["senha"]}'" );//mudar usuario

		$arrResultado = recuperarResultados ();

		if (count ( $arrResultado ) > 0) {
			// sucesso!!!!!
			$_SESSION ["cod"] = $arrResultado [0] ["cod"];
		}
	}
}

desconectar ();

if (isset ( $_SESSION ["cod"] )) {
	header ( "location: principal.php" );
	return;
}
function formularioEnviado() {
	return isset ( $_POST ["login"] ) && isset ( $_POST ["senha"] );
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Login</title>
</head>
<body>
	<form action="index.php" method="post">
		<input type="text" name="login" /> <input type="password" name="senha" />
		<input type="submit" value="Enviar" />
	</form>
</body>
</html>