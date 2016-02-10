<?PHP 
include "../app/inc.php"; 
include "../app/class/classmanager.php"; 
include "../app/student/studentmanager.php"; 

$array = get_all_students();

function print_table($array){
	$new_class_id = 0;
	$old_class_id = 0;
	
	$student_no = 1;
	
	for($j=0; $j < count($array); $j++){
		$new_class_id = $array[$j][1];
		
		if($new_class_id != $old_class_id){
			
			echo "<div class=\"col-md-6\">
              <div class=\"box box-warning box-solid collapsed-box \">
                <div class=\"box-header with-border\">
                  <h3 class=\"box-title\">".$array[$j][7]."</h3>
                  <div class=\"box-tools pull-right\">
				  <button class_id =\"".$array[$j][1]."\" data-toggle=\"modal\" data-target=\"#editClass\" class=\"btn btn-box-tool classNameEdit\"><i class=\"fa fa-fw fa-edit\"></i></button>
				  <button class_id =\"".$array[$j][1]."\" data-toggle=\"modal\" data-target=\"#deleteClass\" class=\"btn btn-box-tool classNameDelete\"><i class=\"fa fa-fw fa-close\"></i></button>
                    <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-plus\"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class=\"box-body no-padding\" style=\"display: none;\">
                  <table class=\"table table-striped\">
                    <tbody><tr>
                      <th style=\"width: 10px\">#</th>
                      <th>Name</th>
                      <th>Code</th>
					  <th style=\"width: 40px\" >Edit</th>
					  <th style=\"width: 40px\" >Delete</th>
                     
                    </tr>";
			
			//echo "<tr><td></td><td>table top</td><td></td><td></td><td></td></tr>";
			
			
			
			$old_class_id = $new_class_id;
		}

		echo "<tr>
		  <td>".$student_no."</td>
		  <td>".$array[$j][3]." ".$array[$j][4]."</td>
		  <td>".$array[$j][2]."</td>
		  <td> <button student_id =\"".$array[$j][0]."\" data-toggle=\"modal\" data-target=\"#editStudent\" class=\"btn btn-block btn-warning studentNameEdit\"><i class=\"fa fa-fw fa-edit\"></i></button></td>					  
		  <td> <button student_id =\"".$array[$j][0]."\" data-toggle=\"modal\" data-target=\"#deleteStudent\" class=\"btn btn-block btn-danger studentNameDelete\"><i class=\"fa fa-fw fa-close\"></i></button></td>
		</tr>";
    $student_no++;
		
		if(array_key_exists($j+1,$array)){
			if($old_class_id != $array[$j+1][1]){
				echo "</tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>";
            $student_no = 1;
            if($j % 2 !== 0){
              echo "</div><div class=\"row\">";
            }
			
			//echo "<tr><td></td><td>table bottom</td><td></td><td></td><td></td></tr>";
			}			
		}else{
			echo "</tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>";
            $student_no = 1;	
            if($j % 2 !== 0){
              echo "</div><div class=\"row\">";
            }		
		}
		
				
	}
	
	/*
	foreach($array as $value){	
		$new_class_id = $value[1];
		if($new_class_id != $old_class_id){
			echo "<tr><td></td><td>table top</td><td></td><td></td><td></td></tr>";
			$old_class_id = $new_class_id;
		}
		
		echo "<tr>
		  <td>$i</td>
		  <td>$value[3] $value[4]</td>
		  <td>$value[2]</td>
		  <td>$value[7]</td>					  
		  <td></td>
		</tr>";	
		$i++;
		
		
	}*/
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Sup</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">You've<b>Been</b>Schooled</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/thing.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">Yvonne Clarke</span>
                </a>
                <ul class="dropdown-menu">
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/thing.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Yvonne Clarke</p>
            </div>
          </div>
          
           <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Class</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="classcreate.php"><i class="fa fa-circle-o"></i> Create </a></li>
                <li><a href="classview.php"><i class="fa fa-circle-o"></i> View </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Student</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.html"><i class="fa fa-circle-o"></i> Create </a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> View </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Report</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.html"><i class="fa fa-circle-o"></i> View </a></li>
              </ul>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create Class
            <small>start here.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Create Class</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		
		<div class="row">
            <div class="col-md-12"><?php printmessages(); ?></div>
		</div>
          <div class="row">  
           
			<?PHP print_table($array);?>			
            
          </div>
		
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2016 Yvonne Clarke 20046687.</strong> All rights reserved.
      </footer>

      
    </div><!-- ./wrapper -->

<div class="modal modal-warning" id="editClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog">
                <div class="modal-content">
                 <form id="classEdit" action="process_classedit.php" method="post">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit Class Name</h4>
                  </div>
                 
                  <div class="modal-body">
                    <div class="form-group">
          <input type="text" class="form-control" name="class_name" placeholder="Edit Class name here...">
          <input type="hidden" name="class_id" id="hidden_class_name_id" value="">
        </div>
                  </div>
                 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-outline">Save changes</button>
                  </div>
                   </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>


</div>
<!-- modal for delete class -->
<div class="modal modal-danger" id="deleteClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog">
                <div class="modal-content">
                 <form id="classDelete" action="process_classdelete.php" method="post">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Delete Class</h4>
                  </div>
                 
                  <div class="modal-body">
                    <div class="form-group">
                      <p>Warning - This is will delete all students in this class.</br>
                        Are you sure? </p>
          <input type="hidden" name="class_id" id="hidden_class_delete_id" value="">
        </div>
                  </div>
                 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit"  class="btn btn-outline">Yes Im sure</button>
                  </div>
                   </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>


</div>


<!--modal for edit student -->
<div class="modal modal-warning" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog">
                <div class="modal-content">
                 <form id="classStudent" action="process_studentedit.php" method="post">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit Student Name</h4>
                  </div>
                 
                  <div class="modal-body">
                    <div class="form-group">
          <input type="text" class="form-control" name="student_fname" placeholder="Edit Students Firstname here...">
          <input type="hidden" name="student_id" id="hidden_student_name_id" value="">
        </div>
          <div class="form-group">
          <input type="text" class="form-control" name="student_lname" placeholder="Edit Students Lastname here...">
        </div>
                  </div>
                 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-outline">Save changes</button>
                  </div>
                   </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>


</div>


</div>
<!-- modal for delete student -->
<div class="modal modal-danger" id="deleteStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog">
                <div class="modal-content">
                 <form id="studentDelete" action="process_studentdelete.php" method="post">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Delete Student</h4>
                  </div>
                 
                  <div class="modal-body">
                    <div class="form-group">
                      <p>Warning - This will permanetly remove this student from this class.</br>
                        Are you sure? </p>
          <input type="hidden" name="student_id" id="hidden_student_delete_id" value="">
        </div>
                  </div>
                 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit"  class="btn btn-outline">Yes Im sure</button>
                  </div>
                   </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>


</div>



    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>



    <script type="text/javascript">
    $(document).ready(function() {
        $('.classNameEdit').click(function() {
          //alert($(this).attr("class_id"));
          var id = $(this).attr("class_id");
          $('#hidden_class_name_id').attr('value', id);
        });

    $('.classNameDelete').click(function() {
          //alert($(this).attr("class_id"));
          var id = $(this).attr("class_id");
          $('#hidden_class_delete_id').attr('value', id);
        });


    $('.studentNameEdit').click(function() {
          //alert($(this).attr("class_id"));
          var id = $(this).attr("student_id");
          $('#hidden_student_name_id').attr('value', id);
        });

    $('.studentNameDelete').click(function() {
          //alert($(this).attr("class_id"));
          var id = $(this).attr("student_id");
          $('#hidden_student_delete_id').attr('value', id);
        });



    });
</script>
  </body>
</html>
