<html><body>
<a href="formulario_examen.php">Volver al formulario</a></body></html>

<?php

		include('funcionesBD.php');

		@ $conexion = new mysqli ("localhost","root","","candidatos");  
		$conexion->set_charset("utf8");

		extract($_POST);

		$consSelect = "SELECT count(*) from candidatos where DNI = '".$dni."'";

		$sql = $conexion->query($consSelect);

		$fila = $sql->fetch_array();

		if ($fila[0] == 0) {
			  	
			  $consInsert = 'INSERT INTO candidatos (DNI, Nombre, Apellido1, Sexo, Fumador) VALUES (?,?,?,?,?)';

			  $consulta1 = $conexion->stmt_init();
			  $consulta1->prepare($consInsert);
			  $consulta1 -> bind_param("sssss",$dni,$nombre,$apellido,$sexo,$fumador);
			  $consulta1 ->execute();
			  

			
			 $consInsert2 = 'INSERT INTO programa values (?,?)';

			 $consulta = $conexion->stmt_init();
			 $consulta->prepare($consInsert2);

			 foreach ($comboLeng as $key => $value) {
			 	
			 	$leng = $value;
			 	$consulta -> bind_param("si",$dni,$leng);
			 	$consulta ->execute();
			 }

		}else{

			$consUpdate = 'UPDATE candidatos set DNI=?, nombre = ?, apellido1 = ?, sexo = ?, fumador = ? where dni = ?';

			$consulta2 = $conexion->stmt_init();
			$consulta2->prepare($consUpdate);
			$consulta2 -> bind_param("ssssis",$dni,$nombre,$apellido,$sexo,$fumador,$dni);
			$consulta2 ->execute();


			$delete = 'DELETE from programa where DNI = ?';

			$consulta3 = $conexion->stmt_init();
			$consulta3->prepare($delete);
			$consulta3 -> bind_param("s",$dni);
			$consulta3 ->execute();

			
			$consInsert2 = 'INSERT INTO programa values (?,?)';

			 $consulta = $conexion->stmt_init();
			 $consulta->prepare($consInsert2);

			foreach ($comboLeng as $key => $value) {
			 	
			 	$leng = $value;
			 	$consulta -> bind_param("si",$dni,$leng);
			 	$consulta ->execute();
			 }



		}

			$select = "SELECT * from candidatos";

			$select2 = "SELECT * from programa";

			$sql2 = $conexion->query($select);
			$sql3 = $conexion->query($select2);

			echo mostrarSelect($sql2);
			echo mostrarSelect($sql3);







?>