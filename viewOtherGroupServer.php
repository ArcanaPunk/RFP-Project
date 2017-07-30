<?php

	session_start();

  $name = "";
  $creator = "";
  $city = "";
  $state = "";
  $game = "";
  $meetingPlace = "";
  $day1 = "";
  $time1 = "";
  $day2 = "";
  $time2 = "";
  $day3 = "";
  $time3 = "";
  $description = "";
	
	//grab current session username
	$username = $_SESSION['username'];

	//Connect to the database
	$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

	$ID = urldecode($_GET['GroupID']);

	$sql = "SELECT * FROM groups WHERE GroupID = '$ID'";

	$groupQuery = mysqli_query($db, $sql);

  if (!$groupQuery)
  {
        echo mysqli_error($db);
  }
  else
  {

  	if ($groupQuery->num_rows > 0)
  	{
      
  		while ($row = $groupQuery->fetch_assoc())
  		{
        $name = $row['Name'];
        $creator = $row['UserID'];
        $city = $row['City'];
        $state = $row['State'];

  			$meetingPlace = $row['MeetingPlace'];

        $gameID = $row['GameID'];

  			$day1 = $row['Day1'];
  			$time1 = $row['Time1'];
  			$day2 = $row['Day2'];
  			$time2 = $row['Time2'];
  			$day3 = $row['Day3'];
  			$time3 = $row['Time3'];
  			$description = $row['Description'];
  		}

      //Gets the name of the game that they are playing
      $sql2 = "SELECT Game FROM game WHERE GameID='$gameID'";

      $gameQuery = mysqli_query($db, $sql2);

      if (!$gameQuery)
      {
        echo mysqli_error($db);
      }
      else
      {
        $x_game = $gameQuery->fetch_assoc();
        $game = $x_game['Game'];
      }

    }
    
  }

  $display = '<div class="panel-profile" >

        <div class="panel-profile-heading">

          <h3 class="panel-profile-title">Group Profile</h3>
        
        </div>
        
        <div class="panel-profile-body">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> 
              <img alt="Group Pic" src="pictures/Group-Generic-Photo.jpg" style="height: 75%; width: 75%"><br/>
              <h3>' . $name . '</h3>
            </div>
            
            <div class= "col-md-9 col-lg-9">
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 1</h4>
                    </td>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 2</h4>
                    </td>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 3</h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 4</h4>
                    </td>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 5</h4>
                    </td>
                    <td>
                      <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
                      <h4>Name 6</h4>
                    </td>
                  </tr>
                  <tr>
                    <td>Location:</td>
                    <td colspan="2">' . $city . ', ' . $state . '</td>
                  </tr>
                  <tr>
                    <td>Game we play:</td>
                    <td colspan="2">' . $game . '</td>
                  </tr>
                  <tr>
                    <td>Group Meets at:</td>
                    <td colspan="2">' . $meetingPlace . '</td>
                  </tr>
                  <tr>
                    <td>Meeting Times:</td>
                    <td colspan="2">' . $day1 . ' ' . $time1 . '';

                    if ($day2 != "Default")
                    {
                      $display =  $display . ', ' . $day2 . '';
                      if ($time2 != "Default")
                      {
                        $display = $display . ' ' . $time2 . '';
                      }
                    }
                    if ($day3 != "Default")
                    {
                      $display = $display . ', ' . $day3 . '';
                      if ($time3 != "Default")
                      {
                        $display = $display . ' ' . $time3 . '';
                      }
                    }

                    $display = $display . '</td>
                  </tr>
                  <tr>
                    <td>Description:</td>
                    <td colspan="2"> ' . $description . '</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="panel-profile-footer">
               <p></p>
        </div>

      </div>';
?>