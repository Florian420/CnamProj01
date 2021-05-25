<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>quiz.io | Mon Compte</title>
    <meta name="Description" content="Test tes connaissances !"/>
    <meta name="Title" content="quiz.io"/>
    <meta name="Author" content="YBE"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sign.css"/>
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
    include("update_passwd.php");
    require 'Stats.php';

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true)
    {
        echo "<p style='text-align: center;'>Vous devez être connecté ...</p>";
        header("Refresh:2;url=/signin.php", true, 200);
        exit();
    }

    /*
     * Profil Info
     *
     */
    $userinfo = $DB->prepare("SELECT * FROM user WHERE user_id = :id AND user_login = :login");
    $userinfo->bindValue(":id", $_SESSION["id"]);
    $userinfo->bindValue(":login", $_SESSION["login"]);
    $userinfo->execute();
    $r = $userinfo->fetch();

    $firstname = $r['user_firstname'];
    $name = $r['user_name'];
    $rank = $r['user_rank'];

    switch ($rank)
    {
    case RANK_MEMBER:
        $rank = "Membre";
    case RANK_MODERATOR:
        $rank = "Modérateur";
    case RANK_ADMIN:
        $rank = "Administrateur";
    case RANK_WEBMASTER:
        $rank = "WebMaster";
    default:
        $rank = "Inconnu";
    }

    echo '<h3 style="text-align: center;">Information de Profile</h3>';

    echo '<table class="table table-borderless table-dark profil-table">';
    echo '<tbody>';
    echo '<tr>';
    echo '<td>Prénom</td>';
    echo '<td>' . $firstname . '</td>';
    echo '<tr/>';

    echo '<tr>';
    echo '<td>Nom</td>';
    echo '<td>' . $name . '</td>';
    echo '<tr/>';

    echo '<tr>';
    echo '<td>Droits</td>';
    echo '<td>' . $rank . '</td>';
    echo '<tr/>';

    echo '</tbody>';
    echo '</table><br/>';

    /*
     *
     * Passwd update form
     */
echo '<div class="main">
<section class="signup">
<div class="container">
<div class="signup-content">

<form method="POST" id="signup-form" class="signup-form" action="">
    <h3 style="text-align: center;">Changement de mot de passe</h3>

<div class="form-group">
    <input type="password" class="form-input" name="current_password" id="current_password" placeholder="Mot de passe actuel" />
</div>

<div class="form-group">
    <input type="password" class="form-input" name="new_password" id="new_password" placeholder="Nouveau mot de passe" />
</div>

<div class="form-group">
    <input type="password" class="form-input" name="re_new_password" id="re_new_password" placeholder="Répétition du nouveau mot de passe" />
</div>

<div class="form-group">
    <input type="submit" name="submit_pwd" id="submit_pwd" class="form-submit" value="Changer mon mot de passe" />
</div>' . $pwd_update_msg . '</form>

</div>
</div>
</section>
</div>';

    /*
     * Stats summary
     *
     */
    $q = $DB->prepare("SELECT DISTINCT progress.prog_dt AS dt, module.mod_title AS title, module.mod_id AS mid FROM progress, module WHERE progress.user_id = :uid AND progress.mod_id = module.mod_id ORDER BY progress.prog_dt DESC, module.mod_title LIMIT 20");
    $q->bindValue(":uid", $_SESSION["id"]);
    $q->execute();

    echo '<h3 style="text-align: center;">Résumé limité aux 20 derniers quiz</h3>';

    echo '<table class="table table-striped mod-list">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Date</th>';
    echo '<th scope="col">Module</th>';
    echo '<th scope="col">Score (%)</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while($row = $q->fetch())
    {
        $dt = $row['dt'];
        $mod = $row['title'];
        $mid = $row['mid'];

        $qscore = $DB->prepare("SELECT COUNT(*) AS score FROM progress WHERE user_id = :uid AND prog_dt = :dt AND mod_id = :mid AND prog_result = :result");
        $qscore->bindValue(":uid", $_SESSION['id']);
        $qscore->bindValue(":dt", $dt);
        $qscore->bindValue(":mid", $mid);
        $qscore->bindValue(":result", ANS_CORRECT);
        $qscore->execute();
        $score = (int)$qscore->fetch()['score'];

        $noquestions = $DB->prepare("SELECT COUNT(*) AS noq FROM question WHERE mod_id = :mid");
        $noquestions->bindValue(":mid", $mid);
        $noquestions->execute();
        $noq = (int)$noquestions->fetch()["noq"];

        echo '<tr>';
        echo '<td><a href="/userstats.php?dt=' . $dt .  '&mid=' . $mid . '">' . $dt . '</td>';
        echo '<td>' . $mod . '</td>';
        echo '<td>' . ($score/$noq) * 100 . '%</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    include("footer.php");
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
