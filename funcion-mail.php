<!DOCTYPE html>
<html>
	<head>
		<title>Enviar correo con la funci&oacute;n mail de PHP - www.lewebmonster.com</title>
	</head>
	<body>
	<?php
		$objMensaje=Array(
			'para'		=>	'juancarlosr@msn.com',
			'cuerpo'	=>	'Este es el cuerpo del mensaje',
			'asunto'	=>	'Prueba de correo con PHP'
		);
		
		if(mail($objMensaje['para'],$objMensaje['asunto'],$objMensaje['cuerpo'])){
			echo 'El mensaje se envi&oacute; correctamente!';
		}else{
			echo 'El mensaje no fue enviado!';
		}
	?>
	</body>
</html>