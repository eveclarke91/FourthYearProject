<?PHP 
include "../app/inc.php"; 
include "../app/class/classmanager.php"; 
include "../app/student/studentmanager.php"; 
include "process_studentview.php";

$student_id = 0;
if(isset($_GET['id'])){
  $student_id = $_GET['id'];
}else if(isset($_POST['id'])){
  $student_id = $_POST['id'];
}
$game_type = "memory";
if(isset($_POST['game_type'])){
  $game_type = $_POST['game_type'];
}
$difficulty = "easy";
if(isset($_POST['difficulty'])){
  $difficulty = $_POST['difficulty'];
}

$the5results = get_last5_results($student_id, $game_type, $difficulty);
$most_played = get_most_played($student_id);
$memorygrowthrate = getGrowthRate($student_id, "memory", "easy");
$spellinggrowthrate = getGrowthRate($student_id, "spelling", "easy");
$mathsgrowthrate = getGrowthRate($student_id, "maths", "easy");
$lowestgame = getLowestGame($student_id);

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
    <link rel="stylesheet" href="bootstrap/css/custom.css">
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
            Student Report
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
            <h1><?PHP echo get_student_name($student_id); ?></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?PHP echo $memorygrowthrate; ?></h3>
                  <p>Memory Growth Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer" id="gr1" data-content="The growth rate is a calculation taken from the period of growth during the playing of the game. It excludes scores that are similar near the high end of the spectrum. The higher the growth rate the better." rel="popover" data-placement="bottom" data-original-title="Memory Growth" data-trigger="hover">More Info&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?PHP echo $spellinggrowthrate; ?></h3>
                  <p>Spelling Growth Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer" id="gr2" data-content="The growth rate is a calculation taken from the period of growth during the playing of the game. It excludes scores that are similar near the high end of the spectrum. The higher the growth rate the better." rel="popover" data-placement="bottom" data-original-title="Spelling Growth" data-trigger="hover">More Info&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?PHP echo $mathsgrowthrate; ?></h3>
                  <p>Maths Growth Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer" id="gr3" data-content="The growth rate is a calculation taken from the period of growth during the playing of the game. It excludes scores that are similar near the high end of the spectrum. The higher the growth rate the better." rel="popover" data-placement="bottom" data-original-title="Maths Growth" data-trigger="hover">More Info&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?PHP echo ucfirst($lowestgame['name'])."<sup style=\"font-size: 20px\">(".ucfirst($lowestgame['difficulty']).")</sup>"; ?></h3>
                  <p>Lowest Performing Game</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer" id="low" data-content="This section takes an average from all the games and asseses which one a student is having the most difficulty with" rel="popover" data-placement="bottom" data-original-title="Lowest Performance" data-trigger="hover">More Info&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

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
                   <h3 style="text-align:center;"><?PHP echo get_student_name($student_id); ?> Average = <span style="background-color:#c1c7d1;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class Average = <span style="background-color:#00A65A;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></h3>
                  </div>               
                </div>
              </div>

            </div>

            


            <div class="col-md-6">
              <div class="box box-solid bg-teal-gradient">
                  <div class="box-header">
                    <i class="fa fa-th"></i>
                    <h3 class="box-title"> Last 5 Results</h3> 
                    <form action="" method="post">
                      <div class="pull-right" style="position:absolute; right:440px; top:5px;">
                        <div class="form-group">
                          <select name="game_type" class="form-control">
                            <option value="memory" <?PHP if($game_type == "memory"){ echo "selected=\"selected\""; } ?> >Memory</option>
                            <option value="spelling" <?PHP if($game_type == "spelling"){ echo "selected=\"selected\""; } ?> >Spelling</option>
                            <option value="maths" <?PHP if($game_type == "maths"){ echo "selected=\"selected\""; } ?> >Maths</option>
                          </select>
                        </div>
                      </div>
                      <div class="pull-right" style="position:absolute; right:340px; top:5px;">
                        <div class="form-group">
                          <select name="difficulty" class="form-control">
                            <option value="easy" <?PHP if($difficulty == "easy"){ echo "selected=\"selected\""; } ?> >Easy</option>
                            <option value="medium" <?PHP if($difficulty == "medium"){ echo "selected=\"selected\""; } ?> >Medium</option>
                            <option value="hard" <?PHP if($difficulty == "hard"){ echo "selected=\"selected\""; } ?> >Hard</option>
                          </select>
                        </div>
                      </div>
                      <div class="pull-right" style="position:absolute; right:290px; top:5px;">
                        <input type="hidden" name="id" value="<?PHP echo $student_id; ?>">
                        <button type="submit" class="btn btn-info pull-right">Go!</button>
                      </div>
                    </form>

                    <div class="box-tools pull-right">

                      <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>

                  <div class="box-body border-radius-none">
                    <div class="chart" id="line-chart" style="height: 250px;"></div>
                  </div>

                </div><!-- /.box -->
              </div>
              <div class="col-md-6">
              
              <!-- DONUT CHART -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Most Played</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>
<!--
            <div class="col-md-12">
              <div class="col-md-2">
              </div>
              <div class="col-md-8" style="border-bottom: solid 2px; padding-bottom:10px; text-align:center;">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                  <h2>Select a Student</h2>
                  <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" name="studentname">
                      <span class="input-group-btn">
                        <button class="btn btn-info btn-flat" type="button">Go!</button>
                      </span>
                    </div>
                  </form>
                </div>
                <div class="col-md-3">
                </div>

              </div>
              <div class="col-md-2">
              </div>            
            </div>-->
            
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
    <script>
    $( document ).ready(function() {
        window.setTimeout(function() {
            $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 2000);
        $('#gr1').popover();
        $('#gr2').popover();
        $('#gr3').popover();
        $('#low').popover();
    });
    </script>
    <!-- page script -->
    <script>
      $(function () {
        <?PHP $class_id = get_class_id($student_id); ?>
        var memeasy = <?php echo get_average_score($student_id, "memory", "easy"); ?>;
        var memmed = <?php echo get_average_score($student_id, "memory", "medium"); ?>;
        var memhard = <?php echo get_average_score($student_id, "memory", "hard"); ?>;
        var spelleasy = <?php echo get_average_score($student_id, "spelling", "easy"); ?>;
        var spellmed = <?php echo get_average_score($student_id, "spelling", "medium"); ?>;
        var spellhard = <?php echo get_average_score($student_id, "spelling", "hard"); ?>;
        var matheasy = <?php echo get_average_score($student_id, "maths", "easy"); ?>;
        var mathmed = <?php echo get_average_score($student_id, "maths", "medium"); ?>;
        var mathhard = <?php echo get_average_score($student_id, "maths", "hard"); ?>;
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
              data: [memeasy, memmed, memhard, spelleasy, spellmed, spellhard, matheasy, mathmed, mathhard]
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
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
          {
            value: <?PHP echo $most_played[3]['Count']; ?>,
            color: "#FFA1C3",
            highlight: "#FFA1C3",
            label: "Memory Easy, Times"
          },
          {
            value: <?PHP echo $most_played[5]['Count']; ?>,
            color: "#FF5E99",
            highlight: "#FF5E99",
            label: "Memory Medium, Times"
          },
          {
            value: <?PHP echo $most_played[4]['Count']; ?>,
            color: "#FF0561",
            highlight: "#FF0561",
            label: "Memory Hard, Times"
          },
          {
            value: <?PHP echo $most_played[0]['Count']; ?>,
            color: "#8CFFAB",
            highlight: "#8CFFAB",
            label: "Maths Easy, Times"
          },
          {
            value: <?PHP echo $most_played[1]['Count']; ?>,
            color: "#46FA76",
            highlight: "#46FA76",
            label: "Maths Medium, Times"
          },
          {
            value: <?PHP echo $most_played[2]['Count']; ?>,
            color: "#0FFF4F",
            highlight: "#0FFF4F",
            label: "Maths Hard, Times"
          },
          {
            value: <?PHP echo $most_played[6]['Count']; ?>,
            color: "#85AFFF",
            highlight: "#85AFFF",
            label: "Spelling Easy, Times"
          },
          {
            value: <?PHP echo $most_played[8]['Count']; ?>,
            color: "#4C8AFC",
            highlight: "#4C8AFC",
            label: "Spelling Medium, Times"
          },
          {
            value: <?PHP echo $most_played[7]['Count']; ?>,
            color: "#0F63FF",
            highlight: "#0F63FF",
            label: "Spelling Hard, Times"
          }
        ];
        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
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

        //Line Chart

        var line = new Morris.Line({
          element: 'line-chart',
          resize: true,
          data: [
          <?PHP 
          for($i=0; $i<count($the5results); $i++){
            echo "{m: ".$the5results[$i]['row_number']." , score: ".$the5results[$i]['score']."}";
            if($i + 1 != count($the5results)){
              echo ",";
            }
          }
          ?>
          ],
          xkey: 'm',
          ykeys: ['score'],
          labels: ['Score'],
          lineColors: ['#efefef'],
          lineWidth: 2,
          hideHover: 'auto',
          hoverCallback: function (index, options, content, row) {
            return "Score: " + row.score;
          },
          gridTextColor: "#fff",
          gridStrokeWidth: 0.4,
          pointSize: 4,
          pointStrokeColors: ["#efefef"],
          gridLineColor: "#efefef",
          gridTextFamily: "Open Sans",
          gridTextSize: 10
        });

        $(".knob").knob();
      });
    </script>
  </body>
</html>
