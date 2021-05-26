<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
	
	<title>Theme Mathématiques</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" href="quiz.png"/>

</head>

<body>


<?php
    include("header.php");
?>

<div id="blog">

    <h1 class="center" style="font-size: 35px;">MODULES DE MATHEMATIQUES</h1>
	
	
	<br/>
	<a href="question2.php?idmod=1">
	<input 	class="center_block"
			style="font-size: 28px;"
			type="button"
			value="Addition">
	</a>

	<br/>
	<a href="question2.php?idmod=2">
	<input 	class="center_block"
			style="font-size: 28px;"
			type="button"
			value="Soustraction">
	</a>
	
	<br/>
	<a href="question2.php?idmod=3">
	<input 	class="center_block"
			style="font-size: 28px;"
			type="button"
			value="Multiplication">
	</a>
</div>
<?php
    include("footer.php");
?>
</body>
</html>
