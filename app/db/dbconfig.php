<?PHP 
function db_connect(){
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "admin";
	$db = "project";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
	if(mysqli_connect_errno()){
		//print error message
	}else{
		return $connection;
	}
}
function db_close($connection){
	mysqli_close($connection);
}
?>