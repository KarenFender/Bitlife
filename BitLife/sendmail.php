<?php

$to = 'kic_p92@hotmail.com';
$subjet = 'Testing sendmail.exe';
$mensaje = "Estas reciviendo un email de sendmail";
$headers = 'From: karenkobos@hotmail.com' . "\r\n".
           'MIME-Version: 1.0' . "\r\n" . 
           'Content-type: text/html; charset=iso-8859-1' . "\r\n".
           'X-Mailer: PHP/' .phpversion();
if(mail($to, $subjet, $headers, $mensaje))
	echo "Mail send";
else
	echo "hubo un error";

?>