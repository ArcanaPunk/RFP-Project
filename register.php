<?php include('server.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Roll For Party</title>
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
        <li><a href="viewMessages.php">Messages</a></li>
        <li><a href="viewAbout.php">About</a></li>
      </ul>

      <!-- My Profile and My Group Button and Login -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
        <li><a href="viewOwnGroups.php"><span class="glyphicon glyphicon-th-large"></span> My Groups</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>

  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">

    <div class="col-sm-2 sidenav" style="height:100%">

    </div>

    <div class="col-sm-8 text-left"> 
      <div class="col-sm-4">
        <form method="post" action="register.php">
          <fieldset>
            <legend><h2>Sign Up</h2></legend>
              <!-- display validation for form fields -->
              <?php include('errors.php'); ?>
              <table>
                <tr height="40">
                  <td width="30%"> <label>Username:</label> </td>
                  <td> <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"/> </td>
                </tr>

                <tr height="40">
                  <td width="30%"> <label>Email:</label> </td>
                  <td> <input type="text" name="email" class="form-control" value="<?php echo $email; ?>"/> </td>
                </tr>

                <tr height="40">
                  <td width="30%"> <label>Password:</label> </td>
                  <td> <input type="password" class="form-control" name="password_1"/> </td>
                </tr>

                <tr height="40">
                  <td width="30%"> <label>Confirm Password:</label> </td>
                  <td> <input type="password" class="form-control" name="password_2"/> </td>
                </tr>

                <tr height="40">
                  <td width="30%"> <label>First Name:</label> </td>
                  <td> <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>"/> </td>
                </tr>

                <tr height="40">
                  <td width="30%"> <label>Last Name:</label> </td>
                  <td> <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>"/> </td>
                </tr>

                <tr height="40">
                  <td width="30%"> <label>City:</label> </td>
                  <td> <input type="text" name="city" class="form-control"> </td>
                </tr>

                <tr height="40">
                  <td width="30%"> <label>State:</label> </td>
                  <td> <input type="text" name="state" class="form-control" value="Full State Name"> </td>
                </tr>

                <tr height="40">
                  <td width="30%"> <label>Country:</label> </td>
                  <td> <input type="text" name="country" class="form-control" value="Full Country Name"> </td>
                </tr>

                <tr height="40">
                  <td width="50%" align="center"> <button type="submit" name="submit" class="btn">Submit</button> </td>
                  <td width="50%" align="center"> <button type="reset" class="btn">Reset</button> </td>
                </tr>
                
              </table>
          </fieldset>
        </form>
      </div>
      
      <div class=col-sm-4>
        <fieldset>
        <legend><h2>Login</h2></legend>

        <p>
          If you already have an account, click here to login!
        </p>

        <a href="login.php" style="color:black;"><span class="glyphicon glyphicon-log-in"></span> Login</a>

      </fieldset>
      </div>
      
      
    </div>
    <div class="col-sm-2 sidenav">

    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Copywrite &copy; Roll For Party 2017</p>
</footer>

</body>
</html>