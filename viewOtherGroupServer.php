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
	$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforparty') or die($db);

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
              ' . displayAddPlayer() . '
            </div>
              ' . addPlayer() . '
            <div class= "col-md-9 col-lg-9">
              <table class="table table-user-information">
                <tbody>
                  ' . displayMembers() . '
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
function displayAddPlayer()
  {
    $out = "";
    $username = '';
    
    //Connect to the database
    $db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforparty') or die($db);
    $GroupID = urldecode($_GET['GroupID']);

    $GroupOwnerSql = "SELECT UserID FROM groups WHERE GroupID ='$GroupID'";
    $GroupOwnerQuery = mysqli_query($db, $GroupOwnerSql);

    //check to see if the query is valid with the given groupID
    if (mysqli_num_rows($GroupOwnerQuery) !=1){
      die ("That group could not be found!");
    }

    while($row = mysqli_fetch_array($GroupOwnerQuery, MYSQLI_ASSOC)){
      $OwnerID = $row['UserID'];
    }

    //get username from current session
    $username = $_SESSION['username'];

    //Get the UserID based off the current session
    $userIDSql = "SELECT UserID FROM User WHERE Username ='$username'";
    $userIDQuery = mysqli_query($db, $userIDSql);

    //check to see if the query is valid with the given username
    if (mysqli_num_rows($userIDQuery) !=1){
      die ("that username could not be found!");
    }
    //populate UserID from the query results
    while($row = mysqli_fetch_array($userIDQuery, MYSQLI_ASSOC)){
      $UserID = $row['UserID'];
    }

    if($OwnerID == $UserID){
    $display = 
              '<form id="addNewPlayer" method="post">
                <fieldset>
                    <table>

                      <!-- Form box for Adding a Player -->
                      <tr height="40">
                        </br>
                        </br>
                        <label>Add a player to the group.</label>
                        <td width="30%">Username:</td>
                        <td><input type="text" name="Player" id="player" class="form-control"/></td>
                      </tr>

                      <tr height="40">
                        <td width="50%" align="right"> <button type="submit" name="addPlayer" id="submit" class="btn">Add</button> </td>
                      </tr>
                    </table>
                </fieldset>
              </form>';
    }
    else{
      $display = "";
    }
    return $display;
  }
function addPlayer()
  {
    $username = "";
    
    //Connect to the database
    $db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforparty') or die($db);
    $GroupID = urldecode($_GET['GroupID']);

    if(isset($_POST['addPlayer'])) {
    $username = mysqli_real_escape_string($db, $_POST['Player']);

      $playerSql = "SELECT UserID FROM User WHERE Username ='$username'";
      $playerQuery = mysqli_query($db, $playerSql);

      //check to see if the query is valid with the given username
      if (mysqli_num_rows($playerQuery) !=1){
        die ("That username could not be found!");
      }

      while($row = mysqli_fetch_array($playerQuery, MYSQLI_ASSOC)){
        $UserID = $row['UserID'];
      }

      $addPlayerSql = "INSERT INTO groupuser (GroupID, UserID) VALUES ('$GroupID', '$UserID')";
      $res = mysqli_query($db, $addPlayerSql);

      if (!$res) 
      {
        echo mysqli_error($db);
      }
      else
      {
        header('location: viewOtherGroup.php?GroupID='.$GroupID); //Take to group detail page
      }
    }
  }

function displayMembers()
  {
    $out = "";

    //Connect to the database
    $db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforparty') or die($db);
    $GroupID = urldecode($_GET['GroupID']);
    $sql = "SELECT Username FROM usersWithgroupusers WHERE GroupID = '$GroupID'";

    $name = $db->query($sql);

    if ($name->num_rows > 0)
    {
      //output of each db row
      $out = $out . '<tr>';
      $count = 0;
   
      while ($row = $name->fetch_assoc())
      {
        $out =  $out . '<td> <a href="viewOtherPlayer.php?user=' . $row['Username'] . '"> 
            <img src="pictures/Male-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
             <h4 class="h4Player">' . $row['Username'] . '</h4></a></td>';

        $count = $count + 1;

        if ($count == 3)
        {
            $count = 0;
            $out = $out . '</tr> <tr>';
        }
      }
    }

    return $out;
  }
?>