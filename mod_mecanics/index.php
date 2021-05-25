<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>quiz.io | Module Mécanique</title>
    <meta name="Description" content="Test tes connaissances !"/>
    <meta name="Title" content="quiz.io"/>
    <meta name="Author" content="YBE"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css"/>
    <link rel="icon" href="../quiz.png"/>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="https://use.fontawesome.com/9579361f48.js"></script>
</head>

<body>
<?php
    include("../header.php");
    include("../config.php");
    require '../Stats.php';

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true)
    {
        echo "<p style='text-align: center;'>Vous devez vous connecter ...</p>";
        header("Refresh:3;url=/signin.php", true, 200);
        exit();
    }

    $_SESSION["mod_id"] = 2; // mecanics module
?>

<div id="blog">
<?php
    if (isset($_POST['submitted']))
    {
        $score = "";
        $q = $DB->prepare("SELECT q_id FROM question WHERE mod_id =" . $_SESSION["mod_id"]);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->execute();
        $noquestions = $q->rowCount();
        $nocorrect = 0;
        $stats = new Stats($DB, (string)date("Y-m-d H:i:s"), $_SESSION['id'], $_SESSION['mod_id']);

        /* span names to hl */
        $_SESSION["hl_red"] = "";
        $_SESSION["hl_green"] = "";

        while ($row = $q->fetch())
        {
            $q_id = $row["q_id"];
            $good_ans = $_SESSION["good_" . $q_id];
            $user_ans = $_POST["user_" . $q_id];

            if (isset($_POST["user_" . $q_id ]) && $good_ans != $user_ans)
            {
                $_SESSION["hl_red"] .= "user_" . $q_id . "-" . $user_ans . ",";
                $_SESSION["hl_green"] .= "user_" . $q_id . "-" . $good_ans . ",";
                $stats->add($q_id, ANS_INCORRECT);
            }
            else if (isset($_POST["user_" . $q_id]))
            {
                $_SESSION["hl_green"] .= "user_" . $q_id . "-" . $good_ans . ",";
                $nocorrect++;
                $stats->add($q_id, ANS_CORRECT);
            }
            else
            {
                $stats->add($q_id, ANS_NONE);
            }
        }
      $score = '<h1 class="h3 mb-3 font-weight-normal">Ton score: ' . (($nocorrect/$noquestions) * 100) . '%</h1>';
    }

    $i = 1;
    $q = $DB->prepare("SELECT q_id, q_text FROM question WHERE mod_id =" . $_SESSION["mod_id"]);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $q->execute();

    if ($q->rowCount() < 1)
    {
        echo "<p>Erreur: Aucune question pour ce module !</p>";
        exit();
    }

    echo $score;

    $row = $q->fetch();

    echo '<form class="form-check" method="POST" action="">';
    while($row)
    {
        $q_id = $row["q_id"];
        $q_text = $row["q_text"];

        $ans = $DB->prepare("SELECT sug_id FROM answer WHERE q_id =" . $q_id);
        $ans->setFetchMode(PDO::FETCH_ASSOC);
        $ans->execute();
        $_SESSION["good_" . $q_id] = $ans->fetch()["sug_id"];

        echo "<p style='color: #555;'>" . $i++ . " - " . $q_text . "</p>";

        $stmt = $DB->prepare("SELECT sug_id, sug_text FROM suggestion WHERE q_id = " . $q_id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        while ($sug = $stmt->fetch())
        {
            echo '<input class="form-check-input" type="radio" name="user_' . $q_id . '" value="' . $sug["sug_id"] . '">' . '<span name="user_' . $q_id . '-' . $sug["sug_id"] . '" style="color: #555;">' . $sug["sug_text"] . '</span>' . '<br/>';
        }

        echo "<br/>";
        $row = $q->fetch();
    }
    echo '<input type="submit" name="submitted" class="btn btn-primary" value="Envoyer !">';
    echo "</form>";

    /* check user's answers */
?>

    <!-- client side: highlight answers red or green -->
    <script>
        var hl_red = '<?php echo $_SESSION["hl_red"]; ?>';
        var hl_red_list = hl_red.substr(0, hl_red.length-1).split(",");

        var hl_green = '<?php echo $_SESSION["hl_green"]; ?>';
        var hl_green_list = hl_green.substr(0, hl_green.length-1).split(",");

        for (i = 0; i < hl_red_list.length; i++)
            if (/^user_[0-9]+-[0-9]+$/.test(hl_red_list[i]))
                document.getElementsByName(hl_red_list[i])[0].style.color = "red";

        for (i = 0; i < hl_green.length; i++)
            if (/^user_[0-9]+-[0-9]+$/.test(hl_green_list[i]))
                document.getElementsByName(hl_green_list[i])[0].style.color = "green";

        var unset_red = '<?php unset($_SESSION["hl_red"]); ?>';
        var unset_green = '<?php unset($_SESSION["hl_green"]); ?>';
    </script>
</div>

<?php
    include("../footer.php");
?>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
