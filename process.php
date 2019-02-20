<?php

require_once "config/database.php";

if (isset($_POST['submit'])) {
	$puId           = mysqli_real_escape_string($db, trim($_POST['puId']));
	$party          = mysqli_real_escape_string($db, trim($_POST['party']));
	$result  = mysqli_real_escape_string($db, trim($_POST['result']));
	$user	= mysqli_real_escape_string($db, trim($_POST['user']));

	
	$query = mysqli_query($db, "INSERT INTO  announced_pu_results
													(result_id,
													 polling_unit_uniqueid,
													 party_abbreviation,
													 party_score,
													 entered_by_user,
													 date_entered,
													 user_ip_address
													 )	
											  VALUES(NUll,
													 '$puId',
													 '$party',
													 '$result',
													 '$user',
													  NOW(),
													 '$_SERVER['REMOTE_ADDR'] '
													 )");		

	
	if ($query) {
		
		header('location: index.php?alert=2');
	} else {
		
		header('location: index.php?alert=1');
	}	
}					
?>