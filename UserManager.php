<?php

/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 08/05/2020
 * Time: 23:33 PM
 */

class UserManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    /*
     * Tell if user exists in db (based on login)
     * Return true if user exists, false otherwise
     */
    public function exists(User $user) : bool
    {
        $q = $this->_db->prepare("SELECT * FROM user WHERE user_login = :login");
        $q->bindValue(":login", $user->login());
        $q->execute();

        return ($q->rowCount() > 0);
    }

    /*
     * Auth a user
     * Return true/false if auth succeeds/fails
     */
    public function auth(User $user) : bool
    {
        $res = $this->_db->prepare("SELECT user_passwd FROM user WHERE user_login = :login");
        $res->bindValue(":login", $user->login());
        $res->execute();

        if ($res->rowCount() != 1)
            return false;

        $dbuser = $res->fetch(PDO::FETCH_ASSOC);

        return password_verify($user->passwd(), $dbuser["user_passwd"]);
    }

    /****************
     * CRUD methods
     *
     * Create user if he doesnt already exists
     * Return True/False on success/failure
     ****************/
    public function create(User $user) : bool
    {
        if ($this->exists($user))
            return false;

        $q = $this->_db->prepare("INSERT INTO user(user_firstname, user_name, user_login, user_passwd, user_rank) VALUES (:firstname, :name, :login, :passwd, :rank)");

        $q->bindValue(":firstname", $user->firstname());
        $q->bindValue(":name", $user->name());
        $q->bindValue(":login", $user->login());
        $q->bindValue(":passwd", password_hash($user->passwd(), PASSWORD_DEFAULT));
        $q->bindValue(":rank", $user->rank());

        return $q->execute();
    }

    /*
     * Retrieve a user given its login
     * Return a new User object
     */
    public function retrieve($login) : User
    {
        $login = (string)$login;

        $q = $this->_db->prepare("SELECT user_id, user_firstname, user_name, user_login, user_passwd, user_rank FROM user WHERE user_login = :login");
        $q->bindValue(":login", $login);
        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);

        return new User($data);
    }

    /*
     * Update user old with new's data
     * Return true/false on success/failure
     */
    public function update(User $old, User $new) : bool
    {
        $q = $this->_db->prepare("UPDATE user SET user_firstname = :firstname, user_name = :name, user_login = :login, user_passwd = :passwd, user_rank = :rank WHERE user_id = :id");

        $q->bindValue(":firstname", $new->firstname());
        $q->bindValue(":name", $new->name());
        $q->bindValue(":login", $new->login());
        $q->bindValue(":passwd", password_hash($new->passwd(), PASSWORD_DEFAULT));
        $q->bindValue(":rank", $new->rank());
        $q->bindValue(":id", $old->id());

        return $q->execute();
    }

    /*
     * Delete a user given it's login
     * Return true/false on success/failure
     */
    public function delete(User $user) : bool
    {
        return ($this->_db->exec("DELETE FROM user WHERE user_login = " . $user->login()) == 1);
    }
}

?>
