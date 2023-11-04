<?php
class Database
{
    protected $db;
    public $link;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        include_once 'constant.php';

        $dsn = 'mysql:host='.HOST.';dbname='. DB_NAME .';charset='. CHARSET ;

        $this->link = new PDO($dsn, USERNAME,PASSWORD);

        return $this;
    }

    public function execute($sql, $params = array()) {
        $sth = $this->link->prepare($sql);

        return $sth->execute($params);
    }

    public function query($sql) {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchALL(PDO::FETCH_ASSOC);

        if ($result === false) {
            return ;
        }

        return $result;
    }

}