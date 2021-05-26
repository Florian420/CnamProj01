<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
	
	<title>Selection Thème</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" href="quiz.png"/>

</head>

<body>
<?php
    include("header.php");
?>

<div id="blog">

    <h1 class="center" style="font-size: 35px;">CHOIX DU THEME</h1>

    <p class="center">
        Sur quel thème voulez-vous vous entrainez ?
    </p>

    <br/>
	<a href="mathematiques.php">
	<input 	class="center_block"
			style="font-size: 28px;"
			type="button"
			value="Mathématiques">
	</a>

	<br/>
	<a href="francais.php">
	<input 	class="center_block"
			style="font-size: 28px;"
			type="button"
			value="Français">
	</a>
</div>

<?php
    include("footer.php");
?>
</body>
</html>
