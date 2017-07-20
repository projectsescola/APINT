<?php
	//Libreria NuSoap
	require_once "nusoap/nusoap.php";

	$cliente = array();
	$cliente['recreo'] = new nusoap_client(NUSOAP_EPB);
	$cliente['profesional'] = new nusoap_client(NUSOAP_FPM);

	foreach ($cliente as $client) {
		$error = $client->getError();
		if ($error) {
		    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
		}
	}