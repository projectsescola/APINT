<?php
	require_once "web_service_config.php";

	//Libreria NuSoap
	include 'create_nusoap.php';

	$tablas_info = array(
		"recreo" => array(
			"tabcursos",
			"tabpracticas",
			"tabvaixells",
			"tabpatrons"
		),
		"profesional" => array(
			"tabcursos",
			"tabpracticas",
			"tabvaixells",
			"tabpatrons"
		),
	);
	
	$tablas_programacion = array(
		"recreo" => array(
			"progcur",
			"progpra",
		),
		"profesional" => array(
			"progcur",
			"progpra",
		),
	);

	foreach ($tablas_info as $bd => $tablas) {
		foreach ($tablas as $tabla) {
			$result = $cliente[$bd]->call("truncateTable", array("tabla" => $tabla) );
			if ($cliente[$bd]->fault){
			    echo "<h2>Fault</h2><pre>";
			    var_dump( $result );
			    echo "</pre>";
			}else{
			    $error = $cliente[$bd]->getError();
			    if ($error){
			        echo "<h2>Error</h2><pre>" . $error . "</pre>";
			    }else{
			        echo "<h2>RESULTADO</h2><pre>";
			        var_dump( $result );
			        echo "</pre>";
			    }
			}
		}
	}

	foreach ($tablas_programacion as $bd => $tablas) {
		foreach ($tablas as $tabla) {
			$result = $cliente[$bd]->call("truncateTable", array("tabla" => $tabla) );
			if ($cliente[$bd]->fault){
			    echo "<h2>Fault</h2><pre>";
			    var_dump( $result );
			    echo "</pre>";
			}else{
			    $error = $cliente[$bd]->getError();
			    if ($error){
			        echo "<h2>Error</h2><pre>" . $error . "</pre>";
			    }else{
			        echo "<h2>RESULTADO</h2><pre>";
			        var_dump( $result );
			        echo "</pre>";
			    }
			}
		}
	}

?>