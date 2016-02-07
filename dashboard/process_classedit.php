<?PHP 
include "../app/inc.php"; 
include "../app/class/classmanager.php"; 

if (isset($_POST['class_name']) && isset($_POST['class_id'])) {
	if(isset($_POST['class_name']) && trim($_POST['class_name']) !== ''){ //if class name is set and not empty
		if(isset($_POST['class_id']) && trim($_POST['class_id']) !== ''){ //if class name is set and not empty
			update_classname($_POST['class_name'] , $_POST['class_id']);
			add_success("Name Updated");
			header('location: blank.php');	
			die();
		}
		add_error("No Comprende");
		header('location: blank.php');	
		die();
	}
}
?>