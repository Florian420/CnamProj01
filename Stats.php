<?php

/*
 * Manage user stats
 */

define("ANS_NONE", 0);
define("ANS_INCORRECT", 1);
define("ANS_CORRECT", 2);

class Stats
{
    private $_db;
    private $_dt;
    private $_user_id;
    private $_mod_id;
    private $_q_id;
    private $_result; /* 0: No answer; 1: Incorrect answer; 2: Good answer */

    public function __construct($db, string $dt, int $user_id, int $mod_id)
    {
        $this->_db = $db;
        $this->_dt = $dt;
        $this->_user_id = $user_id;
        $this->_mod_id = $mod_id;
    }

    /* Add stats to DB
     * Return true/false on success/failure
     * TODO: test
     */
    public function add(int $q_id, int $result)
    {
        $q = $this->_db->prepare("INSERT INTO progress(prog_dt, user_id, mod_id, q_id, prog_result) VALUES(:dt, :user_id, :mod_id, :q_id, :prog_result)");
        $q->bindValue(":dt", $this->_dt);
        $q->bindValue(":user_id", $this->_user_id);
        $q->bindValue(":mod_id", $this->_mod_id);
        $q->bindValue(":q_id", $q_id);
        $q->bindValue(":prog_result", $result);
        $q->execute();

        return ($q->rowCount() == 1);
    }

    public function dt() : string
    {
        return $this->_dt;
    }

    public function set_dt(string $dt)
    {
        $this->_dt = $dt;
    }

    public function user_id() : int
    {
        return $this->_user_id;
    }

    public function set_user_id($id)
    {
        $id = (int)$id;

        if ($id >= 0)
            $this->_id = $id;
    }

    public function mod_id() : int
    {
        return $this->_mod_id;
    }

    public function set_mod_id(int $mod_id)
    {
        $this->_mod_id = $mod_id;
    }
}
?>
