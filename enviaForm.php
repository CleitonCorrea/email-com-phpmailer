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
	$email->Host = "";	// servidor smtp
	$email->Username = ""; nome de usuario
	$email->Password = ""; senha  */ 
	$email->IsMail();//para envio sem autenticação
	$email->SetFrom ("seuemail@dominio.com", "Cleiton Correa"); // quem esta enviando
	$email->AddAddress("seuemail@dominio.com", "Cleiton Correa"); // para quem sera enviado
	$email->Subject = "Formulario de Contato com PHPMailer";

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