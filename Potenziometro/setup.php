<?php
	require_once 'impostazioni.php';
	$database = mysqli_connect($server, $username, $password, $db_name);
	$query = "CREATE TABLE `tabella_valori` (
  `id` text NOT NULL PRIMARY KEY,
  `potenza` text NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  	mysqli_query($database, $query);
?>