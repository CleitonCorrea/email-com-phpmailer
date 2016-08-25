<?php 


$nome = strip_tags(trim($_POST["nome"]));
$emailForm =  strip_tags(trim($_POST["email"]));
$arquivo = $_FILES["arquivo"];

$tamanho = "520000";
$tipo = array('image/jpg', 'image/jpeg', 'image/png');

$msg = "";

if(empty($nome)){
	$msg = "Preencha o campo nome";
}elseif (!filter_var($emailForm, FILTER_VALIDATE_EMAIL)) {
	$msg = "Preencha o campo email corretamente";
}elseif (!is_uploaded_file($arquivo["tmp_name"])) {
	$msg = "Insira um arquivo";
}elseif ($arquivo["size"] > $tamanho) {
	$msg = "O tamanho permitido é de apenas 500KB"; 
}elseif (!in_array($arquivo["type"], $tipo)) {
	$msg = "O tipo de arquivo suportato é JPG JPEG e PNG ";
}else{


	require("PHPMailer-master/class.phpmailer.php");

	$email = new PHPMailer();
	/*$email->IsSMTP();
	$email->SMTPAuth = true;
	$email->Port = 587;
	$email->Host = "smtp.dozy.com.br";
	
	$email->Username = "falecom@dozy.com.br";
	$email->Password = "hpjsmc011419";*/
	$email->IsMail();//para envio sem autenticação
	$email->SetFrom ("falecom@dozy.com.br", "Hosiel"); // quem esta enviando
	$email->AddAddress("falecom@dozy.com.br", "Hosiel"); // para quem sera enviado
	$email->Subject = "Formulario de Contato";

	$body = "Nome:     ".$nome.               "<br />".
			"Email:    ".$emailForm.          "<br />".
			"Arquivo:  ".$arquivo["name"]."<br />";

	$email->MsgHTML($body);
	$email->AddAttachment($arquivo["tmp_name"], $arquivo["name"]);
			
if($email->Send())
	$msg = "Sua mensagem foi enviada com sucesso";
else
	$msg = "Erro. A mensagem não pode ser enviada!";


}

?>