<?php 
function mostrarSelect($resultSet)
{
	$nfilas = mysqli_num_rows($resultSet);
	if ($nfilas==0)
		$devuelve="la consulta no ha devuelto ninguna fila";
	else
	{
	$devuelve="<table border='1'>";
	$fila=(mysqli_fetch_assoc($resultSet));
    $devuelve.= "<tr>";	
	foreach ($fila as $nombreColumna=>$contenido)
	{
				$devuelve.= "<th>".$nombreColumna."</th>";
	}
	$devuelve.= "</tr>";	
    	
	
	while ($fila)
	{
		  $devuelve.= "<tr>";
	      foreach ($fila as $contenido)
	      {
				$devuelve.= "<td>".$contenido."</td>";
          }
	      $devuelve.= "</tr>";	
	      $fila=(mysqli_fetch_assoc($resultSet));	
	}
	$devuelve.= "</table>";
	}
	return $devuelve;
}
//////////////////////////////////////
function obtenerValorColumna($tabla,$nombrePK,$valorPK,$columna)
{
	global $conexion;
	$sql1="SELECT ".$columna." FROM $tabla ";
	$sql1.="WHERE ".$nombrePK." ='".$valorPK."'";
	echo $sql1;
	$resultado1=mysqli_query($conexion,$sql1);
	$fila1=mysqli_fetch_assoc($resultado1);
	return	$fila1[$columna];
}
/////////////////////////////////////
function obtenerArrayOpciones($tabla,$guarda,$muestra) {  
        global $conexion;	
        $arrayCombo = array();
        $sql="SELECT $guarda,$muestra FROM $tabla order by $muestra";
		$resultado =mysqli_query($conexion,$sql);
        while ($row = mysqli_fetch_assoc($resultado)) {
			$indice=$row[$guarda];
			$arrayCombo[$indice] =$row[$muestra];
        }
		return $arrayCombo;
    }
/////////////////////////////////////////
function pintarCombo($arrayOpciones,$nombreCombo)
	{
		echo "<p><select name='".$nombreCombo."'>";
		foreach ($arrayOpciones as $indice=>$valor)
		{
			echo "<option value='".$indice."'>".$valor."</option>";
		}
		echo "</select></p>";
	}
///////////////////////////
function pintarComboMensaje($arrayOpciones,$nombreCombo,$textoPrimeraOpcion,$valorPrimeraOpcion)
	{
		echo "<select name='".$nombreCombo."'>";
		echo "<option value='$valorPrimeraOpcion'>$textoPrimeraOpcion</option>";
		foreach ($arrayOpciones as $indice=>$valor)
		{
			echo "<option value='".$indice."'>".$valor."</option>";
		}
		echo "</select>";
	}
	///////////////////////////////
function pintarComboMultiple($arrayOpciones,$nombreCombo)
	{
		echo "<p><select multiple name='".$nombreCombo."'>";
		foreach ($arrayOpciones as $indice=>$valor)
		{
			echo "<option value='".$indice."'>".$valor."</option>";
		}
		echo "</select></p>";
	}
	/////////////////////////////////////
function pintarCheckBox($arrayOpciones,$nombreArray)
	{
		echo "<p>";
		foreach ($arrayOpciones as $indice=>$valor)
		{
			echo "<input type='checkbox' name='" .$nombreArray. "[]' value='".$indice."'>".$valor."<br>\n";
		}
		echo "</p>";
	}
?>