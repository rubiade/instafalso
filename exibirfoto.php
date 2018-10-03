<?php
//verificar a conexão do usuário
  require_once 'lib/bancoDeDados.php';
session_start();
if (conectar ())
	{
	    $codDono = $_SESSION ["cod"];
		$sql = "select * from Foto WHERE cod_canal  = '$codDono'";
		executarSQL($sql);
		$Result = recuperarResultados();

	    foreach ($Result as $l)
	    {
	    	?>
	    	<img src="images/<?php echo $l["nome"];?>" width= "200px" height = "100px" ><br><?php echo $l["descricao"];?><br><br><br>

	    	<?php
	    }
	}
 ?>