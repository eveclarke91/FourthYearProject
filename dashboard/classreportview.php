<?PHP 
include "../app/inc.php"; 
include "../app/class/classmanager.php"; 
include "../app/student/studentmanager.php";
include "../app/report/reportmanager.php";

$class_id = 0;
if(isset($_GET['id'])){
  $class_id = $_GET['id'];
}else if(isset($_POST['id'])){
  $class_id = $_POST['id'];
}


$game_type = "memory";
$game_difficulty = "easy";
//$memory_easy_class = get_class_average($class_id,"memory","easy");
//$memory_easy_students = get_all_students_averages($class_id,"memory","easy");
$classname = get_classname($class_id);

function printTable($class_id, $game_type, $game_difficulty){
  $classAverage = get_class_average($class_id, $game_type, $game_difficulty);
  $studentAverage = get_all_students_averages($class_id, $game_type, $game_difficulty);
  $i = 1;


  foreach( $studentAverage as $student){
    //echo "test";
      echo'<tr>
        <td>'.$i.'</td>
        <td>'.$student["first_name"] .' '.$student["last_name"].'</td>                            
        <td><span ';

        if($student["AVG(score)"] <= $classAverage){
          echo 'class="badge bg-red"';
        }else{
          echo 'class="badge bg-green"';
        }


        echo'>'.$student["AVG(score)"].'</span></td>
      </tr>';
      $i++;
  }


}

//$the5results = get_last5_results($student_id, $game_type, $difficulty);
//$most_played = get_most_played($student_id);
//$memorygrowthrate = getGrowthRate($student_id, "memory", "easy");
//$spellinggrowthrate = getGrowthRate($student_id, "spelling", "easy");
//$mathsgrowthrate = getGrowthRate($student_id, "maths", "easy");
//$lowestgame = getLowestGame($student_id);

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
    <link rel="stylesheet" href="plugins/morris/morris.css">
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
              <a href="logout.php" style="padding:15px;" class="btn bg-purple btn-flat">Sign out</a>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/thing.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?PHP echo $_SESSION['firstname']." ".$_SESSION['lastname']?></span>
                </a>               
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
              <p><?PHP echo $_SESSION['firstname']." ".$_SESSION['lastname']?></p>
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
            Class Report
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="classview.php"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12"><?php printmessages(); ?></div>
            <div class="col-md-12" style="text-align:center;">
            <h1><?PHP echo $classname; ?></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Average Scores</h3>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:350px"></canvas>
                  </div> 
                  <div class="legend-box">
                   <h3 style="text-align:center;"><?PHP //echo get_student_name($student_id); ?> Class Average = <span style="background-color:#00A65A;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></h3>
                  </div>               
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- START CUSTOM TABS -->
            <div class="col-md-12">
              <!-- Custom Tabs (Pulled to the right) -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Spelling</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Maths</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Memory</a></li>


                  
                  <li class="pull-left header"><i class="fa fa-th"></i>Student Averages</li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">

                    <div class="col-md-4">
                    <div class="box" id="spelling_easy" data-content="The table shows all the averages of every student for the Spelling Game (Easy). The averages are compared to the overall class average with any students obtaining lower than the class average appearning in red and any students whose score is higher than the class average is green. " rel="popover" data-placement="top" data-original-title="Average" data-trigger="hover">
                      <div class="box-header">
                        <h3 class="box-title">Spelling (Easy)</h3>
                      </div><!-- /.box-header -->                      
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Name</th>
                            <th style="width: 40px">Average</th>
                          </tr>
                         <?PHP printTable($class_id, "spelling", "easy")?>                     
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>

                  <div class="col-md-4">
                    <div class="box" id="spelling_medium" data-content="The table shows all the averages of every student for the Spelling Game (Medium). The averages are compared to the overall class average with any students obtaining lower than the class average appearning in red and any students whose score is higher than the class average is green. " rel="popover" data-placement="top" data-original-title="Average" data-trigger="hover">
                      <div class="box-header">
                        <h3 class="box-title">Spelling (Medium)</h3>
                      </div><!-- /.box-header -->                          
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Name</th>
                            <th style="width: 40px">Average</th>
                          </tr>
                         <?PHP printTable($class_id, "spelling", "medium")?>                     
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>

                  <div class="col-md-4">
                    <div class="box" id="spelling_hard" data-content="The table shows all the averages of every student for the Spelling Game (Hard). The averages are compared to the overall class average with any students obtaining lower than the class average appearning in red and any students whose score is higher than the class average is green. " rel="popover" data-placement="top" data-original-title="Average" data-trigger="hover">   
                      <div class="box-header">
                        <h3 class="box-title">Spelling (Hard)</h3>
                      </div><!-- /.box-header -->                       
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Name</th>
                            <th style="width: 40px">Average</th>
                          </tr>
                          <?PHP printTable($class_id, "spelling", "hard")?> 

                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>

                  <div style="clear:both;"></div>

                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                   <div class="col-md-4">
                    <div class="box" id="maths_easy" data-content="The table shows all the averages of every student for the Maths Game (Easy). The averages are compared to the overall class average with any students obtaining lower than the class average appearning in red and any students whose score is higher than the class average is green. " rel="popover" data-placement="top" data-original-title="Average" data-trigger="hover">
                      <div class="box-header">
                        <h3 class="box-title">Maths (Easy)</h3>
                      </div><!-- /.box-header -->                      
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Name</th>
                            <th style="width: 40px">Average</th>
                          </tr>
                         <?PHP printTable($class_id, "maths", "easy")?>                     
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>

                  <div class="col-md-4">
                    <div class="box" id="maths_medium" data-content="The table shows all the averages of every student for the Maths Game (Medium). The averages are compared to the overall class average with any students obtaining lower than the class average appearning in red and any students whose score is higher than the class average is green. " rel="popover" data-placement="top" data-original-title="Average" data-trigger="hover">
                      <div class="box-header">
                        <h3 class="box-title">Maths (Medium)</h3>
                      </div><!-- /.box-header -->                          
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Name</th>
                            <th style="width: 40px">Average</th>
                          </tr>
                         <?PHP printTable($class_id, "maths", "medium")?>                     
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>

                  <div class="col-md-4">
                    <div class="box" id="maths_hard" data-content="The table shows all the averages of every student for the Maths Game (Hard). The averages are compared to the overall class average with any students obtaining lower than the class average appearning in red and any students whose score is higher than the class average is green. " rel="popover" data-placement="top" data-original-title="Average" data-trigger="hover"> 
                      <div class="box-header">
                        <h3 class="box-title">Maths (Hard)</h3>
                      </div><!-- /.box-header -->                       
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Name</th>
                            <th style="width: 40px">Average</th>
                          </tr>
                          <?PHP printTable($class_id, "maths", "hard")?> 

                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>

                  <div style="clear:both;"></div>                   
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <div class="col-md-4">
                    <div class="box" id="memory_easy" data-content="The table shows all the averages of every student for the Memory Game (Easy). The averages are compared to the overall class average with any students obtaining lower than the class average appearning in red and any students whose score is higher than the class average is green. " rel="popover" data-placement="top" data-original-title="Average" data-trigger="hover">
                      <div class="box-header">
                        <h3 class="box-title">Memory (Easy)</h3>
                      </div><!-- /.box-header -->                      
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Name</th>
                            <th style="width: 40px">Average</th>
                          </tr>
                         <?PHP printTable($class_id, "memory", "easy")?>                     
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>

                  <div class="col-md-4">
                    <div class="box" id="memory_medium" data-content="The table shows all the averages of every student for the Memoryy Game (Medium). The averages are compared to the overall class average with any students obtaining lower than the class average appearning in red and any students whose score is higher than the class average is green. " rel="popover" data-placement="top" data-original-title="Average" data-trigger="hover">
                      <div class="box-header">
                        <h3 class="box-title">Memory (Medium)</h3>
                      </div><!-- /.box-header -->                          
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Name</th>
                            <th style="width: 40px">Average</th>
                          </tr>
                         <?PHP printTable($class_id, "memory", "medium")?>                     
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>

                  <div class="col-md-4">
                    <div class="box" id="memory_hard" data-content="The table shows all the averages of every student for the Memory Game (Hard). The averages are compared to the overall class average with any students obtaining lower than the class average appearning in red and any students whose score is higher than the class average is green. " rel="popover" data-placement="top" data-original-title="Average" data-trigger="hover">
                      <div class="box-header">
                        <h3 class="box-title">Memory (Hard)</h3>
                      </div><!-- /.box-header -->                       
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Name</th>
                            <th style="width: 40px">Average</th>
                          </tr>
                          <?PHP printTable($class_id, "memory", "hard")?> 

                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>

                  <div style="clear:both;"></div>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
          </div>

         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 0.0.1
        </div>
        <strong>Copyright &copy; 2016 Yvonne Clarke 20046687.</strong> All rights reserved.
      </footer>

      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- page script -->
    <script>
    $( document ).ready(function() {
        window.setTimeout(function() {
            $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 2000);
        $('#spelling_easy').popover();
        $('#spelling_medium').popover();
        $('#spelling_hard').popover();
        $('#maths_easy').popover();
        $('#maths_medium').popover();
        $('#maths_hard').popover();
        $('#memory_easy').popover();
        $('#memory_medium').popover();
        $('#memory_hard').popover();

    });
    </script>
    <script>
      $(function () {
        var memeasy = <?php echo 0; ?>;
        var memmed = <?php echo 0; ?>;
        var memhard = <?php echo 0; ?>;
        var spelleasy = <?php echo 0; ?>;
        var spellmed = <?php echo 0; ?>;
        var spellhard = <?php echo 0; ?>;
        var matheasy = <?php echo 0; ?>;
        var mathmed = <?php echo 0; ?>;
        var mathhard = <?php echo 0; ?>;
        var classmemeasy = <?php echo get_class_average($class_id, "memory", "easy"); ?>;
        var classmemmed = <?php echo get_class_average($class_id, "memory", "medium"); ?>;
        var classmemhard = <?php echo get_class_average($class_id, "memory", "hard"); ?>;
        var classspelleasy = <?php echo get_class_average($class_id, "spelling", "easy"); ?>;
        var classspellmed = <?php echo get_class_average($class_id, "spelling", "medium"); ?>;
        var classspellhard = <?php echo get_class_average($class_id, "spelling", "hard"); ?>;
        var classmatheasy = <?php echo get_class_average($class_id, "maths", "easy"); ?>;
        var classmathmed = <?php echo get_class_average($class_id, "maths", "medium"); ?>;
        var classmathhard = <?php echo get_class_average($class_id, "maths", "hard"); ?>;


        var areaChartData = {
          labels: ["Memory Easy", "Memory Med", "Memory Hard", "Spelling Easy", "Spelling Medium", "Spelling Hard", "Maths Easy", "Maths Medium", "Maths Hard"],
          datasets: [
            {
              label: "Student Average",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 214, 222, 1)",
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: []
            },
            {
              label: "Class Average",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [classmemeasy, classmemmed, classmemhard, classspelleasy, classspellmed, classspellhard, classmatheasy, classmathmed, classmathhard]
            }
          ]
        };

        
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);       

        $(".knob").knob();
      });
    </script>
  </body>
</html>
