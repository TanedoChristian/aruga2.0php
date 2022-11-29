<?php

namespace models;



use database\Database;

class UserModel {
    private $connection;
    private $name;
    private $email;
    private $password;
    private $number;
    
    
    public function setName($name) { $this->name = $name; }
    public function getName() { return $this->name; }

    public function setEmail($email) { $this->email = $email; }
    public function getEmail() { return $this->email; }

    public function setPassword($password) { $this->password = $password; }
    public function getPassword() { return $this->password; }

    public function setNumber($number) { $this->number = $number; }
    public function getNumber() { return $this->number; }

    

 


    public function __construct(){
        $database = new Database;
        $this->connection = $database->getConnection();
    }

    public function storeAccounts(){
        $query = 'INSERT INTO ACCOUNTS(name,email,password,number) values (:name, :email, :password, :number)';
        $statement = $this->connection->prepare($query);


        $newPassword = password_hash($this->getPassword(), PASSWORD_DEFAULT);

        $values = [
            ':name' => $this->getName(),
            ':email' => $this->getEmail(),
            ':password' => $newPassword,
            ':number' => $this->getNumber(),
       
        ];

        $statement->execute($values);

    }

    public function verifyAccount(){
        $query = "SELECT password from accounts where email =:email";

        $statement = $this->connection->prepare($query);
        $values = [
            'email' => $this->getEmail()
        ];
        $statement->execute($values);

        $result = $statement->fetch();

        return $result;

    }

    



    
    
}





?>