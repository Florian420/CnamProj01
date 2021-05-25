<?php
require "User.php";
require "UserManager.php";

$pwd_update_msg = "";

if (isset($_POST["submit_pwd"]))
{
    $data = array("user_login" => $_SESSION["login"], "user_passwd" => $_POST["current_password"], "new_password" => $_POST["new_password"], "re_new_password" => $_POST["re_new_password"]);

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
        $pwd_update_msg = "<p style='text-align: center;'>Veuillez remplir le formulaire !</p>";
    }
    else
    {
        if (strcmp($_POST["re_new_password"], $_POST["new_password"]) != 0)
        {
            $pwd_update_msg = "<p style='text-align: center;'>Les mots de passe ne correspondent pas !</p>";
        }
        else
        {
            $user = new User($data);
            $user_manager = new UserManager($DB);


            if (!$user_manager->auth($user))
            {
                $pwd_update_msg = "<p style='text-align: center;'>Mot de passe actuel incorrect !</p>";
            }
            else
            {
                $old_user = $user_manager->retrieve($user->login());
                $new_user = new User($data);
                $new_user->set_user_passwd($data["new_password"]);
                $new_user->set_user_rank($old_user->rank());
                $new_user->set_user_firstname($old_user->firstname());
                $new_user->set_user_name($old_user->name());

                if (!$user_manager->update($old_user, $new_user))
                    $pwd_update_msg = "<p style='text-align: center;'>Une erreur s'est produite lors du changement du mot de passe !</p>";
                else
                    $pwd_update_msg = "<p style='text-align: center;'>Mot de de passe mis à jour avec succès !</p>";
            }

        }

    }
}
?>
