<?php
/**
 * ContactUs class for ContactUs functionality
 */

namespace Itb;

/**
 * Class ContactUs for getting the messages inserted into the
 * database by the users.
 * @package Itb
 */
class ContactUs
{

    /**
     * Gets the message that was inserted into database
     * @return mixed
     */
    public function getMess()
    {
        return $this->mess;
    }

    /**
     * Gets the message that was inputed by the user and stores it
     * into the persistent database if the user was logged in
     */
    public function contactMessage()
    {

        if (isset($_SESSION['user_id'])) {
            if (!empty($_POST['message'])):
                $db = new \Itb\DatabaseManager();
                $conn = $db->getDbhandler();

                $sql = "INSERT INTO Talk (mess) VALUES (:message)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':message', $_POST['message']);

                $stmt->execute();
            endif;
        }

    }

    /**
     * Displays the message that was previously sorted into the
     * database if the user is logged in
     * @return mixed
     */
    public function getContactMessage()
    {
        $db = new DatabaseManager();
        $connection = $db->getDbhandler();

        $statement = $connection->prepare('SELECT * FROM Talk');
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\ContactUs');
        $statement->execute();

        $contactResults = $statement->fetchAll();
        return $contactResults;
    }

}

?>
