<?php
namespace Components\Orm;

class Connector
{
    protected $config;
    protected $configPath = [
        "vsolomka_db" => "../app/config/configDb.php"
    ];

    public function __construct(string $dbName = "vsolomka_db")
    {
        if (!empty($this->configPath[$dbName])) {
            $this->config = require $this->configPath[$dbName];
        } else {
            throw new Exception("DB name is not valid");
        }
    }

    public function connect()
    {
        if (empty($this->config["dbDriver"])) {
            throw new Exception("Wrong DB driver");
        }
        if (empty($this->config["dbName"])) {
            throw new Exception("Wrong DB name");
        }
        if (empty($this->config["dbHost"])) {
            throw new Exception("Wrong DB host");
        }
        if (empty($this->config["dbUser"])) {
            throw new Exception("Wrong DB user");
        }
        if (empty($this->config["dbPswd"])) {
            throw new Exception("Wrong DB password");
        }

        $dns = $this->config["dbDriver"] . ":host=" . $this->config["dbHost"] . ";dbname=" . $this->config["dbName"];

        return new PDO(
            $dns,
            $this->config["dbUser"],
            $this->config["dbPswd"]
        );
    }
}