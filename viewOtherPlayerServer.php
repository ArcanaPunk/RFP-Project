<?php

	session_start();

	//Connect to the database
	$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

	//grab current session username
	$username = $_SESSION['username'];

	$playerUserName = $_GET['user'];

	$sql = "SELECT FirstName, City, State, Country FROM user WHERE Username='$playerUserName'";

	$playerQuery = mysqli_query($db, $sql);

    while($row = mysqli_fetch_array($playerQuery, MYSQLI_ASSOC)){
        	$firstname = $row['FirstName'];
        	$city = $row['City'];
        	$state = $row['State'];
        	$country = $row['Country'];

        	// Also take in Description, Games, and Time when those are built out
        }        

    $display = '<div class="panel-profile-body">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="pictures/Male-Generic-Photo.jpg""> </div>
            
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
                    <td> ' . $city . ', ' . $state . ' | ' . $country . '</td>
                  </tr>
                  <tr>
                    <td>Games I play:</td>
                    <td>Display these when they are implemented. </td>
                  </tr>
                  <tr>
                    <td>Description:</td>
                    <td>Display this when it is implemented. </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>';
?>