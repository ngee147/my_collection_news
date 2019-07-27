<?php


class User {

    public $id;
    public $name;
    public $email;
    public $session;

    public function __construct($id, $name, $email, $session){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->session = $session;
    }

}