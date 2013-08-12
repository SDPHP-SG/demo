<?php
include("views/templates/header.php");
include("models/team_model.php");
$row = getTeam();
include("views/page2.php");
include("views/templates/footer.php");
?>