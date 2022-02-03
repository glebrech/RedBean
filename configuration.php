<?php

class DAO
{
    private $host = 'localhost';
    private $dbredbean = 'dao';
    private $user = 'root';
    private $password = '';
    protected function connectBDD()
    {
        require_once(dirname(__FILE__) . '/rb-mysql.php');
        R::setup("mysql:host=$this->host;dbname=$this->dbredbean", $this->user, $this->password);
    }
    public function setup()
    {
        $this->connectBDD();
    }
}
$connect = new DAO;
$connect->setup();