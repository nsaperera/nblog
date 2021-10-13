<?php

class DB extends PDO
{

    protected   $dsn = "mysql:host=localhost;dbname=myblog;charset=utf8;",
    $username   = "phpmyadmin",
    $password   = "admin_354NSAPerera",
    $options    = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    public function __construct(){
      parent::__construct($this->dsn, $this->username, $this->password, $this->options);
    }



}
