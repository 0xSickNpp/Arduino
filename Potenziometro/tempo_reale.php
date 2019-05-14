<?php
	require_once 'impostazioni.php';
	$database = mysqli_connect($server, $username, $password, $db_name);
	if(isset($_POST['canc'])){
		$query = "TRUNCATE TABLE telecomunicazioni";
		mysqli_query($database, $query);
		$_POST['canc'] = NULL;
	}
	$query = "SELECT valore, orario FROM telecomunicazioni ORDER BY orario DESC";
	$result = mysqli_query($database, $query);
	$i=0;
	$last_value_leds = 0;
	echo '<!DOCTYPE html>
	<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="style_tabella.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	</head>
	<body id="body">
		<div id="nav">
			<nav>
				<img src="logo.png" id="logo">
			</nav>
		</div>
		<header><p class="text">Esperimento in tempo reale <i class="fas fa-satellite-dish"></i></p></header>
		<hr>
		<h2 id="sottotitolo_uno">Ultimo valore rilevato: ';
		if(mysqli_num_rows($result)){
			while($valore = mysqli_fetch_assoc($result) and $i != 1) {
				echo $valore['valore'];
				$last_value_leds = $valore['valore'];
				$i += 1;
			}
		}else{
			echo 'Nessun valore! Avvia il programma per l\' arduino UNO!';
		}
		echo '</h2><h3>Led accesi: ';
		if($last_value_leds > 0 && $last_value_leds <= 280){
			echo '
				1<br>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" ></i>
				<i class="fas fa-lightbulb" ></i>
				<i class="fas fa-lightbulb" ></i>
				<i class="fas fa-lightbulb" ></i>
				<br>
			';
		}else if($last_value_leds > 280 && $last_value_leds <= 450){
			echo '
				2<br>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" ></i>
				<i class="fas fa-lightbulb" ></i>
				<i class="fas fa-lightbulb" ></i>
				<br>
			';
		}else if($last_value_leds > 450 && $last_value_leds <= 640){
			echo '
				3<br>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" ></i>
				<i class="fas fa-lightbulb" ></i>
				<br>
			';
		}else if($last_value_leds > 640 && $last_value_leds <= 890){
			echo '
				4<br>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" ></i>
				<br>
			';
		}else if($last_value_leds > 890 && $last_value_leds <= 1023){
			echo '
				5<br>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" style="color:red;"></i>
				<i class="fas fa-lightbulb" style="color:red;""></i>
				<i class="fas fa-lightbulb" style="color:red;""></i>
				<i class="fas fa-lightbulb" style="color:red;""></i>
				<br>
			';
		}else{
			echo '
				0<br>
				<i class="fas fa-lightbulb" ></i>
				<i class="fas fa-lightbulb" ></i>
				<i class="fas fa-lightbulb" ></i>
				<i class="fas fa-lightbulb" ></i>
				<i class="fas fa-lightbulb" ></i>
				<br>
			';
		}
		echo '</h3>
		<h4>Ultimi risultati registrati</h4>
		<form action="tempo_reale.php" method="POST">
			<p class="truncate"></p><input type="checkbox" name="canc">Elimina tutti i risultati ottenuti
			<input type="submit" value="CONFERMA!"></p>
		</form>
    <div id="Div_primo">
    <table width="400" id="TablePrimo">
      <tr>
        <td>VALORE</td>
        <td>ORARIO</td>
      </tr>';
	$query = "SELECT valore, orario FROM telecomunicazioni ORDER BY orario DESC";
	$result = mysqli_query($database, $query);
	  $i=0;
	if(mysqli_num_rows($result)){
		while($valore = mysqli_fetch_assoc($result) and $i != 10) {
				echo '<tr>
        <td>'.$valore["valore"].'</td>
        <td>'.$valore["orario"].'</td>
      </tr>';
				$i++;
		}
	}
	echo '</td></table>';
?>

