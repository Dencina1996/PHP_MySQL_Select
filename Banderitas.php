<!-- Tot va amb lletra capital (Validar BBDD prèviament) -->

<html>
 <head>
 	<meta charset="utf-8">
 	<title>Llistat de Països</title>
 </head>
 <body>
 	<h2>Llistat de Països</h2>
 	<?php
 		$Server = "localhost";
		$Username = "Dencina";
		$Password = "P@ssw0rd";
		$BBDD = "World";

 		$Connection = mysqli_connect($Server,$Username,$Password,$BBDD);
 
 		$Query = "SELECT CI.Name CityName, CI.CountryCode CountryName, CO.Name CoName FROM City CI, Country CO WHERE CI.CountryCode=CO.Code ORDER BY CI.Name";
 
 		$Result = mysqli_query($Connection, $Query);
 
 		if (!$Result) {
     			$Message  = 'Query invàlida: ' . mysqli_error() . "\n";
     			$Message .= 'Query realitzada: ' . $Query;
     			die($Message);
 		}

 	?>
 	<form action="Page_2.php" method='POST'>
 	<table style="border: solid 5px black">
 		<thead><td colspan="4" align="center" bgcolor="cyan">Llistat de ciutats</td></thead>
 	<?php
		while($Registry = mysqli_fetch_assoc($Result)) {
 			echo "<tr style='border: solid 5px black'>";
 			echo "<td style='border: solid 5px black bottom'><input type='checkbox' value='".$Registry["CountryName"].".png' width='300px'>".$Registry["CityName"]."</td>";
 			echo "<td style='border: solid 5px black'><img src='Flags/".$Registry["CoName"].".png' height= '50px' width='100px'></td>";
 			echo "</tr>";
 		}
 	?>
 	</table>
 	<input type='submit' value='Recollir Països'>
 	</form>
 </body>
</html>