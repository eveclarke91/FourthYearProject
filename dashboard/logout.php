<?PHP 
  session_unset();
  include "../app/inc.php"; 
  add_success("Logged Out Successfully");
  header('location: ../index.php');  
  die();
?>