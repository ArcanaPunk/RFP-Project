<?php

	session_start();

	$game = "";
	$canGM = "";
	$place = "";
	$d1 = "";
	$t1 = "";
	$d2 = "";
	$t2 = "";
	$d3 = "";
	$t3 = "";
	$desc = "";
	$errors = array();

	//grab current session username
	$username = $_SESSION['username'];

	//Connect to the database
	$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforparty') or die($db);

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

	if (isset($_POST['submitProfile']))
	{
		$game = mysqli_real_escape_string($db, $_POST['GameID']);
		$canGM = mysqli_real_escape_string($db, $_POST['gm']);
		$place = mysqli_real_escape_string($db, $_POST['Location']);
		$d1 = mysqli_real_escape_string($db, $_POST['day']);
		$t1 = mysqli_real_escape_string($db, $_POST['time']);

		// Only one Day and Time is necessary
		if ($_POST['day2'] != "Default")
		{
			$d2 = mysqli_real_escape_string($db, $_POST['day2']);

			if($_POST['time2'] != "Default")
			{
				$t2 = mysqli_real_escape_string($db, $_POST['time2']);
			}
		}

		if ($_POST['day3'] != "Default")
		{
			$d3 = mysqli_real_escape_string($db, $_POST['day3']);

			if ($_POST['time3'] != "Default")
			{
				$t3 = mysqli_real_escape_string($db, $_POST['time3']);
			}
		}

		$desc = mysqli_real_escape_string($db, $_POST['desc']);

		if ($game == "Default") 
		{
			array_push($errors, "A game is required.");
		}
		if ($canGM == "Default") 
		{
			array_push($errors, "Select if you want to GM or not.");
		}
		if ($place == "Default")
		{
			array_push($errors, "A place is required.");
		}
		if ($d1 == "Default" || $t1 == "Default")
		{
			array_push($errors, "At least 1 Day and Time selection is required.");
		}
		
		
		if(count($errors) == 0)
		{
			
			// If the user specified a 2nd day and time then put it into the query
			if ($d2 != "" && $t2 != "")
			{
				$sql = "UPDATE user SET Game = '$game', CanGM = '$canGM', MeetingPlace = '$place', Day1 = '$d1', Time1 = '$t1', Day2 = '$d2', Time2 = '$t2', Description = '$desc' WHERE Username = '$username'";
			}

			// If the user specified a 3rd day and time then put it into the query
			if ($d2 != "" && $t2 != "" && $d3 != "" && $t3 != "")
			{
				$sql = "UPDATE user SET Game = '$game', CanGM = '$canGM', MeetingPlace = '$place', Day1 = '$d1', Time1 = '$t1', Day2 = '$d2', Time2 = '$t2', Day3 = '$d3', Time3 = '$t3', Description = '$desc' WHERE Username = '$username'";
			}
			// If they just set 1 day and time do this query.
			else
			{
				$sql = "UPDATE user SET Game = '$game', CanGM = '$canGM', MeetingPlace = '$place', Day1 = '$d1', Time1 = '$t1', Description = '$desc' WHERE Username = '$username'";
			}

			$res = mysqli_query($db, $sql);
			if (!$res)
			{
				echo mysqli_error($db);
			}
			else
			{
				header('location: home.php');
			}
		}
	}
?>