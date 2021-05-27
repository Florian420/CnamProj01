<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>quiz.io | quizz</title>
    <meta name="Description" content="Test tes connaissances !"/>
    <meta name="Title" content="quiz.io"/>
    <meta name="Author" content="YBE"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/style.css"/>-->
    <link rel="stylesheet" href="css/quizz.css"/>
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

    $idModule = $_GET['id'];

    $q = $DB->prepare("SELECT * FROM question WHERE idModule = $idModule");
    $q->execute();
    $rows = $q->fetchAll();

    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-3" id="left"></div>';

    $count = 1;
    $index = 0;
    foreach($rows as $question)
    {
        echo '<div class="col-6" id="question">';
        echo '<div class="row">';
        echo '<div class="col-12" id="title">';
        echo '<h1 class="title_question">Question ' . ($count ++) .'</h1>';
        echo '</div>';
        echo '</div>';
        echo '<div class="row" id="row_id">';
        echo '<div class="col-12">';
        echo '<p><span>' . $question[1] .'</span></p>';
        echo '</div>';

        $idQuestion = $question[0];

        $q = $DB->prepare("SELECT libelleReponse FROM reponse WHERE idQuestion = $idQuestion");
        $q->execute();
        
        echo '<form action="quizz.php" method="post" class="form-example">';
        
        $list = array();

            while($row = $q->fetch())
        {
            $libelleReponse = $row["libelleReponse"];
            echo '<div class="form-example">';
            echo '<div class="col-12">';
            echo '<input type="radio" name="response'. $index .'" id="response'. $index .'">';
            echo '<label for="response'. $index .'">' . $libelleReponse . '</label></div>';
            echo '</div>';

        }

        $index ++;

        //end row id
        echo '</div>';
        //end question
        echo '</div';
    }
    echo '<div class="col-3" id="right"></div>';
    //end row
    echo '</div>';
    echo '<div class="row">';
    echo '<div class="col" id="button">';
    echo '<button type="submit" class="btn btn-outline-dark btn-lg">Validez vos choix !</button>';
    //end button 
    echo '</div>';
    //end form
    echo '</form>';
    //end row question
    echo '</div>';
    echo '<div class="row">';
    echo '<div class="col-6 offset-3" id="resultats">';
    echo '<p>Veuillez valider vos choix pour voir les résultats</p>';
    //end resultats
    echo '</div>';
    //end result row
    echo '</div>';
    //end container
    echo '</div>';

    //include("footer.php");
?>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script></html>
     