<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>quiz.io | Mes Statistiques</title>
    <meta name="Description" content="Test tes connaissances !"/>
    <meta name="Title" content="quiz.io"/>
    <meta name="Author" content="YBE"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"/>
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
    require 'Stats.php';

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true)
    {
        echo "<p style='text-align: center;'>Vous devez être connecté ...</p>";
        header("Refresh:2;url=/signin.php", true, 200);
        exit();
    }
    else if (!isset($_GET["dt"]) || !isset($_GET['mid']))
    {
        echo "<p style='text-align: center;'>Paramètres invalides ...</p>";
        header("Refresh:2;url=/userpanel.php", true, 200);
        exit();
    }

    $dt = $_GET["dt"];
    $mid = $_GET["mid"];
    $uid = $_SESSION["id"];

    $q = $DB->prepare("SELECT question.q_text AS qtxt, progress.prog_result AS pres FROM question, progress WHERE progress.prog_dt = :dt AND progress.user_id = :uid AND progress.mod_id = :mid AND progress.q_id = question.q_id");

    $q->bindValue(":dt", $dt);
    $q->bindValue(":uid", $uid);
    $q->bindValue(":mid", $mid);

    if (!$q->execute() || $q->rowCount() < 1)
    {
        echo "<p style='text-align: center;'>Aucunes statistiques à cette date pour ce module...</p>";
    }
    else
    {
        $qscore = $DB->prepare("SELECT COUNT(*) AS score FROM progress WHERE user_id = :uid AND prog_dt = :dt AND mod_id = :mid AND prog_result = :result");
        $qscore->bindValue(":uid", $uid);
        $qscore->bindValue(":dt", $dt);
        $qscore->bindValue(":mid", $mid);
        $qscore->bindValue(":result", ANS_CORRECT);
        $qscore->execute();
        $score = ((int)$qscore->fetch()['score'] / $q->rowCount() * 100);

        $mtitle = $DB->prepare("SELECT mod_title AS title FROM module WHERE mod_id = :mid");
        $mtitle->bindValue(":mid", $mid);
        $mtitle->execute();
        $title = $mtitle->fetch()["title"];

        echo '<h3 style="text-align: center;">Détails: Quiz du <em>' . $dt .'</em> sur le module <em>' . $title . '</em> (' .$score . '% de réussite)</h3>';

        echo '<table class="table table-striped mod-list">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Question</th>';
        echo '<th scope="col">Réponse</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        $i = 1;
        while ($row = $q->fetch())
        {
            $qtxt = $row["qtxt"];
            $pres = $row["pres"];

            switch ($pres) {
            case ANS_INCORRECT:
                $pres = "<span style='color: red';>Incorrecte</span>";
                break;
            case ANS_CORRECT:
                $pres = "<span style='color: green';>Correcte</span>";
                break;
            case ANS_NONE:
                $pres = "<span style='color: #555';>Aucune</span>";
                break;
            default:
                $pres = "<span style='color: #555';>????</span>";
            }

            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td>' . $qtxt . '</td>';
            echo '<td>' . $pres . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }

    include("footer.php");
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
