<!DOCTYPE html>
<html>
	<head>
		<title>Enviar correo por SMTP con PHP - www.lewebmonster.com</title>
	</head>
	<body>
	<?php
		//agregamos la dependencia de Swift Mailer
		require_once 'php/ext/Swift-4.2.1/lib/swift_required.php';
		
		//configuracion de la cuenta
		$objCuentaUtilizada=Array(
			'smtp'			=>	'mail.dominio.com',		//direccion del smtp
			'puerto'		=>	25,						//puerto smtp
			'nombre'		=>	'Cali Rojas',			//nombre que aparecera en los correos
			'cuenta'		=>	'alguien@dominio.com',	//cuenta que vamos a usar (colocar con @)
			'usuario'		=>	'alguien@dominio.com',	//usuario de smtp
			'contrasena'	=>	'mi_Clave_3S5ecreta_1'	//contrasena de smtp
		);
		
		//creamos el nuevo transporte de Swift con los datos de conexion
		$objTransporte=Swift_SmtpTransport::newInstance($objCuentaUtilizada['smtp'],
		$objCuentaUtilizada['puerto'])
			->setUsername($objCuentaUtilizada['usuario'])		//le indicamos el usuario smtp que vamos a usar
			->setPassword($objCuentaUtilizada['contrasena'])	//contrasena del usuario smtp
		;
		
		//instanciamos el mailer con los datos de conexion establecidos anteriormente
		$objMailer=Swift_Mailer::newInstance($objTransporte);
		
		//creamos el mensaje
		$objMensaje=Swift_Message::newInstance('Asunto del mensaje')							//asunto del mensaje
			->setFrom(array($objCuentaUtilizada['cuenta'] => $objCuentaUtilizada['nombre']))	//quien esta enviando el mensaje?
			->setTo(array('destinatario@otrodominio.com' => 'Funalito'))								//a quien le enviamos el mensaje?
			->setBody('<h1>Hola mundo!</h1><p>Prueba de lewebmonster.com</p>')					//cuerpo del mensaje	
			->setContentType('text/html')														//mensaje en formato HTML
		;
		
		//enviamos el mensaje
		if($objMailer->send($objMensaje)){
			echo 'El mensaje se envi&oacute; correctamente!';
		}else{
			echo 'El mensaje no fue enviado!';
		}
	?>
	</body>
</html>