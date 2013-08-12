<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Demo Title</title>
	</head>

	<body>
		<div>
			This is my header.
		</div>
		<div>
			<?php
			$mysqli = new mysqli('localhost', 'root', '', 'sportz');
			$query = "SELECT * FROM ftbl_team_master where team_id=1 ";
			$result = $mysqli->query($query);
			$row = $result->fetch_assoc();
			echo "The team city is: " . $row["city"];
			?>
		</div>
		<div>
			This is my footer.
		</div>
	</body>
</html>