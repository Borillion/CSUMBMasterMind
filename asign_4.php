<?php
require '../db_connection.php';
function db_count() {
	global $dbConn;
	$sql = "SELECT * FROM movies";
	$stmt = $dbConn->prepare ( $sql );
	$stmt->execute ();
	return $stmt->fetchAll ();
}
function table_header($sort_order = null) {
	global $dbConn;
	
	$sql = "SELECT * FROM movies";
	
	
	if ($sort_order == null) {
		echo "<tr>";
		echo '	<th><a href="?sort=0&field=0">Title</a></th>';
		echo '	<th><a href="?sort=0&field=1">Year</th>';
		echo '	<th><a href="?sort=0&field=2">Director</th>';
		echo "</tr>";
	} else {		
		// user clicks heading to sort
		if (isset ( $_GET ['sort'] )) {
			$sort_order = $_GET ['sort'];
			if (isset ( $_GET ['field'] )) {
				$sort_field = $_GET ['field'];
				// if sort equal 0, then unsorted
				if ($sort_order == 0) {
					// set order descending
					$sort_field = "movie_title";
					echo "<tr>";
					echo '	<th><a href="?sort=1&field=0">Title</a></th>';
					echo '	<th><a href="?sort=1&field=1">Year</th>';
					echo '	<th><a href="?sort=1&field=2">Director</th>';
					echo "</tr>";
					$sql .= " ORDER BY $sort_field = :s_field ASC";
				} elseif ($sort_order == 1) {
					// sort the movies decending
					$sort_field = "year";
					echo "<tr>";
					echo '	<th><a href="?sort=2&field=0">Title</a></th>';
					echo '	<th><a href="?sort=2&field=1">Year</th>';
					echo '	<th><a href="?sort=2&field=2">Director</th>';
					echo "</tr>";
					$sql .= " ORDER BY $sort_field = :s_field DESC";
				} else {
					echo "<tr>";
					echo '	<th><a href="?sort=0&field=0">Title</a></th>';
					echo '	<th><a href="?sort=0&field=1">Year</th>';
					echo '	<th><a href="?sort=0&field=2">Director</th>';
					echo "</tr>";
					$sql = "SELECT * FROM movies";
				}
			}
		}
		$stmt = $dbConn->prepare ( $sql );
		$stmt->execute ( array (
				':s_field' => $sort_field 
		) );
		return $stmt->fetchAll ();
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>HTML</title>
<meta name="description" content="">
<meta name="author" content="babak">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
	<table>
		<?php print_r(table_header()); ?>
	</table>
</body>
</html>
