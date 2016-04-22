<?php
/**
 * Serv class for Service functionality
 */

namespace Itb;

/**
 * Class which will call the products from the databse
 */
class Serv
{
    /**
     * Variable which refers to the name of the product
     * @var string
     */
    private $name;

    /**
     * Variable which refers to the price of the product
     * @var int
     */
    private $price;

    /**
     * Get the name of product
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the price of product
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Function which will pull the name and prices of the products
     * from the database if the user is logged in
     * @return mixed
     */
    public static function getProducts()//refactor name
    {
        // new instance for connection
        $db = new DatabaseManager();
        $connection = $db->getDbhandler();

        $statement = $connection->prepare('SELECT * FROM Products');
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Serv');
        $statement->execute();

        $servicesAvailable = $statement->fetchAll();

        return $servicesAvailable;
    }

    /**
     * Function which will pull the name and price of the products
     * from the database if the user is NOT logged in
     * @return mixed
     */
    public static function getProductsIfNotLogger()
    {
        // new instance for connection
        $db = new DatabaseManager();
        $connection = $db->getDbhandler();

        $statement = $connection->prepare('SELECT * FROM ProductsNoPrice');
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Serv');
        $statement->execute();

        $servicesAvailable = $statement->fetchAll();

        return $servicesAvailable;
    }
}
