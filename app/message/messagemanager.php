<?PHP
function initialise_messages(){ //first run of messages array.
	if(!isset($_SESSION['messages'])){ //if messages array does not exist
		$messages = array( 'errors' => array(), 'alerts' => array(), 'success' => array() ); //create messages array
		$_SESSION['messages'] = $messages; //add array to session array.
	}
}
function add_error($message){ //add message to error array
	$_SESSION['messages']['errors'][] = $message;
}
function add_success($message){ //add message to success array
	$_SESSION['messages']['success'][] = $message;
}
function add_alert($message){ //add message to alert array
	$_SESSION['messages']['alert'][] = $message;
}
function printmessages(){ //Print error messages
	initialise_messages();
	
	$messages = $_SESSION['messages']; // move from session to local 
	$log_to_file = false; // true will start writing to a file
	if (!empty($messages)){	 //if messages exist
		echo '<div class="row">'; //first part of message
		if(!empty($messages['success'])){ //if success messages exist.
			foreach ($messages['success'] as $value) {
				if($log_to_file){
					log_to_file("Success", $value);
				}
				echo '<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong>Success!</strong> '.$value.'</div>';
			}
		}
		if(!empty($messages['alerts'])){ //if alert messages exist.
			foreach ($messages['alert'] as $value) {
				if($log_to_file){
					log_to_file("Alert", $value);
				}
				echo '<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong>Alert!</strong> '.$value.'</div>';
			}
		}
		if(!empty($messages['errors'])){ //if error messages exist.
			foreach ($messages['errors'] as $value) {
				if($log_to_file){
					log_to_file("Error", $value);
				}
				echo '<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong>Warning!</strong> '.$value.'</div>';
			}
		}
		echo '</div>'; //end of message
		clear_messages(); //clear message and start again.
	}
}

function clear_messages(){ //clear messages array and create new array and add to session
	unset($_SESSION['messages']);
	initialise_messages();
}
?>