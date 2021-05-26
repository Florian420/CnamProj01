<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
	
	<title>Thème Français</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" href="quiz.png"/>

</head>

<body>


<?php
    include("header.php");
?>

<div id="blog">

    <h1 class="center" style="font-size: 35px;">MODULES DE FRANCAIS</h1>
	
	
	<br/>
	<a href="question2.php?idmod=4">
	<input 	class="center_block"
			style="font-size: 28px;"
			type="button"
			value="Conjugaison">
	</a>

	<br/>
	<a href="question2.php?idmod=5">
	<input 	class="center_block"
			style="font-size: 28px;"
			type="button"
			value="Orthographe">
	</a>
	
	<br/>
	<a href="question2.php?idmod=6">
	<input 	class="center_block"
			style="font-size: 28px;"
			type="button"
			value="Grammaire">
	</a>
</div>
<?php
    include("footer.php");
?>
</body>
