<?PHP
function add_classname($name){ //add class name to array
	$_SESSION['class']['name'][0] = $name;
}
function add_classstudent($fname, $lname){ //add student to array
	$_SESSION['class']['fname'][] = $fname;
	$_SESSION['class']['lname'][] = $lname;
}
function save_class(){ //add message to alert array
	include "../app/student/studentmanager.php";

	$connection = db_connect(); //connect to database
	$class = $_SESSION['class'];
	$teacherid = $_SESSION['id'];	
	$classname = $class['name'][0];	

	$query = "INSERT INTO `project`.`class` (`id`, `teacher_id`, `class_group`) VALUES (NULL, '$teacherid', '$classname')";
	$result = mysqli_query($connection,$query); //perform query

	$classid = mysqli_insert_id($connection);

	if($result){ //check if query ran
		for($i=0; $i<count($class['fname']); $i++) {
			create_student($class['fname'][$i], $class['lname'][$i], $classid);
		}
		add_success("Class Created.");
		clear_class();
	}else{
		add_error("Class not created, Error in SQL");		
	}
	db_close($connection);
	
}
function initialise_class(){
	if(!isset($_SESSION['class'])){ //if class array does not exit
		$array = array( 'name' => array(), 'fname' => array(), 'lname' => array() ); //create class array
		$_SESSION['class'] = $array; //add array to session array.
	}
}
function clear_class(){
	unset($_SESSION['class']);
	initialise_class();
}
function remove_student($id){
	unset($_SESSION['class']['fname'][$id]);
	unset($_SESSION['class']['lname'][$id]);
}
function display_class(){
	initialise_class();

	$class = $_SESSION['class'];
	$classname = "No Name Yet";

	if (!empty($class)){
		if(!empty($class['name'])){ //if success class exist.
			$classname = $class['name'][0];
		}
	}else{
		add_error("Class is Empty");
	}

	echo '<div class="box box-info">
	<div class="box-header">
	<h3 class="box-title">';

	echo $classname;

	echo '</h3></div><!-- /.box-header -->
	    <div class="box-body no-padding">
	      <table class="table table-striped">
	        <tbody>
	          <tr>
	            <th style="width: 10px">#</th>
	            <th>Name</th>
	            <th style="width:40px;">Remove</th>
	          </tr>';

    if(!empty($class['fname'])){ //if alert messages exist.
		$i = 0;
		foreach ($class['fname'] as $fname) {
			echo '<tr><td>';
			echo $i+1;
			echo '.</td><td>';
			echo $class['fname'][$i]." ".$class['lname'][$i];
			echo '</td><td>
			<form action="process_classcreate.php" method="post">
			<button name="classremove" class="btn btn-block btn-danger btn-sm"><i class="fa fa-fw fa-close"></i></button>
			<input type="hidden" name="removeid" value="'.$i.'">
			</form>
			</td></tr>';
			$i++;
		}
	}

	echo '</tbody>
	    </table>
	    </div>
	  </div>';
}
?>