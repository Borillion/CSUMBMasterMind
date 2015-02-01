<?php
require '../db_connection.php';

function db_count() {
	global $dbConn;
	
	if(isset($_GET['term'])){
		if(isset($_GET['DIRECTION'])){
			
			$term = $_GET['term'];
			$direction = $_GET['DIRECTION'];
			
			if(strcmp($term,"movie_title")){
				if($direction == 1){
					$sql = "SELECT * FROM movies ORDER BY movie_title ASC";
				}else{
					$sql = "SELECT * FROM movies ORDER BY movie_title DESC";		
				}
			}elseif(strcmp($term,"year")){
				if($direction == 1){
					$sql = "SELECT * FROM movies ORDER BY year ASC";
				}else{
					$sql = "SELECT * FROM movies ORDER BY year DESC";
				}
			}
		}
		
		
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt->fetchAll();
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
<meta name="author" content="babak" >

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
	<form action="">

		<select name="term">
			<option selected disabled>Choose ...</option>
			<option value="movie_title">Title</option>
			<option value="year">Year</option>
			<option value="director_id">Director</option>
		</select> <select name="DIRECTION">
			<option selected disabled>Choose Sort</option>
			<option value="1">Ascending</option>
			<option value="0">Descending</option>
		</select> <input type="submit" value="Go!" />
	</form>

	<table>
		<th></th>
		<tr>Movie Title
		</tr>
		<tr>Year
		</tr>
		<tr>Director
		</tr>
		<th></th>	
	
	<?php 
		$list = db_count();
		foreach($list as $movie){
		   echo "<tr><td>" .  $movie[0];
		   echo "</td><td>" . $movie[1];
		   echo "</td><td>" . $movie[2];
		   echo "</td></tr>";
		} 
	?>
	</table>
</body>
</html>
