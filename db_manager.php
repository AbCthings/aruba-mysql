<?php

	/*
	 * This PHP script performs a query to a given MySQL database, and returns the outcome. 
	 * The script can be used with a common HTTP POST request.
	 *
	 * IMPORTANT: expected input in Json format, via HTTP POST request:
	 * {
	 *	 "dbAddress" : "string",
	 *	 "username" : "string",
	 *	 "password" : "string",
	 *	 "dbName" : "string",
	 *	 "queryToPerform" : "string"
	 * }
	 *
	 * Author: Alessandro Bortoletto
	 * Date: 30/12/2019
	 *
	 */

	// Save incoming POST request data
	$postData = file_get_contents('php://input');

	// Convert the POST request data (string) into JSON
	$postDataJson = json_decode($postData, true);
	
	// Save the POST request data into variables
	$dbAddress = $postDataJson['dbAddress'];
	$username = $postDataJson['username'];
	$password = $postDataJson['password'];
	$dbName = $postDataJson['dbName'];
	$queryToPerform = $postDataJson['queryToPerform'];
	
	// Connect to database
	$dbConn = new mysqli($dbAddress,$username,$password,$dbName);
	
	// Perform the query and save the results
	$results = $dbConn->query($queryToPerform);
	
	// Return the query results
	if ($results->num_rows > 0) {
		// Output data of each row
		while($row = $results->fetch_assoc()) {
			echo json_encode($row);
			echo " "; // Add an empty space between each row of the results
		}
	} else {
		echo "The query has no results (zero rows)";
	}
		
	// Disconnect from database
	$dbConn->close();

?>
