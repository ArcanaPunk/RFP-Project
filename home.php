<?php include('server.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Roll For Party: Home</title>
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
        <li><a href="players.php">Players</a></li>
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
  
<div class="container-fluid text-center">    
  <div class="row content">

    <div class="col-sm-2 sidenav" style="height:100%">
     
    </div>

    <div class="col-sm-8 text-left"> 
      <div>
      <?php if (isset($_SESSION['success'])): ?>

        <div class="error success">
          <h3>
            <?php
              echo $_SESSION['success'];
              unset($_SESSION['success']);
            ?>
          </h3>
        </div>
      <?php endif ?>

      <?php if (isset($_SESSION["username"])): ?>

        <p> <h1>Welcome Back <strong><?php echo $_SESSION['username']; ?> </strong> </h1> </p>

        <p><h4> Roll For Party is still in Alpha release. Please look forward to new features being added. </h4> </p>

      <?php else : ?> 

        <p> <h2> Welcome </h2> </p>

        <p><h4>Roll For Party is a tabletop matchmaker. Whether you are a veteran player or someone who is looking for their first adventure we've got your back! <br/><br/>

        Tabletop roleplaying games and new or classic board games are all welcome. <br/><br/>

        Sign up and find an adventure today!</h4></p>

        <h3> Alpha Home Page </h3>
        <p> <h4>Roll For Party is still in Alpha release. Please look forward to new features being added.</h4> </p>

        <br/>

        <h4>
          <a href="register.php" style="color:black;"><span class="glyphicon glyphicon-triangle-right"></span>Sign Up</a>
          <a href="login.php" style="color:black; padding-left: 50px;"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        </h4>  

      <?php endif; ?>

      </div>
    </div>

    <div class="col-sm-2 sidenav">
    
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Copyright &copy; Roll For Party 2017</p>
</footer>

</body>
</html>