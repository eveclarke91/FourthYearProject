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


function get_all_students(){
	$teacherid = $_SESSION['id'];	
	$connection = db_connect(); //connect to database	
	$query = "SELECT * FROM student INNER JOIN class ON student.class_id = class.id WHERE class.teacher_id = '$teacherid'  ORDER BY student.class_id";
	$result = mysqli_query($connection,$query); //perform query
	if($result){ //check if query ran
	
		while($row = $result->fetch_array()){
			$rows[] = $row;
		}		
		return $rows;
	}else{
		add_error("SQL ERROR");	
	}
	db_close($connection);
	
}


function update_studentname($fname ,$lname, $id){
	$connection = db_connect();

	$query = "UPDATE `student` SET `first_name` = '$fname', `last_name` = '$lname' WHERE `student`.`id` = '$id'";

	$result = mysqli_query($connection,$query); 

	if($result){ //check if query ran

	}else{	

	}
	db_close($connection);

}


function delete_student($id){
	$connection = db_connect();

	$query = "DELETE FROM `student` WHERE `student`.`id` = '$id'";

	$result = mysqli_query($connection,$query); 

	if($result){ //check if query ran

	}else{	

	}
	db_close($connection);

}


?>