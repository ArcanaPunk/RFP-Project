<?php 
	// include('server.php'); 
	include('playersServer.php');

  //Only users that are logged in can view this page
  if (empty($_SESSION['username'])) {
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Roll For Party: Players</title>
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

    .h4Player {
      font-size: 18px;
      border: solid;
      border-color: #f1f1f1;
      border-radius: 5px;
      margin-left: 40px;
      margin-right: 40px;
    }

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

      <a class="navbar-brand" href="home.php">Roll For Party</a>

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
    <div class="col-sm-2 sidenav" style="height:100%" align="left">

    	<form id="updateSearch" method="post">

          <fieldset>

            <legend>Search Players</legend>

              <table>

                <!-- Form box for City -->
                <tr height="40">
                  <td width="30%"> <label>City:</label> </td>
                  <td><input type="text" name="city" id="city" class="form-control"/></td>
                </tr>

                <!-- Form box for State -->
                <tr height="40">
                  <td width="30%"> <label>State:</label> </td>
                  <td><input type="text" name="state" id="state" value="Full State Name" class="form-control"/></td>
                </tr>

                <!-- Form box for Game, is filled from the DB -->
                <tr height="40">
                  <td width="30%"> <label>Game:</label> </td>
                  <td>
                    <select name="GameID" id="game" class="form-control">
                      <?php echo $options;?>
                    </select>
                  </td>
                </tr>

                <!-- Form box for Metting Place -->
                <tr height="40">
                  <td width="30%"> <label>Meet at:</label> </td>
                  <td>
                    <select name="Location" id="meet" class="form-control">
                      <option value="Default">Select a Place</option>
                      <option value="home">At a player's place.</option>
                      <option value="gameStore">At a game store.</option>
                      <option value="online">Online</option>
                    </select>
                  </td>
                </tr>
              
                <!-- Form box for Day -->
                <tr height="40">
                  <td width="30%"> <label>Day:</label> </td>
                  <td> 
                    <select name="day" id="day" class="form-control">
                      <option value="Default">Day</option>
                      <option value="Sunday">Sunday</option>
                      <option value="Monday">Monday</option>
                      <option value="Tuesday">Tuesday</option>
                      <option value="Wednesday">Wednesday</option>
                      <option value="Thursday">Thursday</option>
                      <option value="Friday">Friday</option>
                      <option value="Saturday">Saturday</option>
                    </select>
                  </td>
                </tr>

                <!-- Form box for Time -->
                <tr height="40">
                  <td width="30%"> <label>Time:</label> </td>
                  <td>
                    <select name="time" id="time" class="form-control">
                      <option value="Default">Select a Time</option>
                      <option value="Morning">Morning</option>
                      <option value="Afternoon">Afternoon</option>
                      <option value="Evening">Evening</option>
                      <option value="Night">Night</option>
                    </select>
                  </td>
                </tr>

                <tr height="40">
                  <td width="50%" align="center"> <button type="submit" name="submitSearch" id="submit" class="btn">Search</button> </td>
                  <td align="center"> <button type="reset" class="btn">Reset</button> </td>
                </tr>

              </table>

          </fieldset>

        </form>
      
    </div>

    <!-- Center Body -->
    <div class="col-sm-8 text-left">

    <h2>Browse Players:</h2>

      <table style="text-align: center;">

        <?php

          echo $display;
  
        ?>
        <!--
        <tr>
         <td colspan="2" style="text-align: left">
            <a href="#"><span class="glyphicon glyphicon-arrow-left"></span> Previous</a>
          </td>
          <td colspan="2" style="text-align: right">
            <a href="#"><span class="glyphicon glyphicon-arrow-right"></span> Next</a>
          </td>
        </tr>
        -->
      </table>
    </div>

    <!-- Right Sidebar -->
    <div class="col-sm-2 sidenav">
      
    </div>

  </div>
</div>

<!-- Footer -->
<footer class="container-fluid text-center">
  <p>Copywrite &copy; Roll For Party 2017</p>
</footer>

</body>
</html>
