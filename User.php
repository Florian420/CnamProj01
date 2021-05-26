<?php

/*
 * Repr of a quiz user
 *
 */

class User
{
    private $_id;
    private $_name;
    private $_firstname;
    private $_login;
    private $_passwd;
    private $_admin; // 0 or 1

    public function __construct(array $data)
    {
        foreach ($data as $k => $v) {
            $method = "set_" . $k; // set_user_name, set_user_passwd etc.

            if (method_exists($this, $method))
                $this->$method($v);
        }
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function set_user_id($id)
    {
        $id = (int)$id;

        if ($id >= 0)
            $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function set_user_name($name)
    {
        if (is_string($name) && strlen($name) > 0)
            $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function firstname()
    {
        return $this->_firstname;
    }

    public function set_user_firstname($firstname)
    {
        if (is_string($firstname) && strlen($firstname) > 0)
            $this->_firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function login()
    {
        return $this->_login;
    }

    public function set_user_login($login)
    {
        if (is_string($login) && strlen($login) > 0)
            $this->_login = $login;
    }

    /**
     * @return mixed
     */
    public function passwd()
    {
        return $this->_passwd;
    }

    public function set_user_passwd($passwd)
    {
        if (is_string($passwd) && strlen($passwd) > 0)
            $this->_passwd = $passwd;
    }
    /**
     * @return mixed
     */
    public function admin()
    {
        return $this->_admin;
    }

    public function set_user_admin($admin)
    {
            $this->_admin = $admin;
    }
}
?>
