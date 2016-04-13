<?PHP 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "admin";
	$db = "project";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

	$student_code = $_POST["student_code"];
	$game_type = $_POST["game_type"];
	$game_difficulty = $_POST["game_difficulty"];
	$game_score = $_POST["game_score"];
	$date = date('Y-m-d');

	$query = "INSERT INTO `result` (`student_id`, `date`, `game_name`, `difficulty`, `score`) VALUES ($student_code, '$date', '$game_type', '$game_difficulty', $game_score)";
	
	$result = mysqli_query($connection,$query); //perform query
	if($result){ 
		echo true;
	}else{
		echo false;
	}
	mysqli_close($connection);
?>