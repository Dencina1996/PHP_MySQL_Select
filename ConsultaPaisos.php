<!-- Tot va amb lletra capital (Validar BBDD prèviament) -->

<html>
 <head>
 	<meta charset="utf-8">
 	<title>Llistat de Països</title>
 	<link rel="stylesheet" type="text/css" href="Styles.css">
 </head>
 <body>
 	<h2>Llistat de Països</h2>
 	<?php
 		$Server = "localhost";
		$Username = "Dencina";
		$Password = "P@ssw0rd";
		$BBDD = "World";

 		$Connection = mysqli_connect($Server,$Username,$Password,$BBDD);
 
 		$Query = "SELECT CI.Name CityName, CI.CountryCode CountryName FROM City CI, Country CO WHERE CI.CountryCode=CO.Code ORDER BY CI.Name";
 
 		$Result = mysqli_query($Connection, $Query);
 
 		if (!$Result) {
     			$Message  = 'Query invàlida: ' . mysqli_error() . "\n";
     			$Message .= 'Query realitzada: ' . $Query;
     			die($Message);
 		}

 	?>
 	<form action="Page_2.php" method='POST'>
 	<select name="CountryBoxName">
 	<?php
		while($Registry = mysqli_fetch_assoc($Result)) {
 			echo "<option value='".$Registry["CountryName"]."' width='300px'>".$Registry["CityName"]."</option>";
 		}
 	?>
 	</select>
 	<input type='submit' value='Recollir Països'>
 	</form>
 </body>
</html>