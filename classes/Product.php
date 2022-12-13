<?php
//this class is part of the business layer it uses the DBAcess class
require_once("DBAccess.php");

class product
{
    //private properties
    private $_itemName;
    private $_itemId;
    private $_price;
    private $_salePrice;
    private $_description;
    private $_featured;
    private $_photo;
    private $_categoryId;
    private $_db;


    //constructor sets up the database settings and creates a DBAccess object
    public function __construct()
    {
        //get database settings
        include "settings/db.php";

        try {
            //create database object
            $this->_db = new DBAccess($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Unable to connect to database, " . $e->getMessage());
        }
    }

    //set and get methods 
    public function getItemId()
    {
        return $this->_itemId;
    }

    //get product name
    public function getItemName()
    {
        return $this->_itemName;
    }

    //set product name
    public function setItemName($itemName)
    {
        return $this->_itemName = $itemName;
    }

    //get the price
    public function getPrice()
    {
        return $this->_price;
    }

    //set the price
    public function setPrice($price)
    {
        return $this->_price = $price;
    }

    //get the salePrice
    public function getSalePrice()
    {
        return $this->_salePrice;
    }

    //set the salePrice
    public function setSalePrice($salePrice)
    {
        return $this->_salePrice = $salePrice;
    }

    //get product description
    public function getDescription()
    {
        return $this->_description;
    }

    //set product description
    public function setDescription($description)
    {
        return $this->_description = $description;
    }

    //get featured products
    public function getFeatured()
    {
        return $this->_featured;
    }

    //set featured products
    public function setFeatured($featured)
    {
        $this->_featured = $featured;
    }

    //get photo
    public function getPhoto()
    {
        return $this->_photo;
    }

    public function setCategoryId($categoryId)
    {
        $this->_categoryId = $categoryId;
    }

    //get categoryId
    public function getCategoryId()
    {
        return $this->_categoryId;
    }

    //get a product from the database for the id supplied
    public function getProduct($id)
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();
            //set up SQL and bind parameters
            $sql = "select itemId, itemName, photo, price, salePrice, description, featured, categoryId from item where itemId = :itemId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':itemId', $id, PDO::PARAM_INT);
            //execute SQL
            $rows = $this->_db->executeSQL($stmt);
            //get the first row as it is a primary key there will only be one row
            $row = $rows[0];
            //populate the private properties with the retreived values
            $this->_itemId = $row["itemId"];
            $this->_itemName = $row["itemName"];
            $this->_price = $row["price"];
            $this->_salePrice = $row["salePrice"];
            $this->_description = $row["description"];
            $this->_featured = $row["featured"];
            $this->_photo = $row["photo"];
            $this->_categoryId = $row["categoryId"];
        } catch (PDOException $e) {
            throw $e;
        }
    }

    // get all products
    public function getProducts()
    {
        try {
            // connect to db
            $pdo = $this->_db->connect();

            // set up SQL
            $sql = "select itemId, photo, itemName, price, salePrice, description, featured, categoryId from item";
            $stmt = $pdo->prepare($sql);

            // execuet SQL
            $rows = $this->_db->executeSQL($stmt);

            return $rows;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    // insert product
    public function insertProduct()
    {
        try {
            //connecting to db
            $pdo = $this->_db->connect();

            $sql = "Insert into item(itemName, price, salePrice, description, featured, categoryId) values(:itemName, :price, :salePrice, :description, :featured, :categoryId)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":itemName", $this->_itemName, PDO::PARAM_STR);
            $stmt->bindValue(":price", $this->_price, PDO::PARAM_INT);
            $stmt->bindValue(":salePrice", $this->_salePrice, PDO::PARAM_INT);
            $stmt->bindValue(":description", $this->_description, PDO::PARAM_STR);
            $stmt->bindValue(":featured", $this->_featured, PDO::PARAM_INT);
            $stmt->bindValue(":categoryId", $this->_categoryId, PDO::PARAM_INT);

            $value = $this->_db->executeNonQuery($stmt, true);
            return $value;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //update product
    public function updateProduct($id)
    {
        try {
            $pdo = $this->_db->connect();

            $sql = "update item set itemName=:itemName,  price=:price, salePrice=:salePrice, description=:description, featured=:featured, categoryId=:categoryId where itemId=:itemId";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(":itemName", $this->_itemName, PDO::PARAM_STR);
            $stmt->bindValue(":price", $this->_price, PDO::PARAM_INT);
            $stmt->bindValue(":salePrice", $this->_salePrice, PDO::PARAM_INT);
            $stmt->bindValue(":description", $this->_description, PDO::PARAM_STR);
            $stmt->bindValue(":featured", $this->_featured, PDO::PARAM_INT);
            $stmt->bindValue(":categoryId", $this->_categoryId, PDO::PARAM_INT);
            $stmt->bindValue(":itemId", $id, PDO::PARAM_INT);

            $value = $this->_db->executeNonQuery($stmt, false);
            return $value;
        } catch (Exception $e) {
            throw $e;
        }
    }

    //delete product
    public function deleteProduct($id)
    {
        try {
            $pdo = $this->_db->connect();

            $sql = "delete from item where itemId=:itemId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":itemId", $id, PDO::PARAM_INT);

            $value = $this->_db->executeNonQuery($stmt, false);
            return $value;
        } catch (Exception $e) {
        }
    }
}
