<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>quiz.io | Accueil</title>
    <meta name="Description" content="Test tes connaissances !"/>
    <meta name="Title" content="quiz.io"/>
    <meta name="Author" content="YBE"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/theme.css"/>
    <link rel="icon" href="quiz.png"/>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="https://use.fontawesome.com/9579361f48.js"></script>
</head>

<body>
<?php
    include("header.php");
    include("config.php");

    $q = $DB->prepare("SELECT libelleTheme, idTheme FROM theme");
    $q->execute();

    echo '<div class="container">';
    echo '<h1 class="center" style="font-size: 35px;">CHOIX DU THEME</h1>';
    echo '<p class="center"> Sur quel thème voulez-vous vous entrainez ? </p>';

    echo '<div class="row">';
    while($row = $q->fetch())
    {
        $libelleTheme = $row["libelleTheme"];
        $idTheme = $row["idTheme"];

        echo '<div class="col-6" id="col_id">';
        echo '<a href="ModuleConsult.php?id=' . $idTheme . '" class="list-group-item list-group-item-action flex-column align-items-start" id="a_id">';
        echo '<div class="d-flex w-100 justify-content-between">';
        echo '<h5 class="mb-1">' . utf8_encode ( $libelleTheme) . '</h5>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';

    

    include("footer.php");
?>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
