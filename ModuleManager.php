<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 08/05/2020
 * Time: 23:33 PM
 */

class ModuleManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    

    /*
     * Retrieve a user given its login
     * Return a new User object
     */
    public function getAllModule()
    {
        $q = $this->_db->prepare("SELECT * FROM Module");
        $q->execute();
        $data = $q->fetchAll();

        return $data;
    }

}

?>
