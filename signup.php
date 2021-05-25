<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>quiz.io | Créer un compte</title>
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

<body class="text-center">
<?php
    include("header.php");

    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
    {
        echo "<p style='text-align: center;'>Vous êtes déja connecté ...</p>";
        header("Refresh:3;url=index.php", true, 200);
        exit();
    }
?>
<div class="main">
<section class="signup">
<div class="container">
<div class="signup-content">

<form method="POST" id="signup-form" class="signup-form" action="register_user.php">
  <img class="mb-4" src="/img/quiz.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Créer un compte</h1>

<div class="form-group">
    <input type="text" class="form-input" name="firstname" id="firstname" placeholder="Prénom" />
</div>

<div class="form-group">
    <input type="text" class="form-input" name="name" id="name" placeholder="Nom" />
</div>

<div class="form-group">
    <input type="text" class="form-input" name="login" id="login" placeholder="Login" />
</div>

<div class="form-group">
    <input type="password" class="form-input" name="password" id="password" placeholder="Mot de passe" />
</div>

<div class="form-group">
    <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Répétition du mot de passe" />
</div>

<div class="form-group">
    <input type="submit" name="submit" id="submit" class="form-submit" value="Créez votre compte" />
</div>
</form>

<p class="loginhere">
Vous avez déja un compte ? <a href="signin.php" class="loginhere-link">Connectez-vous</a>
</p>
</div>
</div>
</section>
</div>

<?php
include("footer.php");
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
