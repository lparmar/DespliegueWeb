<html> 
<head> 
<title>Formulario para añadir datos </title> 
</head> 
<body> 
<center><h4>Formulario de altas</h4></center> 

<form name="altas" method="POST" action="proceso_insercion.php"> 
<table bgcolor="#E9FFFF" align=center border=2> 

<td align="right">Escribe tu D.N.I.: </td> 
<td align="left"> <input type="text" name="dni" value="" size=8></td><tr> 
<td align="right">Nombre....: </td> 
<td align="left"> <input type="text" name="nombre" value="" size=20></td><tr> 

<td align="right">Apellido....: </td> 
<td align="left"> <input type="text" name="apellido" value="" size=20></td><tr> 
<!-- opcion radio para fumador o no fumador--> 
<td align="right">Fumador:</td> 
<td align="left"> <input type="radio" name="fumador" value="1" checked > Si <input type="radio" name="fumador" value="0" > No </td><tr> 
<!-- Sexo--> 
<td align="right">Sexo:</td> 
<td align="left"> <input type="radio" name="sexo" value="M" checked > Hombre <input type="radio" name="sexo" value="F" > Mujer </td><tr> 

<!-- la opción idiomas la activamos mediante un SELECT MULTIPLE -->
  
<td align="right">Experiencia:<br> 
(<i>Si son varios seleccionarlos<br> 
pulsando con el mouse encima de <br> 
cada uno de ellos con la tecla<br> 
<b>Ctrl</b> presionada</i>)</td> 
<td align="left"> 

	
	<?php

		include('funcionesBD.php');

		@ $conexion = new mysqli ("localhost","root","3VA9mTdHaAJMuaoY2GSa","railway");  
		$conexion->set_charset("utf8");

		$arrayOpciones = obtenerArrayOpciones('tecnos','id','nombre');
		pintarComboMultiple($arrayOpciones,'comboLeng[]');
	?>



</td></tr>
<!--colocamos los botones de enviar y borrar //--> 


<td align=center><input type=submit value="Enviar"></td> 
<td align=center><input type=reset value="Borrar"></td> 
</table> 
</body> 
</html> 
