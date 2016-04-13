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

     
    if($numrows > 0){
        $average = $sum / $numrows;
        $average = number_format($average, 1);
        return $average;
    }else{
        return "0";
    }
      //add_success("Average Returned");

	}else{
		add_error("Error in Average Score SQL");		
	}
	db_close($connection);

}
function getGrowthRate($student_id, $game_type, $difficulty){
    $connection = db_connect(); //connect to database       
    $query = "SELECT avg(score) from result WHERE student_id = '$student_id' and game_name = '$game_type' and difficulty = '$difficulty' and score <= (select max(score) from result where student_id='$student_id')-2";
    $result = mysqli_query($connection,$query); //perform query
    if($result){ //check if query ran
    
        while($row = mysqli_fetch_assoc($result)) {
            $rate= $row['avg(score)'];
        }

        return $rate;

    }else{
        add_error("Error in growthrate Score SQL");        
    }
    db_close($connection);    
}

function getLowestGame($student_id){
    $connection = db_connect(); //connect to database       
    $query = "SELECT avg(score), game_name, difficulty from result WHERE student_id = '$student_id' GROUP BY game_name, difficulty ORDER BY avg(score) LIMIT 1";
    $result = mysqli_query($connection,$query); //perform query
    if($result){ //check if query ran
        $rate = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rate['score']= $row['avg(score)'];
            $rate['name']= $row['game_name'];
            $rate['difficulty']= $row['difficulty'];
        }
        return $rate;

    }else{
        add_error("Error in growthrate Score SQL");        
    }
    db_close($connection);    
}




//get the average score of a particular game at a particular difficulty of a class
function get_class_average($class_id, $game_type, $difficulty){
    $connection = db_connect();
    $query = "SELECT score FROM result INNER JOIN student ON result.student_id = student.id WHERE student.class_id = '$class_id' AND result.game_name = '$game_type' AND result.difficulty = '$difficulty'";
    $result = mysqli_query($connection, $query);
    //add_success($query);
    if($result){

        $numrows = mysqli_num_rows($result);
        $sum = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $sum += $row['score'];

        }

        if($numrows > 0){
            $average = $sum / $numrows;
            $average = number_format($average, 1);
            return $average;
        }else{
            return "0";
        }

    }else{
        add_error("Error in Average class score SQL");
    }
    db_close($connection);
}
function get_student_name($student_id){
    $connection = db_connect();
    $query = "SELECT first_name, last_name FROM `student` WHERE `id` = '$student_id'";
    $result = mysqli_query($connection, $query);
    if($result){
        $row = mysqli_fetch_assoc($result);
        $name = $row['first_name']." ".$row['last_name'];
        return $name;
    }else{
        add_error("Error in Getting Name");
    }
    db_close($connection);
}
function get_class_id($student_id){
    $connection = db_connect();
    $query = "SELECT `class_id` FROM `student` WHERE `id` = '$student_id'";
    $result = mysqli_query($connection, $query);
    if($result){
        $row = mysqli_fetch_assoc($result);
        $class_id = $row['class_id'];
        return $class_id;
    }else{
        add_error("Error in Getting Class ID");
    }
    db_close($connection);
}

function get_last5_results($student_id, $game_type, $difficulty){
    $connection = db_connect();
    //$query = "SELECT score, date, @curRow := @curRow + 1 AS row_number FROM result WHERE student_id = '$student_id' AND game_name = '$game_type' AND Difficulty = '$difficulty' ORDER BY date DESC LIMIT 5";
    $query = "SELECT score, date, @curRow := @curRow + 1 AS row_number FROM result r JOIN (SELECT @curRow := 0) c WHERE student_id = '$student_id' AND game_name = '$game_type' AND Difficulty = '$difficulty' ORDER BY date DESC LIMIT 5";
    $result = mysqli_query($connection, $query);
    $last_5_results = array();
    if($result){

        $numrows = mysqli_num_rows($result);
        $difference  = 5 - $numrows; 

        while($row = mysqli_fetch_assoc($result)){
            $last_5_results[] = $row;
        }
        if($numrows == 0){
            $date = date("Y-m-d");
            $last_5_results[] = array("date" => $date, "score" => 0, "row_number" => 0);
        } 

       //$last_5_results = array_reverse($last_5_results);
    return $last_5_results;



    }else{
        add_error("Error in Last 5 results SQL");
    }
    db_close($connection);
}

function get_most_played($student_id){
    $connection = db_connect();
    $query = "SELECT `game_name`, difficulty, COUNT(*) `Count` FROM result where student_id = '$student_id' GROUP BY `game_name`, difficulty";
    $result = mysqli_query($connection, $query);
    $most_played = array();
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $most_played[] = $row;
        }
        return $most_played;
    }else{
        add_error("Error in Most Played SQL");
    }
    db_close($connection);

}

function get_students_highest_Score($student_id, $game_type, $difficulty){
    $connection = db_connect();
    $query = "SELECT score FROM result WHERE student_id = '$student_id' AND game_name = '$game_type' AND difficulty = '$difficulty' ORDER BY score DESC LIMIT 1";
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
function get_all_students_averages($class_id,$game_type,$game_difficulty){

    $connection = db_connect();
    $query = "SELECT AVG(score), first_name, last_name, student_id FROM result INNER JOIN student ON result.student_id = student.id WHERE student.class_id = '$class_id' AND result.game_name = '$game_type' AND result.difficulty = '$game_difficulty' GROUP BY student_id ORDER BY AVG(score) DESC";
    //$query = "SELECT score FROM result INNER JOIN student ON result.student_id = student.id WHERE student.class_id = '$class_id' AND result.game_name = '$game_type' AND result.difficulty = '$difficulty'";
    
    $result = mysqli_query($connection, $query);
    if($result){

        while($row = $result->fetch_array()){
            $rows[] = $row;
        }       
        return $rows;

    }else{
        add_error("Error in All Student Averages");
    }
    db_close($connection);


}




?>




