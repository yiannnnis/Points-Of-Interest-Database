<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>Πόλεις</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>


<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>

<body>
<h1>Περιεχόμενο σχέσης city</h1>


<?php
$link = pg_connect("host=$host dbname=$db user=$user password=$pass") 
	or die ("Could not connect to server\n"); 

$result = pg_exec($link, "SELECT * FROM city")
	or die("Cannot execute query: $query\n");

$numrows = pg_numrows($result);
?>

<table border="1">
	<tr>
		<th>id</th>
		<th>όνομα</th>
		<th>πολιτεία</th>
		<th>χώρα</th>
		<th>πλάτος</th>
		<th>μήκος</th>
	</tr>
	<?php
	// Loop on rows in the result set.

	for($ri = 0; $ri < $numrows; $ri++) {
		echo "<tr>\n";
		$row = pg_fetch_array($result, $ri);
		echo " <td>", $row["id"], "</td>
		<td>", $row["name"], "</td>
		<td>", $row["state"], "</td>
		<td>", $row["country"], "</td>
		<td>", $row["longitude"], "</td>
		<td>", $row["latitude"], "</td>
		</tr>
		";
	}
	pg_close($link);
	?>
</table>

<h3> <a href="http://hilon.dit.uop.gr/~db1u02/index.php">Επιστροφή στην αρχική σελίδα</a></h3>


</body>
</html>