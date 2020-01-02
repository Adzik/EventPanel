<?php


class Authorization
{
    private $_id;
    private $_nickname;
    private $_password;
    private $_secondPassword;
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
    public function setSecondPassword($secondPassword)
    {
        $this -> _secondPassword = $secondPassword;
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
    public function getSecondPassword()
    {
        return $this -> _secondPassword;
    }
    public function getGroup()
    {
        return $this -> _group;
    }
    //Walidacja
    public function checkPasswords()
    {
        if ($this -> getPassword() != $this -> getSecondPassword())
        {
            return false;
        }
        else
        {
            return true;
        }
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
    //Hashowanie hasła
    public function Hash()
    {
        return sha1(md5($this->getPassword().$this->getUser().$this->getPassword()));
    }
    //Operacje
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
            $_SESSION['active'] = $row['Aktywny'];
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
    public function RegisterUser()
    {
        $getNick = $this -> _dpdo->prepare('SELECT Nick FROM users WHERE Nick = :nick');
        $getNick->bindValue(':nick', $this->GetUser(), PDO::PARAM_STR);
        $getNick->execute();

        if($getNick -> rowCount() != 0)
        {
            return false;
        }
        else
        {
            $password = $this -> Hash();
            $stmt = $this -> _dpdo->prepare('INSERT INTO users (Nick, Password, Aktywny) VALUES (:nick, :password, :aktywny)');
            $stmt -> bindValue(':nick', $this ->GetUser(), PDO::PARAM_STR);
            $stmt -> bindValue(':password', $password, PDO::PARAM_STR);
            $stmt -> bindValue(':aktywny', $this -> getGroup(), PDO::PARAM_INT);
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




    }
    public function LogOut()
    {
        session_start();
        session_unset();
        session_destroy();
    }


}