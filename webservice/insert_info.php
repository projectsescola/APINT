<?php

	require_once "web_service_config.php";

	include 'create_nusoap.php';

	include 'create_database.php';

	$informacion = array();
	$informacion['recreo'] = array();
	$informacion['profesional'] = array();

	$informacion['recreo']['cursos'] = getInfo("tabcursos",$instance['recreo']);
	$informacion['recreo']['practicas'] = getInfo("tabpracticas",$instance['recreo']);
	$informacion['recreo']['profesores'] = getInfo("tabpatrons",$instance['recreo']);
	$informacion['recreo']['barcos'] = getInfo("tabvaixells",$instance['recreo']);

	$informacion['profesional']['cursos'] = getInfo("tabcursos",$instance['profesional']);
	$informacion['profesional']['practicas'] = getInfo("tabpracticas",$instance['profesional']);
	$informacion['profesional']['profesores'] = getInfo("tabpatrons",$instance['profesional']);
	$informacion['profesional']['barcos'] = getInfo("tabvaixells",$instance['profesional']);

	$programacion = array();
	$programacion['recreo'] = array();
	$programacion['profesional'] = array();

	$programacion['recreo']['cursos'] = getInfo("progcur",$instance['recreo']);
	$programacion['recreo']['practicas'] = getInfo("progpra",$instance['recreo']);

	$programacion['profesional']['cursos'] = getInfo("progcur",$instance['profesional']);
	$programacion['profesional']['practicas'] = getInfo("progpra",$instance['profesional']);


	foreach ($informacion as $bd => $elementos) {
		foreach ($elementos as $datos) {
			foreach ($datos as $tabla => $contenidos) {
				foreach ($contenidos as $data) {
					$result = $cliente[$bd]->call("insertData", array("tabla" => $tabla,"data" => $data ) );
					if ($cliente[$bd]->fault){
					    echo "<h2>Fault</h2><pre>";
					    print_r($result);
					    echo "</pre>";
					}else{
					    $error = $cliente[$bd]->getError();
					    if ($error){
					        echo "<h2>Error</h2><pre>" . $error . "</pre>";
					    }else{
					        echo "<h2>RESULTADO</h2><pre>";
					        echo $result;
					        echo "</pre>";
					    }
					}
				}
			}
			echo "<br>";
		}
	}

	foreach ($programacion as $bd => $elementos) {
		foreach ($elementos as $datos) {
			foreach ($datos as $tabla => $contenidos) {
				foreach ($contenidos as $data) {
					$result = $cliente[$bd]->call("insertData", array("tabla" => $tabla,"data" => $data ) );
					if ($cliente[$bd]->fault){
					    echo "<h2>Fault</h2><pre>";
					    print_r($result);
					    echo "</pre>";
					}else{
					    $error = $cliente[$bd]->getError();
					    if ($error){
					        echo "<h2>Error</h2><pre>" . $error . "</pre>";
					    }else{
					        echo "<h2>RESULTADO</h2><pre>";
					        echo $result;
					        echo "</pre>";
					    }
					}
				}
			}
			echo "<br>";
		}
	}


	function getInfo($tabla,$db){
		$db->iniciar();

		$query = "SELECT * FROM ".$tabla;

		$execute_query = $db->consulta_query($query);

		$elementos = array();

		while($result_practicas = $execute_query->fetch_assoc()) {
			$elementos[$tabla][] = $result_practicas;
		}

		$db->cerrar();

		return $elementos;
	}

?>