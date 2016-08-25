<?php 

if(isset($_POST["acao"]) && $_POST["acao"] == 'enviar'){
		include("enviaForm.php");
}


if(isset($msg)){

	echo '<p id=\ "msg\ " >'.$msg.'</p>';
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

	<meta charset="utf-8">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
<div class="row">
	<div class="col-md-12">
		<h1 class="well center">Forumlário com Anexo: PHPmailer </h1>
	</div>
</div>

<div class="row">
	<div class="col-md-12">	
			<div id="msg"></div>
		<form class="form-group" action="" role="form" method="POST" name="formulario" id="formulario" enctype="multipart/form-data">
			<fieldset>

				<label>Insira seu Nome:
					<input type="text" class="form-control" name="nome"><br />
				</label>

				<label>Insira seu Email:
					<input type="email" class="form-control" name="email"><br />
				</label>

				<label>Insira um Arquivo:
					<input type="file" class="form-control" name="arquivo"><br />
				</label>

			</fieldset>
			<input type="submit" name="acao" value="enviar" class="btn btn-info">
		</form>
	</div>
</div>
</div>

</body>
</html>