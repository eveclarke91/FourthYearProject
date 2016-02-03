<?PHP
session_start();
include 'db/dbconfig.php';
include 'message/messagemanager.php';

function all_dump(){
	echo "<pre>";
	var_dump($_SESSION);
	var_dump($_REQUEST);
	print_r($_POST);
	echo "</pre>";
	
}

?>