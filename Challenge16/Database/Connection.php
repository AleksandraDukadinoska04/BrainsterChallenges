<?php


class Connection
{
    private $dbType;
    private $host;
    private $dbName;
    private $port;
    private $username;
    private $password;
    private $connection;

    public function __construct($dbType, $host, $dbName, $port, $username, $password)
    {
        $this->setDbType($dbType);
        $this->setHost($host);
        $this->setDbName($dbName);
        $this->setPort($port);
        $this->setUsername($username);
        $this->setPassword($password);
    }

    public function connectToDB()
    {
        $dbType = $this->getDbType();
        $host = $this->getHost();
        $dbName = $this->getDbName();
        $port = $this->getPort();
        $username = $this->getUsername();
        $password = $this->getPassword();
        $connection = $this->getConnection();

        try {
            $connection = new PDO("$dbType:host=$host;dbname=$dbName;port=$port", $username, $password);
            $this->setConnection($connection);
        } catch (PDOException $errors) {
            echo $errors->getMessage();
            die();
        }
    }

    public function insertInfoToDB(array $array)
    {
        $connection = $this->getConnection();

        $insertSQL = "INSERT INTO webpage (coverImage, mainTitle, subtitle, aboutYou, number, location, services_products, imageOne,descriptionOne, imageTwo, descriptionTwo, imageThree, descriptionThree, companyDescription, linkedin, facebook, twitter, google) VALUES (:coverImage, :mainTitle, :subtitle, :aboutYou, :number, :location, :services_products, :imageOne, :descriptionOne, :imageTwo, :descriptionTwo, :imageThree, :descriptionThree, :companyDescription, :linkedin, :facebook, :twitter, :google)";
        $insertQuery = $connection->prepare($insertSQL);
        $insertQuery->execute($array);
    }

    public function getLastID()
    {
        $connection = $this->getConnection();

        $selectSQL = "SELECT * FROM webpage ORDER BY id DESC LIMIT 1;";
        $selectQuery = $connection->prepare($selectSQL);
        $selectQuery->execute();
        $result = $selectQuery->fetch(PDO::FETCH_ASSOC);

        $id = $result["id"];
        return $id;
    }

    public function getInfoFromID(int $id)
    {
        $connection = $this->getConnection();

        $selectSQL = "SELECT * FROM webpage WHERE id = :id ;";
        $selectQuery = $connection->prepare($selectSQL);
        $selectQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $selectQuery->execute();
        $result = $selectQuery->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function existingID($id)
    {
        $connection = $this->getConnection();

        $selectSQL = "SELECT id FROM webpage;";
        $selectQuery = $connection->prepare($selectSQL);
        $selectQuery->execute();
        $result = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $array) {
            if (in_array($id, $array)) {
                return false;
            }
        }

        return true;
    }



    public function getDbType()
    {
        return $this->dbType;
    }
    public function setDbType($dbType)
    {
        $this->dbType = $dbType;

        return $this;
    }


    public function getHost()
    {
        return $this->host;
    }
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }


    public function getDbName()
    {
        return $this->dbName;
    }
    public function setDbName($dbName)
    {
        $this->dbName = $dbName;

        return $this;
    }


    public function getPort()
    {
        return $this->port;
    }
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }


    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    public function getConnection()
    {
        return $this->connection;
    }
    public function setConnection($connection)
    {
        $this->connection = $connection;

        return $this;
    }
}
