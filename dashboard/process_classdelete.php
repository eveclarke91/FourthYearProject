<?PHP 
include "../app/inc.php"; 
include "../app/class/classmanager.php"; 

if (isset($_POST['class_id'])) {
		if(isset($_POST['class_id']) && trim($_POST['class_id']) !== ''){ //if class name is set and not empty
			delete_class($_POST['class_id']);
			add_success("Deleted Class");
			header('location: classview.php');	
			die();
		}
		add_error("No Comprende");
		header('location: classview.php');	
		die();
	
}
?>