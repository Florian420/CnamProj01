<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 08/05/2020
 * Time: 23:33 PM
 */

class QuestionManager
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
    public function getquestionByModule($moduleId)
    {
        $q = $this->_db->prepare("SELECT * FROM Question WHERE idModule = :moduleId");
        $q->bindValue(":moduleId", $moduleId);
        $q->execute();
        $data = $q->fetchAll();

        return $data;
    }

    public function getReponse($questionId) 
    {
        $q = $this->_db->prepare("SELECT * FROM Reponse WHERE idQuestion = :idQuestion");
        $q->bindValue(":idQuestion", $questionId);
        $q->execute();
        $data = $q->fetchAll();

        return $data;
    }

    public function getQuestion($questionId) 
    {
        $q = $this->_db->prepare("SELECT * FROM Question WHERE idQuestion = :idQuestion");
        $q->bindValue(":idQuestion", $questionId);
        $q->execute();
        $data = $q->fetch();

        return $data;
    }

    public function updateQuestion($questionId, $libelleQuestion) {
        $q = $this->_db->prepare("UPDATE question SET libelleQuestion = :libelleQuestion WHERE idQuestion = :questionId");
        $q->bindValue(":libelleQuestion", $libelleQuestion);
        $q->bindValue(":questionId", $questionId);
        return $q->execute();
    }

    public function updateReponse($reponseId, $libelleReponse, $istrue) {
        $q = $this->_db->prepare("UPDATE reponse SET libelleReponse = :libelleReponse, isTrue = :istrue WHERE idReponse = :reponseId");
        $q->bindValue(":libelleReponse", $libelleReponse);
        $q->bindValue(":istrue", $istrue);
        $q->bindValue(":reponseId", $reponseId);
        return $q->execute();
    }

}

?>
