<header>
    <nav>
        <a href="/index.php">ACCUEIL</a>
        <a href="/about.php">A PROPOS</a>
<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['loggedin'] == true)
{
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) // Admin
            echo '<a href="/adminpanel.php">BACKEND</a>';
    else // Regular user
            echo '<a href="/userpanel.php">MON COMPTE</a>';

        echo '<a href="/signout.php">DECONNEXION</a>';
}
else
{
        echo '<a href="/signin.php">CONNEXION</a>';
}

?>
    </nav>
</header>

<!-- change look for the selected navbar item -->
<script language="javascript">
    var isHome = location.pathname.indexOf("/index.php");
    var isLogin = location.pathname.indexOf("/signin.php");
    var isAbout = location.pathname.indexOf("/about.php");
    var isAccount = location.pathname.indexOf("/userpanel.php");
    var isBackend = location.pathname.indexOf("/adminpanel.php");

    if (isHome === 0)
    {
        var link = document.getElementsByTagName("nav")[0].getElementsByTagName("a")[0];
        link.className += "current_tab";
    }
    else if (isLogin === 0)
    {
        var link = document.getElementsByTagName("nav")[0].getElementsByTagName("a")[2];
        link.className += "current_tab";
    }
    else if (isAbout === 0)
    {
        var link = document.getElementsByTagName("nav")[0].getElementsByTagName("a")[1];
        link.className += "current_tab";
    }
    else if (isAccount === 0)
    {
        var link = document.getElementsByTagName("nav")[0].getElementsByTagName("a")[2];
        link.className += "current_tab";
    }
    else if (isBackend === 0)
    {
        var link = document.getElementsByTagName("nav")[0].getElementsByTagName("a")[2];
        link.className += "current_tab";
    }
</script>
