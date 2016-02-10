<?PHP
function create_user($email, $firstname, $lastname, $school, $pass){ //create user sql
	$pass = sha1($pass); //encrypt password	
	$connection = db_connect(); //connect to database		
	$query = "INSERT INTO `project`.`teacher` (`id`, `firstname`, `lastname`, `email`, `pass`, `school`) VALUES (NULL, '$firstname', '$lastname', '$email', '$pass', '$school')";
	$result = mysqli_query($connection,$query); //perform query
	if($result){ //check if query ran
		add_success("Teacher Created");//add success message
	}else{
		add_error("Teacher not created, Error in SQL");		
	}
	db_close($connection);
	header('location: index.php');	
	die();
}


function login_user($email, $pass) {
	$pass = sha1($pass);
	$connection = db_connect();

	$query = 'SELECT * FROM `project`.`teacher` WHERE `email` = "'.$email.'" AND pass = "'.$pass.'"'; //create login query
	$result = mysqli_query($connection,$query); //perform login query
	
	if($result){ //check if query ran
		if(mysqli_num_rows($result) > 0){ //if any logins are found
			//session_clear(); //clear current session variables			
			//username details
			$resultset = mysqli_fetch_assoc($result); //get array of values from database
			$_SESSION['email'] = $resultset['email']; //Set details as session variables
			$_SESSION['id'] = $resultset['id'];
			$_SESSION['firstname'] = $resultset['firstname'];
			$_SESSION['lastname'] = $resultset['lastname'];	
			$_SESSION['school'] = $resultset['school'];	

			add_success($resultset['firstname']." ".$resultset['lastname']." Logged in Successfully");	
			db_close($connection);
			header('location: dashboard/home.php');	
			die();
			
		}else{
			add_error("Login Incorrect"); //add error message
			db_close($connection);
			header('location: index.php');	
			die();
		}
	}else{
		add_error("Login Mysql didnt work.");
		db_close($connection);
		header('location: index.php');	
		die();		
	}


}
?>