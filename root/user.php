<?php

class User{
    private $logged;
    private $name;
    private $login;
    


    public function __construct() {
        if(isset($_SESSION['user'])){
            $db = new DB();
            $res = $db->query("SELECT * FROM users WHERE id=".$_SESSION['user'] );
            if(count($res) == 1){
                $this->logged   = true;
                $this->login    = $res[0]['login'];
                $this->name     = $res[0]['name'];
            }
        }
    }
    
    public function isLogged(){
        return $this->logged;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getLogin(){
        return $this->login;
    }
}

