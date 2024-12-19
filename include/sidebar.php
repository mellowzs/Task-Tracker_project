<!DOCTYPE html>
<html lang="en">
<head>
  <title>Task Tracker System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="assets/bootstrap-datepicker/css/datepicker.css">
  <link rel="stylesheet" href="assets/bootstrap-datepicker/css/datepicker-custom.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="assets/bootstrap-datepicker/js/datepicker-custom.js"></script>
  <script type="text/javascript">
  window.onload = startTime;

function startTime() {
    const today = new Date();
    const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };

    const dateStr = today.toLocaleDateString(undefined, dateOptions);
    const timeStr = today.toLocaleTimeString(undefined, timeOptions);

    document.getElementById('date').textContent = dateStr;
    document.getElementById('clock').textContent = timeStr;

    setTimeout(startTime, 1000); // Update every second
}

// Call the function when the page loads

  </script>

</head>
<body>

<nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation" style="width: 15%; border-top-right-radius: 30px; transition: 0.3s;">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="task-info.php"><span class="tesing" style="color: #d4ab3a; font-weight: bold; font-family: calibri; font-size: 20px;">Task Tracker and Management System</span></a>
    </div>

    <?php
    $user_role = $_SESSION['user_role'];
     if($user_role == 1){
    ?>
      <!-- Collect the nav links, forms, and other content for toggling -->
      
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-nav-custom"  >
        <li style="top: 30px; font-weight: bold;" <?php if($page_name == "Task_Info" ){echo "class=\"active\"";} ?>><a href="task-info.php">Task Management<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tasks" ></span></a></li>
        <li style="top: 30px; font-weight: bold;" <?php if($page_name == "Attendance" ){echo "class=\"active\"";} ?>><a href="attendance-info.php">Attendance <span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar"></span></a></li>
        <li style="top: 30px; font-weight: bold;" <?php if($page_name == "Admin" ){echo "class=\"active\"";} ?>><a href="manage-admin.php">Administration<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
        <li style="top: 30px; font-weight: bold;" <?php if($page_name == "home" ){echo "class=\"active\"";} ?>><a href="login.php">Chat Room<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-comment"></span></a></li>
        <li style="top: 30px; font-weight: bold;" ><a href="logout.php">Logout<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
      </ul>
      <div id="clockdate-wrapper" style="color: white">
        <div id="date" style="margin-top:600px;"></div>
        <div id="clock"></div>
    </div>
    </div>
    <?php 
     }else if($user_role == 2){

      ?>
          <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-nav-custom">
        <li style="top: 30px; font-weight: bold;" <?php if($page_name == "Task_Info" ){echo "class=\"active\"";} ?>><a href="task-info.php">Task Mangement<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tasks"></span></a></li>
        <li style="top: 30px; font-weight: bold;" <?php if($page_name == "Attendance" ){echo "class=\"active\"";} ?>><a href="attendance-info.php">Attendance <span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar"></span></a></li>
        <li style="top: 30px; font-weight: bold;" <?php if($page_name == "home" ){echo "class=\"active\"";} ?>><a href="home.php">Chat Room<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-comment"></span></a></li>
        <li style="top: 30px; font-weight: bold;" ><a href="logout.php">Logout<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
      </ul>
      <div id="clockdate-wrapper" style="color: white">
        <div id="date" style="margin-top:600px;"></div>
        <div id="clock"></div>
    </div>
    </div>

      <?php

     }else{
       header('Location: index.php');
     }

    ?>
    


  </div>
</nav>



<div class="main">