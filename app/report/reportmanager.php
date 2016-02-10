<?PHP
function get_average_score($student_id, $game_type, $difficulty){
	$connection = db_connect(); //connect to database		
	$query = "SELECT `score` FROM `result` WHERE `student_id` = '$student_id' AND `game_name` = '$game_type' AND `difficulty` = '$difficulty'";
	$result = mysqli_query($connection,$query); //perform query
	if($result){ //check if query ran

    $numrows = mysqli_num_rows ($result);

    $sum = 0;
    while($row = mysqli_fetch_assoc($result)) {
    	$sum += $row['score'];
     }

     $average = $sum / $numrows;
     return $average;
      //add_success("Average Returned");

	}else{
		add_error("Error in Average Score SQL");		
	}
	db_close($connection);

}

//get the average score of a particular game at a particular difficulty of a class
function get_class_average($class_id, $game_type, $difficulty){
    $connection = db_connect();
    $query = "SELECT score FROM result INNER JOIN student ON result.student_id = student.id WHERE student.class_id = '$class_id' AND result.game_name = '$game_type' AND result.difficulty = '$difficulty'";
    $result = mysqli_query($connection, $query);
    if($result){

        $numrows = mysqli_num_rows($result);
        $sum = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $sum += $row['score'];

        }

        $average = $sum / $numrows;
        return $average;

    }else{
        add_error("Error in Average class score SQL");
    }
    db_close($connection);
}





//Get the last fivve results for a game and a difficulty type
// loop through each row, make an array that has the date and score and put that into last5results array.



function get_last5_results($student_id, $game_type, $difficulty){
    $connection = db_connect();
    $query = "SELECT score, date FROM result WHERE student_id = '$student_id' AND game_name = '$game_type' AND Difficulty = '$difficulty' ORDER BY date DESC LIMIT 5";
    $result = mysqli_query($connection, $query);
    $last_5_results = array();
    if($result){

    while($row = mysqli_fetch_assoc($result)){
        $last_5_results[] = $row;
    }
    return $last_5_results;


    }else{
        add_error("Error in Last 5 results SQL");
    }
    db_close($connection);
}



function get_students_highest_Score($student_id, $game_type, $difficulty){
    $connection = db_connect();
    $query = "SELECT score FROM result WHERE student_id = '$student_id' AND game_name = '$game_type' AND difficulty = '$difficulty' ORDER BY student_id DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    if($result){
        $high_score = mysqli_fetch_assoc($result);
        return $high_score['score'];

    }else{
        add_error("Error in Student Highest Score SQL");
    }
    db_close($connection);
}


function get_class_highest_score($class_id, $game_type, $difficulty){
    $connection = db_connect();
    $query = "SELECT score, first_name, last_name FROM result INNER JOIN student ON result.student_id = student.id WHERE student.class_id = '$class_id' AND result.game_name = '$game_type' AND result.difficulty = '$difficulty'  ORDER BY score DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    if($result){
        $high_score = mysqli_fetch_assoc($result);
        return $high_score;

    }else{
        add_error("Error in Student Highest Score SQL");
    }
    db_close($connection);
}


function compare_class_average($class_id, $game_type, $difficulty, $year){
    $previous_year = $year - 1;
    $previous_year_string = $previous_year."-01-01";
    $next_year = $year + 1;
    $next_year_string  = $next_year."-01-01";

    $connection = db_connect();
    $query = "SELECT score FROM result INNER JOIN student ON result.student_id = student.id WHERE student.class_id = '$class_id' AND result.game_name = '$game_type' AND result.difficulty = '$difficulty' AND date > '$previous_year_string' AND date < '$next_year_string'";
    $result = mysqli_query($connection, $query);
    if($result){

        $numrows = mysqli_num_rows($result);
        $sum = 0;

        while($row = mysqli_fetch_assoc($result)) {
            $sum += $row['score'];

        }

        $average = $sum / $numrows;
        return $average;
    }else{
        add_error("Error in Compare Class Averages SQL");
    }
     db_close($connection);
}





?>




