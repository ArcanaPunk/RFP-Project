<?php

	session_start();

  $firstname = "";
  $city = "";
  $state = "";
  $country = "";
  $game = "";
  $canGM = "";
  $meetingPlace = "";
  $day1 = "";
  $time1 = "";
  $day2 = "";
  $time2 = "";
  $day3 = "";
  $time3 = "";
  $description = "";

	//Connect to the database
	$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

	//grab current session username
	$username = $_SESSION['username'];

	$playerUserName = $_GET['user'];

	$sql = "SELECT * FROM user WHERE Username='$playerUserName'";

	$playerQuery = mysqli_query($db, $sql);

    while($row = mysqli_fetch_array($playerQuery, MYSQLI_ASSOC))
    {
    	$firstname = $row['FirstName'];
    	$city = $row['City'];
    	$state = $row['State'];
    	$country = $row['Country'];
      $game = $row['Game'];
      $gameSQL = "SELECT Game FROM game WHERE GameID = '$game'";
      $canGM = $row['CanGM'];
      $meetingPlace = $row['MeetingPlace'];
      $day1 = $row['Day1'];
      $time1 = $row['Time1'];

      if (!is_null($row['Day2']))
      {
        $day2 = $row['Day2'];

        if (!is_null($row['Time2']))
        {
          $time2 = $row['Time2'];
        }
      }

      if (!is_null($row['Day3']))
      {
        $day3 = $row['Day3'];

        if (!is_null($row['Time3']))
        {
          $time3 = $row['Time3'];
        }
      }

      $description = $row['Description'];
    }

    $gameQuery = mysqli_query($db, $gameSQL);

    $x = $gameQuery->fetch_assoc();

    $display = 
      '<div class="panel-profile-body">
        <div class="row">
          <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" class="playerIcon" src="pictures/Female-Generic-Photo.jpg"> </div>
          
          <div class= "col-md-9 col-lg-9">
            <table class="table table-user-information">
              <tbody>
                <tr>
                  <td>Username:</td>
                  <td> ' . $playerUserName . '</td>
                </tr>
                <tr>
                  <td>Name:</td>
                  <td> ' . $firstname . '</td>
                </tr>
                <tr>
                  <td>Location:</td>
                  <td> ' . $city . ', ' . $state . '</td>
                </tr>
                <tr>
                  <td>Looking to play:</td>
                  <td> ' . $x['Game'] . '</td>
                </tr>
                <tr>
                  <td>I want to play at:</td>
                  <td> ' . $meetingPlace . '</td>
                </tr>
                <tr>
                  <td>Times I can play:</td>
                  <td> ' . $day1 . ' ' . $time1 . '';

    if ($day2 != "")
    {
      $display =  $display . ', ' . $day2 . '';
      if ($time2 != "")
      {
        $display = $display . ' ' . $time2 . '';
      }
    }
    if ($day3 != "")
    {
      $display = $display . ', ' . $day3 . '';
      if ($time3 != "")
      {
        $display = $display . ' ' . $time3 . '';
      }
    }

      $display = $display . '</td>
                </tr>
                <tr>
                  <td>Description:</td>
                  <td> ' . $description . '  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>';
?>