<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pàgina 2</title>
</head>
<body>
	<table>
	<?php
		$Country = $_POST['CountryBoxName'];

		$Server = "localhost";
		$Username = "Dencina";
		$Password = "P@ssw0rd";
		$BBDD = "World";

 		$Connection = mysqli_connect($Server,$Username,$Password,$BBDD);
 
 		$Query = "SELECT CI.Name CityName, CO.Name CountryName FROM City CI, Country CO WHERE CI.CountryCode=CO.Code AND CO.Code = '".$Country."'";
 
 		$Result = mysqli_query($Connection, $Query);
 
 		if (!$Result) {
     			$Message  = 'Query invàlida: ' . mysqli_error() . "\n";
     			$Message .= 'Query realitzada: ' . $Query;
     			die($Message);
 		}

 	?>
 	<table border="solid 5px black">
	 	<thead>
	 		<td colspan="1" align="center" bgcolor="cyan">Ciudad</td>
	 		<td colspan="1" align="center" bgcolor="cyan">País</td>
	 	</thead>
		<?php
	 		while( $Registry = mysqli_fetch_assoc($Result) )
	 		{
	 			echo "\t\t<td>".$Registry["CityName"]."</td>\n";
	 			echo "\t\t<td>".$Registry['CountryName']."</td>\n";
	 			echo "\t</tr>\n";
	 		}
	?>
	</table>	
</body>
</html>