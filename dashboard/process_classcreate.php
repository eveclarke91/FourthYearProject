<?PHP 
include "../app/inc.php"; 
include "../app/class/classmanager.php"; 

all_dump();

if (isset($_POST['classname'])) {
	if(isset($_POST['cname']) && trim($_POST['cname']) !== ''){ //if class name is set and not empty
		add_classname(trim($_POST["cname"]));
		add_success("Name Updated");
		header('location: classcreate.php');	
		die();
	}
}

if (isset($_POST['classstudent']) ) {
	$all_required_variables = true;

	if(isset($_POST['cfname']) && trim($_POST['cfname']) !== ''){ //if class name is set and not empty
		$fname = trim($_POST["cfname"]);
	}else{
		add_error("Firstname Empty");//add error message
		$all_required_variables = false;
	}

	if(isset($_POST['clname']) && trim($_POST['clname']) !== ''){ //if class name is set and not empty
		$lname = trim($_POST["clname"]);
	}else{
		add_error("Lastname Empty");//add error message
		$all_required_variables = false;
	}

	if($all_required_variables){
		add_classstudent($fname, $lname);

		add_success("Student Added ".$fname." ".$lname);
		header('location: classcreate.php');	
		die();
	}else{
		add_error("student error");
		header('location: classcreate.php');	
		die();		
	}
}

if (isset($_POST['classsave'])) {
	save_class();
	header('location: classcreate.php');	
	die();
}
if (isset($_POST['classremove'])) {
	if(isset($_POST['removeid']) && trim($_POST['removeid']) !== ''){ //if class name is set and not empty
		remove_student(trim($_POST["removeid"]));
		add_success("Student Removed");
		header('location: classcreate.php');	
		die();
	}
}
if (isset($_POST['classclear'])) {
	clear_class();
	add_success("Class Cleared");
	header('location: classcreate.php');	
	die();
}
?>