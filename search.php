<!DOCTYPE html>
<!-- Display search results after querying the database. --> 
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Search Results</title>
	</head>
	<body>
	<?php
		// Get genre
		$genre = isset($_POST["genre"]) ? $_POST["genre"] : "All";
		
		// Build query
		if ($genre == "All") {
			$query = "SELECT * FROM movies ORDER BY Year DESC, Awards ASC;";
		}
		
		else {
			$query = "SELECT * FROM movies WHERE Genre LIKE '%$genre%' ORDER BY Year DESC, Awards ASC;";
		}	

		$servername = "localhost";
		$username = "id347143_admin";
		$password = "v3BGu7rZXjGh7GAh";
		$database = "id347143_rentaldb";

		// Create connection
		$connection = mysqli_connect($servername, $username, $password, $database);

		// Check connection
		if (!$connection) {
		    die("Connection to rental database failed: " . mysqli_connect_error());
		}		
		// Query rental database
		if ( !( $result = mysqli_query( $connection, $query ) ) )
		{
			print( "<p>Could not execute query on rental database.</p>" );
			die( mysqli_error() . "</body></html>" );
		}
      	
      	 	mysqli_close($database);
	?>	<!-- end PHP script -->
	<div class="results">
		<table>
			<caption><?php print("<h2>$genre </h2>")?></caption>
			<?php
				// Fetch each record in result set
				while ($row = mysqli_fetch_assoc($result))
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
	<p>Your search yielded <?php print( mysqli_num_rows ($result) )?> result(s).</p>
	
	</body>
</html>
