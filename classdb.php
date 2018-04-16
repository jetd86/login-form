<?php

class Database
{
    private $link; // сюда будем сохранять соединение с базой данных

    //в конструкторе будем вызывать соединение с базой
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect()
    {
        $configdb = require_once 'configdb.php';
        $dsn = 'mysql:host=' . $configdb['host'] . ';dbname=' . $configdb['db_name'] . ';charset=' . $configdb['charset'];
        $this->link = new PDO($dsn, $configdb['username'], $configdb['password']);
        return $this;
    }

    public function execute($sql)
    {
        //сюда будет записываться ид нашего запроса.
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    public function query($sql)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if ($result === false) {
            return [];
        }
        return $result;
    }

}
?>



