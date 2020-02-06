<?php

ini_set('display_errors',1);

try {

	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['msg'];
	   
	$subject="Mensaje de Contacto dellquilaelola.com.ar";
	//$from="From: $name<lengasrl@mail.com>\r\nReturn-path: lengasrl@mail.com"; 


	//Armamos el mail con la info



	$MESSAGE_BODY = "Nombre: ".$name."<br>"; 
	$MESSAGE_BODY .= "Email: ".$email."<br>"; 
	$MESSAGE_BODY .= "Consulta: ".$message."<br>"; 
	


	require_once 'class.phpmailer.php';
	require_once 'class.smtp.php';


	$mail = new PHPMailer(true);
	$mail->IsSMTP();
    $mail->Host = 'a2plcpnl0273.prod.iad2.secureserver.net';
	$mail->SMTPAuth = true;
    $mail->Username = 'contacto@dellaquilaelola.com.ar';
	$mail->Password = 'dellaquilaelola123';
	$mail->SMTPSecure = "ssl";
	$mail->Port = 465;
    
   
    
	$mail->From = 'contacto@dellaquilaelola.com.ar';
	$mail->Subject = 'Nuevo Contacto Sitio Web';
	$mail->MsgHTML($MESSAGE_BODY);
	$mail->FromName = "Estudio DellAquilaElola";
	$mail->SetFrom($mail->From, "DellAquilaElola");

	//$mail->AddReplyTo($formemail,$formfirstname);


	$mail->AddAddress('matiasn.quintana@gmail.com', "Mailer");
	$mail->IsHTML(true);
	 
	if(!$mail->Send()) {
	  echo "Error: " . $mail->ErrorInfo;
	} else {
	 echo "Mensaje enviado correctamente";
	}

} catch (phpmailerException $e) {
  echo $e->getMessage();
}






?>
