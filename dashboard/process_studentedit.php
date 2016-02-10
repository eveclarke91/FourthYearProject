<?PHP 
include "../app/inc.php"; 
include "../app/student/studentmanager.php"; 

if (isset($_POST['student_fname']) && isset($_POST['student_lname']) && isset($_POST['student_id'])) {
	if(isset($_POST['student_fname']) && trim($_POST['student_fname']) !== ''){ //if student fname is set and not empty
		if(isset($_POST['student_lname']) && trim($_POST['student_lname']) !== ''){ //if student lname is set and not empty
			if(isset($_POST['student_id']) && trim($_POST['student_id']) !== ''){ //if student id is set and not empty
				update_studentname($_POST['student_fname'] , $_POST['student_lname'], $_POST['student_id']);
				add_success("Name Updated");
				header('location: classview.php');	
				die();
			}
		}
		add_error("No Comprende".$_POST['student_fname']." ".$_POST['student_lname']." ".$_POST['student_id']);
		header('location: classview.php');	
		die();
	}
}
?>