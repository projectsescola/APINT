<?php
	include 'carga.php';

	$informacion_fpm = array();
	$programacion_fpm = array();

	$informacion_fpm['cursos'] = getInfo("tabcursos",$instanceFPM);
	$informacion_fpm['practicas'] = getInfo("tabpracticas",$instanceFPM);
	$informacion_fpm['profesores'] = getInfo("tabpatrons",$instanceFPM);
	$informacion_fpm['barcos'] = getInfo("tabvaixells",$instanceFPM);

	$programacion_fpm['cursos'] = getInfo("progcur",$instanceFPM);
	$programacion_fpm['practicas'] = getInfo("progpra",$instanceFPM);

	$informacion_epb = array();
	$programacion_epb = array();

	$informacion_epb['cursos'] = getInfo("tabcursos",$instanceEPB);
	$informacion_epb['practicas'] = getInfo("tabpracticas",$instanceEPB);
	$informacion_epb['profesores'] = getInfo("tabpatrons",$instanceEPB);
	$informacion_epb['barcos'] = getInfo("tabvaixells",$instanceEPB);

	$programacion_epb['cursos'] = getInfo("progcur",$instanceEPB);
	$programacion_epb['practicas'] = getInfo("progpra",$instanceEPB);

	foreach ($informacion_fpm as $categoria => $tabla) {
		foreach ($tabla as $titulo => $datos) {
			foreach ($datos as $data) {
				$result = $clienteFPM->call("insertData", array("tabla" => $titulo,"data" => $data ) );
				if ($clienteFPM->fault){
				    echo "<h2>Fault</h2><pre>";
				    print_r($result);
				    echo "</pre>";
				}else{
				    $error = $clienteFPM->getError();
				    if ($error){
				        echo "<h2>Error</h2><pre>" . $error . "</pre>";
				    }else{
				        echo "<h2>RESULTADO</h2><pre>";
				        echo $result;
				        echo "</pre>";
				    }
				}
			}
			echo "<br>";
		}
	}

	foreach ($informacion_epb as $categoria => $tabla) {
		foreach ($tabla as $titulo => $datos) {
			foreach ($datos as $data) {
				$result = $clienteEPB->call("insertData", array("tabla" => $titulo,"data" => $data ) );
				if ($clienteEPB->fault){
				    echo "<h2>Fault</h2><pre>";
				    print_r($result);
				    echo "</pre>";
				}else{
				    $error = $clienteEPB->getError();
				    if ($error){
				        echo "<h2>Error</h2><pre>" . $error . "</pre>";
				    }else{
				        echo "<h2>RESULTADO</h2><pre>";
				        echo $result;
				        echo "</pre>";
				    }
				}
			}
			echo "<br>";
		}
	}

	

	foreach ($programacion_fpm as $categoria => $tabla) {
		foreach ($tabla as $titulo => $datos) {
			foreach ($datos as $data) {
				$result = $clienteFPM->call("insertData", array("tabla" => $titulo,"data" => $data ) );
				if ($clienteFPM->fault){
				    echo "<h2>Fault</h2><pre>";
				    print_r($result);
				    echo "</pre>";
				}else{
				    $error = $clienteFPM->getError();
				    if ($error){
				        echo "<h2>Error</h2><pre>" . $error . "</pre>";
				    }else{
				        echo "<h2>RESULTADO</h2><pre>";
				        echo $result;
				        echo "</pre>";
				    }
				}
			}
			echo "<br>";
		}
	}

	foreach ($programacion_epb as $categoria => $tabla) {
		foreach ($tabla as $titulo => $datos) {
			foreach ($datos as $data) {
				$result = $clienteEPB->call("insertData", array("tabla" => $titulo,"data" => $data ) );
				if ($clienteEPB->fault){
				    echo "<h2>Fault</h2><pre>";
				    print_r($result);
				    echo "</pre>";
				}else{
				    $error = $clienteEPB->getError();
				    if ($error){
				        echo "<h2>Error</h2><pre>" . $error . "</pre>";
				    }else{
				        echo "<h2>RESULTADO</h2><pre>";
				        echo $result;
				        echo "</pre>";
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