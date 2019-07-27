<?php

include_once 'user.inc.php';

class UserSession{

    private const SESSION_ORIGIN_KEY = "123@321";
    private const SESSION_ORIGIN_NAME = "usersession";

    public function setUserSessionKey($email){ 
         if(!empty($email)){
             try {
                #generate session key
                $cookie_value = md5(self::SESSION_ORIGIN_KEY. $email . time());
                #set session to cookie
                setcookie(self::SESSION_ORIGIN_NAME, null, -1, '/'); 
                setcookie(self::SESSION_ORIGIN_NAME, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

                $conn = DBH::getInstance();
                $stmt = $conn->prepare("UPDATE usersinfo SET session = ? WHERE email = ?");
                $stmt->execute([$cookie_value,$email]);

                //catch exception
            }catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }

            return true;
           
         }else{
            return false;
         }
    }

    public function getUserSessionKey(){
        if(!isset($_COOKIE[self::SESSION_ORIGIN_NAME])) {
            return "";
        } else {
            return $_COOKIE[self::SESSION_ORIGIN_NAME];
        }
    }

    public function useSessionAutoLogin(){

        $session = $this->getUserSessionKey();

        if(!empty($session)){

            $conn = DBH::getInstance();
            $stmt = $conn->prepare("SELECT * FROM usersinfo WHERE session = ? LIMIT 1");
            $stmt->execute([$session]);
            $count = $stmt->rowCount();

            if($count > 0){
                 $user = NULL;
                 foreach($stmt->fetchAll() as $result){
                     $user = new User($result->id ,$result->name, $result->email, $result->session);
                  }
                  return $user;
            }else{
                return false;
            }

        }
    }

    public function getUserFromSession(){
         $session = $this->getUserSessionKey();

        if(!empty($session)){

            $conn = DBH::getInstance();
            $stmt = $conn->prepare("SELECT * FROM usersinfo WHERE session = ? LIMIT 1");
            $stmt->execute([$session]);
            $count = $stmt->rowCount();

            if($count > 0){
                 $user = NULL;
                 foreach($stmt->fetchAll() as $result){
                     $user = new User($result->id,$result->name, $result->email, $result->session);
                  }
                  return $user;
            }else{
                return false;
            }

        }
    }

    public function useSessionLogout(){

        $session = $this->getUserSessionKey();

         $conn = DBH::getInstance();
         $stmt = $conn->prepare("UPDATE usersinfo SET session = ? WHERE session = ?");
         $stmt->execute(["",$session]);

        return true;
    }

}