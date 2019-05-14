<?php
	require_once 'impostazioni.php';

	if (isset($_POST['valore']) && isset($_POST['orario'])) {
		$database = mysqli_connect($server, $username, $password, $db_name);
		$query = "INSERT INTO telecomunicazioni (valore, orario) VALUES ('".$_POST['valore']."', '".$_POST['orario']."')";
		mysqli_query($database, $query);
	}else{
		echo "Error: No post request detected. Are you sure that you are the python script?";
	}
?>
