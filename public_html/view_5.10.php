<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>5.10</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>


<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>

<body>
<h1>5.10</h1>


<?php
$link = pg_connect("host=$host dbname=$db user=$user password=$pass") 
	or die ("Could not connect to server\n"); 

$result = pg_exec($link, "SELECT DISTINCT users.name AS tab1, users.surname AS tab2
                            FROM users, poi, check_in, located, city
                            WHERE user_id=users.id
                            AND check_in.poi_id=poi.id
                            AND located.poi_id=poi.id
                            AND located.city_id=city.id
                            AND city.country='Greece'
                            AND year=2012
                            AND month=6
                            UNION
                            SELECT DISTINCT users.name AS tab1, users.surname AS tab2
                            FROM users, poi, check_in, located, city
                            WHERE user_id=users.id
                            AND check_in.poi_id=poi.id
                            AND located.poi_id=poi.id
                            AND located.city_id=city.id
                            AND city.country='Greece'
                            AND year=2012
                            AND month=7
                            UNION
                            SELECT DISTINCT users.name AS tab1, users.surname AS tab2
                            FROM users, poi, check_in, located, city
                            WHERE user_id=users.id
                            AND check_in.poi_id=poi.id
                            AND located.poi_id=poi.id
                            AND located.city_id=city.id
                            AND city.country='Greece'
                            AND year=2012
                            AND month=8;")
	or die("Cannot execute query: $query\n");

$numrows = pg_numrows($result);
?>


<table border="1">
	<tr>
		<th>??????????</th>
        <th>??????????????</th>
	</tr>
	<?php
	// Loop on rows in the result set.

	for($ri = 0; $ri < $numrows; $ri++) {
		echo "<tr>\n";
		$row = pg_fetch_array($result, $ri);
		echo " <td>", $row["tab1"], "</td>
        <td>", $row["tab2"], "</td>
		</tr>
		";
	}
	pg_close($link);
	?>
</table>

<h3> <a href="http://hilon.dit.uop.gr/~db1u02/index.php">?????????????????? ???????? ???????????? ????????????</a></h3>


</body>
</html>