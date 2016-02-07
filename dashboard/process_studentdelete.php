<?PHP 
include "../app/inc.php"; 
include "../app/student/studentmanager.php"; 

if (isset($_POST['student_id'])) {
		if(isset($_POST['student_id']) && trim($_POST['student_id']) !== ''){ //if studnet id is set and not empty
			delete_student($_POST['student_id']);
			add_success("Student Deleted");
			header('location: blank.php');	
			die();
		}
		add_error("No Comprende");
		header('location: blank.php');	
		die();
	
}