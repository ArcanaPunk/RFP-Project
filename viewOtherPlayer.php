<?php include('viewOtherPlayerServer.php'); 

  //Only users that are logged in can view this page
  if (empty($_SESSION['username'])) {
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Roll For Party: Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;

    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
      height: 90vh;
    }

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      position:fixed;
      bottom: 0px;
      width: 100%;
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }

    .piTable {
      text-align: center;
    }

    .playerIcon {
      height: 50%;
      width: 50%;
      display: inline-block;
      max-width: 100%;
      height: auto;
      padding: 4px;
      line-height: 1.42857143;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
      -webkit-transition: all .2s ease-in-out;
           -o-transition: all .2s ease-in-out;
              transition: all .2s ease-in-out;
    }

    .panel-profile {
      margin-bottom: 20px;
      margin-top: 20px;
      background-color: #fff;
      border: 1px solid transparent;
      border-radius: 4px;
      -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
              box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .panel-profile-body {
      padding: 15px;
    }
    .panel-profile-heading {
      padding: 10px 15px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 3px;
      border-top-right-radius: 3px;

        color: #000000;
        background-color: #f1f1f1;
        border-color: #000000;
    }
    .panel-profile-heading > .dropdown .dropdown-toggle {
      color: inherit;
    }
    .panel-profile-title {
      margin-top: 0;
      margin-bottom: 0;
      font-size: 16px;
      color: inherit;
    }
    .panel-profile-title > a,
    .panel-profile-title > small,
    .panel-profile-title > .small,
    .panel-profile-title > small > a,
    .panel-profile-title > .small > a {
      color: inherit;
    }
    .panel-profile-footer {
      padding: 10px 15px;
      text-align: right;
      background-color: #f5f5f5;
      border-top: 1px solid #ddd;
      border-bottom-right-radius: 3px;
      border-bottom-left-radius: 3px;

  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="home.php">Roll For Group</a>

    </div>

    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav">
        <li class="active"><a href="players.php">Players</a></li>
        <li><a href="group.php">Groups</a></li>
        <li><a href="viewAbout.php">About</a></li>
      </ul>

      <!-- My Profile and My Group Button and Login -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
        <li><a href="viewOwnGroups.php"><span class="glyphicon glyphicon-th-large"></span> My Groups</a></li>
        <?php if(isset($_SESSION['username'])): ?>
          <li><a href="home.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        <?php else: ?>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php endif; ?>
      </ul>
    </div>

  </div>
</nav>

<!-- Main Body -->
<div class="container-fluid text-center">
  <div class="row content">

    <!-- Left Sidebar -->
    <div class="col-sm-2 sidenav" style="height:100%">
  
    </div>

    <!-- Center Body -->
    <div class="col-sm-8 text-center">
      <div class="panel-profile" >
        <div class="panel-profile-heading">
        <h3 class="panel-profile-title">User Profile</h3>
        
        </div>

        <?php 

        echo $display;

        ?>
        

        <div class="panel-profile-footer">
          <p></p>
        </div>
      </div>
    </div>


    <!-- Right Sidebar -->
    <div class="col-sm-2 sidenav">
    
    </div>

  </div>
</div>

<!-- Footer -->
<footer class="container-fluid text-center">
  <p>Copyright &copy; Roll For Party 2017</p>
</footer>

</body>
</html>
