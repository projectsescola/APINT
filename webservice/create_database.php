<?php

	include 'DriveSql.class.php';

	$instance = array();
	$instance['profesional'] = new DriveSql(DB_HOST_FPM, DB_USERNAME_FPM, DB_PASSWORD_FPM, DB_NAME_FPM);
	$instance['recreo'] = new DriveSql(DB_HOST_EPB, DB_USERNAME_EPB, DB_PASSWORD_EPB, DB_NAME_EPB);

?>