<?php 
header("Content-type: text/html; charset=iso-8859-1");

require "Directorysystem/Config.php";
require "Directorysystem/Core.php";

if (!isset($_SESSION["Style"])){$_SESSION["Style"] = "Default";}

//Used to find path
if (isset($_GET["dir"])) {
	$fulldirofopened = $_GET["dir"];
}else{
	$fulldirofopened = "";
}

?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		echo selectstylesheet($_SESSION["Style"]);
	?>
	<title><?php echo $Title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>
<body>
<div class="frame">
	<div class="header">
		<p><?php 
			echo $Title; 
		?></p>
	</div>
	<div class="about">
	<a href="#">
		<div class="about">
			<p class="smaller">?</p>
		</div>
	</a>
	</div>
		<div class="subtitle-left1"><div class="subtitle-left2" onclick="goBack()">
		<img src="./Directorysystem/Images/Styles/navigate-left.png" alt="" title="Return to previous page" />
		</div></div>
	<div class="files">
		<?php
			printfiles($fulldirofopened);
		?>
	</div>
</div>
						

</body>
</html>