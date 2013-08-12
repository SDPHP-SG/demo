<?php

function getTeam() {
	$mysqli = new mysqli('localhost', 'root', '', 'sportz');
	$query = "SELECT * FROM ftbl_team_master where team_id=1 ";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	return $row;
}

?>