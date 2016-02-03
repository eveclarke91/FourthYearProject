<?PHP
function create_student($fname, $lname, $classid){ //create user sql
	$uniqueid = sprintf("%06d", mt_rand(1, 999999)); //generates a unique id based on miliseconds.
	$connection = db_connect(); //connect to database		
	$query = "INSERT INTO `project`.`student` (`id`, `class_id`, `login_code`, `first_name`, `last_name`) VALUES (NULL, '$classid', '$uniqueid', '$fname', '$lname')";
	$result = mysqli_query($connection,$query); //perform query
	if($result){ //check if query ran

	}else{
		add_error("Student not created, Error in SQL");	
	}
	db_close($connection);
}

?>