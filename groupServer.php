<?php

	session_start();

	$display = "";

	$city = "";
	$state = "";	
	$game = "";
	$location = "";
	$day = "";
	$time = "";

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

	// ======================================== All the search stuff ====================================

	$searched = 0;

	if(isset($_POST['submitSearch'])) 
	{
    	$searched = 1;

    	// pull in data from form
		$city = mysqli_real_escape_string($db, $_POST['city']);
		$state = mysqli_real_escape_string($db, $_POST['state']);	
		$game = mysqli_real_escape_string($db, $_POST['GameID']);
		$location = mysqli_real_escape_string($db, $_POST['location']);
		$day = mysqli_real_escape_string($db, $_POST['day']);
		$time = mysqli_real_escape_string($db, $_POST['time']);

    	$display = displayWithSearch($city, $state, $game, $location, $day, $time);
	}

	if ($searched == 0)
	{
		$display = displayWithoutSearch();
	}

	// displays the fields after a search
	
	function displayWithSearch($city, $state, $game, $location, $day, $time)
	{
		$out = "";			

	    //Connect to the database
	    $db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforparty') or die($db);

	    $sql = "SELECT Name FROM groups";

	    	if($city != "")
	    	{
	    		$sql = $sql . " WHERE City = '$city'";

	    		if ($state != "Default")
	    		{
	    			$sql = $sql . " AND State = '$state'";
	    		}
	    		if ($game != "Default")
    			{
    				$sql = $sql . " AND GameID = '$game'";
    			}
	    		if ($location != "Default")
				{
					$sql = $sql . " AND MeetingPlace = '$location'";
				}
				if ($day != "Default")
				{
					$sql = $sql . " AND (Day1 = '$day' OR Day2 = '$day' OR Day3 = '$day')";
				}
				if ($time != "Default")
				{
					$sql = $sql . " AND (Time1 = '$time' OR Time2 = '$time' OR Time3 = '$time')";
				}
	    	}
	    	elseif ($state != "Default")
    		{
    			$sql = $sql . " WHERE State = '$state'";

    			if ($game != "Default")
    			{
    				$sql = $sql . " AND GameID = '$game'";
    			}
	    		if ($location != "Default")
				{
					$sql = $sql . " AND MeetingPlace = '$location'";
				}
				if ($day != "Default")
				{
					$sql = $sql . " AND (Day1 = '$day' OR Day2 = '$day' OR Day3 = '$day')";
				}
				if ($time != "Default")
				{
					$sql = $sql . " AND (Time1 = '$time' OR Time2 = '$time' OR Time3 = '$time')";
				}
    		}
    		elseif ($game != "Default")
			{
				$sql = $sql . " WHERE GameID = '$game'";

				if ($location != "Default")
				{
					$sql = $sql . " AND MeetingPlace = '$location'";
				}
				if ($day != "Default")
				{
					$sql = $sql . " AND (Day1 = '$day' OR Day2 = '$day' OR Day3 = '$day')";
				}
				if ($time != "Default")
				{
					$sql = $sql . " AND (Time1 = '$time' OR Time2 = '$time' OR Time3 = '$time')";
				}
			}
			elseif ($location != "Default")
			{
				$sql = $sql . " WHERE MeetingPlace = '$location'";

				if ($day != "Default")
				{
					$sql = $sql . " AND (Day1 = '$day' OR Day2 = '$day' OR Day3 = '$day')";
				}
				if ($time != "Default")
				{
					$sql = $sql . " AND (Time1 = '$time' OR Time2 = '$time' OR Time3 = '$time')";
				}
			}
			elseif ($day != "Default")
			{
				$sql = $sql . " WHERE (Day1 = '$day' OR Day2 = '$day' OR Day3 = '$day')";

				if ($time != "Default")
				{
					$sql = $sql . " AND (Time1 = '$time' OR Time2 = '$time' OR Time3 = '$time')";
				}
			}
			elseif ($time != "Default")
			{
				$sql = $sql . " WHERE (Time1 = '$time' OR Time2 = '$time' OR Time3 = '$time')";
			}

			//echo $sql;

	    $name = mysqli_query($db, $sql);

	    if(!$name)
	    {
	    	echo mysqli_error($db);
	    }

		if ($name->num_rows > 0)
		{
			//output of each db row
			$out = $out . '<tr>';
			$count = 0;

			while ($row = $name->fetch_assoc())
			{
				$out =  $out . '<td> <a href="viewOtherGroup.php?Name=' . $row['Name'] . '"> 
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
	

	// diplays the default search, right now it is just all users in the DB. Might set up a player default search later
	function displayWithoutSearch()
	{
		$out = "";

		//Connect to the database
		$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforparty') or die($db);

		$sql = "SELECT GroupID, Name FROM groups";

		$name = $db->query($sql);

		if ($name->num_rows > 0)
		{
			//output of each db row
			$out = $out . '<tr>';
			$count = 0;

			while ($row = $name->fetch_assoc())
			{
				$out =  $out . '<td> <a href="viewOtherGroup.php?GroupID=' . $row['GroupID'] . '"> 
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