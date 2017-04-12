		<?php
			//echo $train_number;
			extract($_GET);
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

			$sql = "SELECT * FROM `video` where `category` = '".$category."';";
			//echo "</br>".$sql;
			$result = $conn->query($sql);

			$response_json = array();
			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			    	$temp_res = array();
			        $temp_res['video_name'] = $row['video_name'];
			        $temp_res['thumb_img'] = $row['id'];
			        $temp_res['duration'] = $row['duration'];
			        $temp_res['details'] = $row['details'];
			        $temp_res['channel'] = $row['channel'];
			        $temp_res['rating'] = $row['rating'];
			        $temp_res['views'] = $row['views'];
			        $temp_res['id'] = $row['id'];
			        $temp_res['likes'] = $row['likes'];
			        $temp_res['user_id'] = $row['user_id'];
			        array_push($response_json, $temp_res);
			    }
			} else {
			    echo "0 results";
			}
			$conn->close();
			echo json_encode($response_json);
			
		?>