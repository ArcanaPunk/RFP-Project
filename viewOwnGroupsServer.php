<?php

  session_start();

  $display = "";

  //grab current session username
  $username = $_SESSION['username'];

  //Connect to the database
  $db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

  //Drop down list for Games
  $GameQuery = "SELECT * FROM `Game`";

  $GameResult = mysqli_query($db, $GameQuery);

  $options = "";

  while($row = mysqli_fetch_array($GameResult))
  {
    $id=$row["GameID"];
      $game=$row["Game"];
      $options = $options."<option value = ".$id.">".$game."</option>";
  }
// ======================================== All the search stuff ====================================

  $searched = 0;

  $display = displayMyGroups();

  //this function displays only the groups that user owns. Still need to show groups that user is a member of.
  function displayMyGroups()
  {
    $out = "";
    $username = $_SESSION['username'];

  //Connect to the database
    $db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

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

    $sql = "SELECT Name FROM groups WHERE UserID = '$UserID'";

    $name = $db->query($sql);

    if ($name->num_rows > 0)
    {
      //output of each db row
      $out = $out . '<tr>';
      $count = 0;

      while ($row = $name->fetch_assoc())
      {
        $out =  $out . '<td> <a href="viewOtherGroup.php"?groupName=' . $row['Name'] . '"> 
            <img src="pictures/Group-Generic-Photo.jpg" alt="IMG" class="playerIcon"/><br/>
             <h4 class="h4Group">' . $row['Name'] . '</h4></a></td>';

        $count = $count + 1;

        if ($count == 4)
        {
            $count = 0;
            $out = $out . '</tr> <tr>';
        }
      }
    }

    return $out; 
  }

?>