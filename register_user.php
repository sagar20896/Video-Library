<?php
	extract($_POST);
	$new_user_id = 0;
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "video_library";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT MAX(user_id) FROM `users` WHERE 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	$new_user_id = $row['MAX(user_id)'];
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();

	$new_user_id++;
	//echo "<br>New user id:".$new_user_id;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die('<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content=""><title>Video Library</title><!-- Bootstrap Core CSS --><link href="css/bootstrap.min.css" rel="stylesheet"><!-- Custom CSS --><link href="css/shop-homepage.css" rel="stylesheet"><!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesnt work if you view the page via file:// --><!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]--><!--I love you--><script src="js/jquery.js"></script><script type="text/javascript">$(document).ready(function(){console.log("Rendering page!!");});</script></head><body><!-- Navigation --><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><div class="container"><!-- Brand and toggle get grouped for better mobile display --><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="http://localhost/Video-Library/">HOME</a></div><!-- Collect the nav links, forms, and other content for toggling --><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><ul class="nav navbar-nav"><li><a href="#">Channels</a></li><li><a href="http://localhost/Video-Library/search.html">Search</a></li><li><a href="#">Contact</a></li></ul></div><!-- /.navbar-collapse --></div><!-- /.container --></nav><!-- Page Content --><div class="container"><div class="row" id="channels"><div class="col-md-3"><p class="lead">Video Library</p></div><legend>Oops, Looks like something went wrong :(</legend>        <div class="col-md-9"><div class="row" id="videos_body"></div></div></div></div><!-- /.container --><div class="container"><hr><!-- Footer --><footer><div class="row"><div class="col-lg-12"><p>Copyright &copy; Video Library 2017</p></div></div></footer></div><!-- /.container --><!-- jQuery --><script src="js/jquery.js"></script><!-- Bootstrap Core JavaScript --><script src="js/bootstrap.min.js"></script></body></html>');
	} 
//INSERT INTO `video_library`.`users` (`user_name`, `user_email`, `password`, `user_id`) VALUES ('sagar', 'vidyasagar20896@gmail.com', 'sagar', '1');

	$sql = "INSERT INTO `video_library`.`users` (`user_name`, `user_email`, `password`, `user_id`) VALUES ('".$user_name."', '".$user_email."', '".$user_password."', '".$new_user_id."');";

	if ($conn->query($sql) === TRUE) {
	    echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content=""><title>Video Library</title><!-- Bootstrap Core CSS --><link href="css/bootstrap.min.css" rel="stylesheet"><!-- Custom CSS --><link href="css/shop-homepage.css" rel="stylesheet"><!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesnt work if you view the page via file:// --><!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]--><!--I love you--><script src="js/jquery.js"></script><script type="text/javascript">$(document).ready(function(){console.log("Rendering page!!");});</script></head><body><!-- Navigation --><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><div class="container"><!-- Brand and toggle get grouped for better mobile display --><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="http://localhost/Video-Library/">HOME</a></div><!-- Collect the nav links, forms, and other content for toggling --><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><ul class="nav navbar-nav"><li><a href="#">Channels</a></li><li><a href="http://localhost/Video-Library/search.html">Search</a></li><li><a href="#">Contact</a></li></ul></div><!-- /.navbar-collapse --></div><!-- /.container --></nav><!-- Page Content --><div class="container"><div class="row" id="channels"><div class="col-md-3"><p class="lead">Video Library</p></div><legend>You have been registered successfully</legend>        <div class="col-md-9"><div class="row" id="videos_body"></div></div></div></div><!-- /.container --><div class="container"><hr><!-- Footer --><footer><div class="row"><div class="col-lg-12"><p>Copyright &copy; Video Library 2017</p></div></div></footer></div><!-- /.container --><!-- jQuery --><script src="js/jquery.js"></script><!-- Bootstrap Core JavaScript --><script src="js/bootstrap.min.js"></script></body></html>';
	} else {
	    echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content=""><title>Video Library</title><!-- Bootstrap Core CSS --><link href="css/bootstrap.min.css" rel="stylesheet"><!-- Custom CSS --><link href="css/shop-homepage.css" rel="stylesheet"><!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesnt work if you view the page via file:// --><!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]--><!--I love you--><script src="js/jquery.js"></script><script type="text/javascript">$(document).ready(function(){console.log("Rendering page!!");});</script></head><body><!-- Navigation --><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><div class="container"><!-- Brand and toggle get grouped for better mobile display --><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="http://localhost/Video-Library/">HOME</a></div><!-- Collect the nav links, forms, and other content for toggling --><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><ul class="nav navbar-nav"><li><a href="#">Channels</a></li><li><a href="http://localhost/Video-Library/search.html">Search</a></li><li><a href="#">Contact</a></li></ul></div><!-- /.navbar-collapse --></div><!-- /.container --></nav><!-- Page Content --><div class="container"><div class="row" id="channels"><div class="col-md-3"><p class="lead">Video Library</p></div><legend>Oops, Looks like something went wrong :(</legend>        <div class="col-md-9"><div class="row" id="videos_body"></div></div></div></div><!-- /.container --><div class="container"><hr><!-- Footer --><footer><div class="row"><div class="col-lg-12"><p>Copyright &copy; Video Library 2017</p></div></div></footer></div><!-- /.container --><!-- jQuery --><script src="js/jquery.js"></script><!-- Bootstrap Core JavaScript --><script src="js/bootstrap.min.js"></script></body></html>';
	}

	$conn->close();

?>


