<!DOCTYPE html>
<!-- Display search results after querying the database. --> 
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Search Results</title>
		<style type = "text/css">
			body {font-family: sans-serif; background-color: lightyellow;}
			table {background-color: lightblue; border-collapse: collapse; border: 1px solid gray;}
			td {padding: 5px; font-size: 1.5em;}
		 	tr:nth-child(odd){background-color: white;}
		 	.results {max-width: 1200px; width: 100%; margin: 0 auto; position: relative;}
		</style>
	</head>
	<body>
	<?php
		$genre = isset($_POST["genre"]) ? $_POST["genre"] : ""; // create variable for genre 

		// Build query
		if ($genre == "All") {
			$query = "SELECT * FROM movies ORDER BY Year DESC, Awards ASC;";
		}
		
		else {
			$query = "SELECT * FROM movies WHERE Genre LIKE '%$genre%' ORDER BY Year DESC, Awards ASC;";
		}	
		
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
	?>	<!-- end PHP script -->
	<div class="results">
		<table>
			<caption><?php print("<h2>$genre </h2>")?></caption>
			<?php
				// Fetch each record in result set
				while ($row = mysql_fetch_assoc($result))
				{
					// These are all of the columns within each record. They are (currently) not all used.
					$id = $row["ID"];
					$title = $row["Title"];
					$year = $row["Year"];
					$rating = $row["Rating"];
					$releasedate = $row["ReleaseDate"];
					$runtime = $row["Runtime"];
					$genre = $row["Genre"];
					$director = $row["Director"];
					$writer = $row["Writer"];
					$actors = $row["Actors"];
					$plot = $row["Plot"];
					$language = $row["Language"];
					$country = $row["Country"];
					$awards = $row["Awards"];
					$poster = $row["Poster"];
					$price = $row["Price"];
					$inStock = $row["InStock"];
					$rentedOut = $row["RentedOut"];
				
					// Build table to display results
					print( "<tr valign='top'>" );
						print( "<td><img src=$poster width=270 height=400/></td>");
						print( "<td><h2><b>$title ($year)</b></h2><b>Stars:</b> $actors<br><b>Director:</b> $director<br><b>Writers:</b> $writer<br>" );
						print( "<br>$plot<br><br>Rent for $" );
						print("$price<br>");
						if($inStock == 0)
							{print("<br><b style='color:red;'>Out of stock. Please check back later.</b><br>");} // Disable 'Add to Cart' once implemented
					print( "</td></tr>" );
					
				} // end while
			?><!-- end PHP script -->
		</table>
	</div>
	<p>Your search yielded <?php print( mysql_num_rows ($result) )?> result(s).</p>
	
	</body>
</html>