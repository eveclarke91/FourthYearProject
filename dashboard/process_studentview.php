<?PHP 
include "../app/report/reportmanager.php";





function printReports(){
	if(isset($_GET['id'])) {
		if(isset($_GET['id']) && trim($_GET['id']) !== ''){ //if class name is set and not empty
			$class_id = get_class_id($_GET['id']);
			
     		echo "<div class=\"row\">";
     		echo "<div class=\"col-md-4\">";
     		echo "<h1>Average Memory Easy ".get_average_score($_GET['id'], "memory", "easy")."</h1>";
     		echo "<h1>Average Memory medium ".get_average_score($_GET['id'], "memory", "medium")."</h1>";
     		echo "<h1>Average Memory hard ".get_average_score($_GET['id'], "memory", "hard")."</h1>";
     		echo "<h1>Average maths Easy ".get_average_score($_GET['id'], "maths", "easy")."</h1>";
     		echo "<h1>Average maths medium ".get_average_score($_GET['id'], "maths", "medium")."</h1>";
     		echo "<h1>Average maths hard ".get_average_score($_GET['id'], "maths", "hard")."</h1>";
     		echo "<h1>Average spelling Easy ".get_average_score($_GET['id'], "spelling", "easy")."</h1>";
     		echo "<h1>Average spelling medium ".get_average_score($_GET['id'], "spelling", "medium")."</h1>";
     		echo "<h1>Average spelling hard ".get_average_score($_GET['id'], "spelling", "hard")."</h1>";
     		echo "</div>";
     		echo "<div class=\"col-md-4\">";
     		echo "<h1>Class Average Memory Easy ".get_class_average($class_id, "memory", "easy")."</h1>";
     		echo "<h1>Class Average Memory medium ".get_class_average($class_id, "memory", "medium")."</h1>";
     		echo "<h1>Class Average Memory hard ".get_class_average($class_id, "memory", "hard")."</h1>";
     		echo "<h1>Class Average maths Easy ".get_class_average($class_id, "maths", "easy")."</h1>";
     		echo "<h1>Class Average maths medium ".get_class_average($class_id, "maths", "medium")."</h1>";
     		echo "<h1>Class Average maths hard ".get_class_average($class_id, "maths", "hard")."</h1>";
     		echo "<h1>Class Average spelling Easy ".get_class_average($class_id, "spelling", "easy")."</h1>";
     		echo "<h1>Class Average spelling medium ".get_class_average($class_id, "spelling", "medium")."</h1>";
     		echo "<h1>Class Average spelling hard ".get_class_average($class_id, "spelling", "hard")."</h1>";
     		echo "</div>";
     		echo "<div class=\"col-md-4\">";
     		echo "<h1>Highest Memory Easy ".get_students_highest_Score($_GET['id'], "memory", "easy")."</h1>";
     		echo "<h1>Highest Memory medium ".get_students_highest_Score($_GET['id'], "memory", "medium")."</h1>";
     		echo "<h1>Highest Memory hard ".get_students_highest_Score($_GET['id'], "memory", "hard")."</h1>";
     		echo "<h1>Highest maths Easy ".get_students_highest_Score($_GET['id'], "maths", "easy")."</h1>";
     		echo "<h1>Highest maths medium ".get_students_highest_Score($_GET['id'], "maths", "medium")."</h1>";
     		echo "<h1>Highest maths hard ".get_students_highest_Score($_GET['id'], "maths", "hard")."</h1>";
     		echo "<h1>Highest spelling Easy ".get_students_highest_Score($_GET['id'], "spelling", "easy")."</h1>";
     		echo "<h1>Highest spelling medium ".get_students_highest_Score($_GET['id'], "spelling", "medium")."</h1>";
     		echo "<h1>Highest spelling hard ".get_students_highest_Score($_GET['id'], "spelling", "hard")."</h1>";
     		echo "</div>";
     		echo "</div>";

     		echo "<div class=\"row\">";
     		echo "<div class=\"col-md-4\">";
     		$score = get_class_highest_Score($class_id, "memory", "easy");
     		echo "<h1>Class Highest Memory Easy".$score['score']." ".$score['first_name']." ".$score['last_name']."</h1>";
     		echo "</div>";
     		echo "<div class=\"col-md-4\">";

     		echo "</div>";
     		echo "<div class=\"col-md-4\">";

     		echo "</div>";
     		echo "</div>";
		}	

	}

}
?>