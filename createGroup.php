<?php 
  //include('server.php'); 
  include('createGroupServer.php');

  //Only users that are logged in can view this page
  if (empty($_SESSION['username'])) {
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Roll For Party: Template</title>
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

<!-- Main Body -->
<div class="container-fluid text-center">
  <div class="row content">

    <!-- Left Sidebar -->
    <div class="col-sm-2 sidenav" style="height:100%" align="left">
    
    </div>

    <!-- Center Body -->
    <div class="col-sm-8 text-left">
      <div class="col-sm-6">
        <form method="post" action="createGroup.php">

        <fieldset>
          
          <legend>Create Group</legend>
          <!-- display validation for form fields -->
            <?php include('errors.php'); ?>

            <table>
              <tr height="40">
                <td width="10%"> <label>Group Name:</label> </td>
                <td> <input type="text" name="Name" id="Name" class="form-control"> </td>
              </tr>

              <!-- Form box for City -->
                <tr height="40">
                  <td width="30%"> <label>City:</label> </td>
                  <td><input type="text" name="city" id="city" class="form-control"/></td>
                </tr>

                <!-- Form box for State -->
                <tr height="40">
                  <td width="30%"> <label>State:</label> </td>
                  <td>
                    <select name="state" id="state" class="form-control">
                      <option value="Default">Choose a State.</option>
                      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas</option>
                      <option value="CA">California</option>
                      <option value="CO">Colorado</option>
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="DC">District Of Columbia</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="HI">Hawaii</option>
                      <option value="ID">Idaho</option>
                      <option value="IL">Illinois</option>
                      <option value="IN">Indiana</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NV">Nevada</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NM">New Mexico</option>
                      <option value="NY">New York</option>
                      <option value="NC">North Carolina</option>
                      <option value="ND">North Dakota</option>
                      <option value="OH">Ohio</option>
                      <option value="OK">Oklahoma</option>
                      <option value="OR">Oregon</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SC">South Carolina</option>
                      <option value="SD">South Dakota</option>
                      <option value="TN">Tennessee</option>
                      <option value="TX">Texas</option>
                      <option value="UT">Utah</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WA">Washington</option>
                      <option value="WV">West Virginia</option>
                      <option value="WI">Wisconsin</option>
                      <option value="WY">Wyoming</option>
                    </select>
                  </td>
                </tr>

              <tr height="40">
                <td width="10%"> <label>Games:</label> </td>
                <td> 
                  <select name="GameID" id="game" class="form-control">
                    <option value="Default">Select a Game</option>
                    <?php echo $options;?>
                  </select> 
                </td>
              </tr>
              <tr height="40">
                <td width="10%"> <label>Meet at:</label> </td>
                <td> 
                  <select name="Location" id="meetAt" class="form-control">
                    <option value="Default">Select a Place</option>
                    <option value="At a player's place.">At a player's place.</option>
                    <option value="At a game store.">At a game store.</option>
                    <option value="In person, but no preference.">In person, but no preference.</option>
                    <option value="Online">Online</option>
                  </select>
                </td>
              </tr>
              <tr height="40">
                <td width="10%">  <label>Day 1:</label> </td>
                <td>
                  <select name="Day1" id="Day1" class="form-control">
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
              <tr height="40">
                <td width="10%"> <label>Time 1:</label> </td>
                <td>
                  <select name="Day1Time" id="Day1Time" class="form-control">
                    <option value="Default">Select a Time</option>
                    <option value="Morning">Morning</option>
                    <option value="Afternoon">Afternoon</option>
                    <option value="Evening">Evening</option>
                    <option value="Night">Night</option>
                    <option value="Anytime">Anytime</option>
                  </select>
                </td>
              </tr>
              <tr height="40">
                <td width="10%"> <label>Day 2:</label> </td>
                <td> 
                  <select name="Day2" id="Day2" class="form-control">
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
              <tr height="40">
                <td width="10%"> <label>Time 2:</label> </td>
                <td>
                  <select name="Day2Time" id="Day2Time" class="form-control">
                    <option value="Default">Select a Time</option>
                    <option value="Morning">Morning</option>
                    <option value="Afternoon">Afternoon</option>
                    <option value="Evening">Evening</option>
                    <option value="Night">Night</option>
                    <option value="Anytime">Anytime</option>
                  </select>
                </td>
              </tr>
              <tr height="40">
                <td width="10%"> <label>Day 3:</label> </td>
                <td> 
                  <select name="Day3" id="Day3" class="form-control">
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
              <tr height="40">
                <td width="10%"> <label>Time 3:</label> </td>
                <td> 
                  <select name="Day3Time" id="Day3Time" class="form-control">
                  <option value="Default">Select a Time</option>
                  <option value="Morning">Morning</option>
                  <option value="Afternoon">Afternoon</option>
                  <option value="Evening">Evening</option>
                  <option value="Night">Night</option>
                  <option value="Anytime">Anytime</opt
                  </select>
                </td>
              </tr>
              <tr height="40">
                <td> <label>Description:</label> </td>
              </tr>
              <tr>
                <td colspan="2"> <textarea class="form-control" rows="10" name="desc" id="desc" maxlength="500" style="resize: none;"></textarea> </td>
              </tr>
              <tr height="155">
                <td width="50%" align="center"> <button type="submit" name="submitGroup" class="btn">Submit</button> </td>
                <td width="50%" align="center"> <button type="reset" class="btn">Reset</button> </td>
              </tr>

            </table>

            

          </fieldset>
        
        </form>
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
