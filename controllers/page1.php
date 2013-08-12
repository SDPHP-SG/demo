<?php
include("views/templates/header.php");
include("models/team_model.php");
$row = getTeam();
include("views/page1.php");
include("views/templates/footer.php");
?>