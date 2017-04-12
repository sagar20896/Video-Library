<?php
	//SELECT * FROM `video` GROUP BY `category` ORDER BY `likes` DESC
	//extract($_GET);
	//echo "**".$category."**";
	
	header("Content-type:application/json");
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "video_library";
	/*$servername = "0.0.0.0:3306";
	$username = "root";
	$password = "yash";
	$dbname = "TEST";*/
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM `video` GROUP BY `category` ORDER BY `likes` DESC";
	//echo "</br>".$sql;
	$result = $conn->query($sql);

	$response_json = array();
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$temp_res = array();
	        $temp_res['id'] = $row['id'];
	        $temp_res['category'] = $row['category'];
	        array_push($response_json, $temp_res);
	    }
	} else {
	    echo "0 results";
	}
	//echo count($response_json);
	$conn->close();
	echo json_encode($response_json);
	
?>