<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Search</title>
	</head>
	<body>
	<?	
	  	$input = isset($_POST[ "movie" ]) ? $_POST[ "movie" ] : "";

		$input = str_replace('{', '', $input);
		$input = str_replace('}', '', $input);
		$input = str_replace("'", "''", $input);
		$input = str_replace(':', ',', $input);
				
		$parsed = str_getcsv($input, ',', '"');
			
		for($i = 0; $i < 30; $i++)
		{
			print ("line " . $i . " " . $parsed[$i] . "<br>");
			$parsed[$i] = htmlspecialchars($parsed[$i]);
		}
			
			
		$title = $parsed[1];
		$title = str_replace(',', ':', $title);
		$year = $parsed[3];
		$rating = $parsed[5];
		$releasedate = $parsed[7];
		$runtime = $parsed[9];
		$genre = $parsed[11];
		$director = $parsed[13];
		$writer = $parsed[15];
		$actors = $parsed[17];
		$plot = $parsed[19];
		$language = $parsed[21];
		$country = $parsed[23];
		$awards = $parsed[25];
		$poster = $parsed[27];
		$poster = str_replace(',', ':', $poster);
		
		$title = htmlspecialchars_decode($title);
		$year = htmlspecialchars_decode($year);
		$rating = htmlspecialchars_decode($rating);
		$releasedate = htmlspecialchars_decode($releasedate);
		$runtime = htmlspecialchars_decode($runtime);
		$genre = htmlspecialchars_decode($genre);
		$director = htmlspecialchars_decode($director);
		$writer = htmlspecialchars_decode($writer);
		$actors = htmlspecialchars_decode($actors);
		$plot = htmlspecialchars_decode($plot);
		$language = htmlspecialchars_decode($language);
		$country = htmlspecialchars_decode($country);
		$awards = htmlspecialchars_decode($awards);
		
		$inStock = rand(1, 15);
		$rentedOut = rand(0, 5);
		$price = rand(1, 4);
		$price += 0.99;
		
		// Build query
		$query = "INSERT INTO movies (ID, Title, Year, Rating, ReleaseDate, Runtime, Genre, Director, Writer, Actors, Plot, Language, Country, Awards, Poster, Price, InStock, RentedOut) 
		VALUES (NULL, '$title', '$year', '$rating', '$releasedate', '$runtime', '$genre', '$director', '$writer', '$actors', '$plot', '$language', '$country', '$awards', '$poster', '$price', '$inStock', '$rentedOut');";
		
		// Connect to MySQL
		if ( !( $database = mysql_connect( "localhost", "testuser", "99AnY4mhCxcg" )))
			die( "Could not connect to rental database. </body></html>" );
		
		// Open rental database
		if ( !mysql_select_db( "rentaldb", $database ) )
			die( "Could not open rental database. </body></html>" );
			
		// Query rental database
     	if ( !( $result = mysql_query( $query, $database ) ) )
     	{
     		print( "<p>Could not execute query!</p>" );
     		die( mysql_error() . "</body></html>" );
      	} // end if
      	
      	mysql_close($database);
	?>

	<p><? print($title)?> has been entered. <a href = "admin-insert.html">Enter</a> another movie or <a href ="search.html"</a> the database. </p>
		
	</body>
</html>