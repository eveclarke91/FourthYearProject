<?PHP 
include "app/inc.php";
include 'app/user/usermanager.php';

$all_required_variables = true;

if(isset($_POST['email']) && trim($_POST['email']) !== ''){ //if email is set and not empty
	$email = trim($_POST["email"]);
}else{
	add_error("Login incorrect");//add error message
	$all_required_variables = false;
}

if(isset($_POST['password']) && trim($_POST['password']) !== ''){ //if pass is set and not empty
	$pass = trim($_POST["password"]);
}else{
	add_error("Login incorrect");//add error message
	$all_required_variables = false;
}

if ($all_required_variables){	
	login_user($email, $pass);
}else{
	header('location: index.php');	
	die();
}
?>