<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>quiz.io | Créer un compte</title>
    <meta name="Description" content="Test tes connaissances !"/>
    <meta name="Title" content="quiz.io"/>
    <meta name="Author" content="YBE"/>

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
    require "User.php";
    require "UserManager.php";

    echo "<h2 style='text-align: center;'>Création de compte</h2>";

    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
    {
        echo "<p style='text-align: center;'>Vous êtes déja connecté ...</p>";
        header("Refresh:3;url=index.php", true, 200);
        exit();
    }

    $data = array("user_firstname" => $_POST["firstname"], "user_name" => $_POST["name"], "user_login" => $_POST["login"], "user_passwd" => $_POST["password"], "re_password" => $_POST["re_password"]);

    $missing = false;
    foreach($data as $k => $v)
    {
        if (empty($v))
        {
            $missing = true;
            break;
        }
    }

    if ($missing)
    {
        echo "<p style='text-align: center;'>Veuillez remplir le formulaire !</p>";
        header("Refresh:2;url=signup.php", true, 200);
        exit();
    }
    else
    {
        if (strcmp($_POST["re_password"], $_POST["password"]) != 0)
        {
            echo "<p style='text-align: center;'>Les mots de passe ne correspondent pas !</p>";
            header("Refresh:2;url=signup.php", true, 200);
            exit();
        }

        $user = new User($data);
        $user->set_user_admin(0);
        $user_manager = new UserManager($DB);


        if (!$user_manager->create($user))
        {
            echo "<p style='text-align: center;'>Erreur lors de la création du compte !</p>";
        }
        else
        {
            echo "<p style='text-align: center;'>Compte crée avec succès !</p>";
            header("Refresh:2;url=index.php", true, 200);
        }

    }

    include("footer.php");
?>
</body>
</html>
