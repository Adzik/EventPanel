<?php


class Authorization
{
    private $_id;
    private $_nickname;
    private $_password;
    private $_group;
    private $_dpdo;


    public function __construct()
    {
        try{
            global $pdo;
            $this -> _dpdo = $pdo;
        }
        catch(PDOException $e){
            return $e->getMessage();
        }

    }
    //Set
    public function setID($id)
    {
        $this -> _id = $id;
    }
    public function setUser($user)
    {
        $this -> _nickname = $user;
    }
    public function setPassword($password)
    {
        $this -> _password = $password;
    }
    public function setGroup($group)
    {
        $this -> _group = $group;
    }
    //Get
    public function getID()
    {
        return $this -> _id;
    }
    public function getUser()
    {
        return $this -> _nickname;
    }
    public function getPassword()
    {
        return $this -> _password;
    }
    public function getGroup()
    {
        return $this -> _group;
    }

    public function validateUser()
    {
        if ( ($this->getUser())=='' || ($this->getPassword())=='' )
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function Hash()
    {
        return sha1(md5($this->getPassword().$this->getPassword()));
    }

    public function Login()
    {
        $password = $this -> Hash();
        $stmt = $this ->_dpdo->prepare("SELECT * FROM users WHERE Nick = :nickname AND Password = :password");
        $stmt -> bindValue(':nickname', $this -> getUser(), PDO::PARAM_STR);
        $stmt -> bindValue(':password', $password, PDO::PARAM_STR);
        $stmt -> execute();

        if ($row = $stmt -> fetch())
        {
            session_start();
            $_SESSION['logged'] = true;
            $_SESSION['user_id'] = $row['Nick'];
            ini_set('session.cookie_httponly', 1);
            return true;
        }
        else
        {
            return false;
        }
        $stmt -> closeCursor();
    }
    public function EditUser()
    {
     $password = $this -> Hash();
     $stmt = $this -> _dpdo->prepare('UPDATE users SET Nick = :Nick, Password = :Password, Aktywny = :Aktywny WHERE ID = :id');
     $stmt -> bindValue(':id', $this -> getID(), PDO::PARAM_INT);
     $stmt -> bindValue(':Nick', $this -> getUser(), PDO::PARAM_STR);
     $stmt -> bindValue(':Password', $password, PDO::PARAM_STR);
     $stmt -> bindValue(':Aktywny', $this -> getGroup(), PDO::PARAM_INT);
     $stmt -> execute();


     if ($stmt -> rowCount() != 0)
     {
         return true;
     }
     else
     {
         return false;
     }
     $stmt -> closeCoursor();

    }
    public function LogOut()
    {
        session_start();
        session_unset();
        session_destroy();
    }


}