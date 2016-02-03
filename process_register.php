<?PHP 
include "app/inc.php";
include 'app/user/usermanager.php';

$all_required_variables = true;
$passwords_match = true;

if(isset($_POST['email']) && trim($_POST['email']) !== ''){ //if email is set and not empty
	$email = trim($_POST["email"]);
}else{
	add_error("error");//add error message
	$all_required_variables = false;
}
if(isset($_POST['firstname']) && trim($_POST['firstname']) !== ''){ //if firstname is set and not empty
	$firstname = trim($_POST["firstname"]);
}else{
	add_error("error");//add error message
	$all_required_variables = false;
}
if(isset($_POST['lastname']) && trim($_POST['lastname']) !== ''){ //if lastname is set and not empty
	$lastname = trim($_POST["lastname"]);
}else{
	add_error("error");//add error message
	$all_required_variables = false;
}
if(isset($_POST['school']) && trim($_POST['school']) !== ''){ //if school is set and not empty
	$school = trim($_POST["school"]);
}else{
	add_error("error");//add error message
	$all_required_variables = false;
}
if(isset($_POST['pass']) && trim($_POST['pass']) !== ''){ //if pass is set and not empty
	$pass = trim($_POST["pass"]);
}else{
	add_error("error");//add error message
	$all_required_variables = false;
}
if(isset($_POST['confirmpass']) && trim($_POST['confirmpass']) !== ''){ //if confirmpass is set and not empty
	$confirmpass = trim($_POST["confirmpass"]);
}else{
	add_error("error");//add error message
	$all_required_variables = false;
}

if($pass == $confirmpass){
	$passwords_match = true;
}else{
	add_error("error");//add error message
	$password_match = false;
}

if ($passwords_match && $all_required_variables){	
	//check unique email aswell
	create_user($email, $firstname, $lastname, $school, $pass);		
}else{
	header('location: index.php');	
	die();
}
?>