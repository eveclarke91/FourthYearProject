<?PHP 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "admin";
$db = "project";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
$data = $_POST["data"];
$query = "SELECT * FROM `student` WHERE `login_code` = '$data' ";
$result = mysqli_query($connection,$query); //perform query
if(mysqli_num_rows($result)>0){ 
	$resultset = mysqli_fetch_assoc($result); //get array of values from database
	echo $resultset['id'];
}else{
	echo false;
}
mysqli_close($connection);
?>

