<?php

namespace models;

use database\Database;
use PDO;

class JobModel {
    private $connection;
    
    private $jobTitle;
    private $jobAddr1;
    private $jobAddr2;
    private $jobQualifications;
    private $jobDescription;
    private $jobSalary;
    private $jobFrom;


    public function setJobTitle($jobTitle) { $this->jobTitle = $jobTitle; }
    public function getJobTitle() { return $this->jobTitle; }

    public function setAddress1($address) { $this->jobAddr1 = $address; }
    public function getAddress1() { return $this->jobAddr1; }
 
    public function setAddress2($address) {$this->jobAddr2 = $address; }
    public function getAddress2() { return $this->jobAddr2;}

    public function setJobQualifications($qualifications) { $this->jobQualifications = $qualifications;}
    public function getJobQualifications() { return $this->jobQualifications; }

    public function setJobDescription($description) { $this->jobDescription = $description; }
    public function getJobDescription() { return $this->jobDescription; }

    public function setJobSalary($salary) { $this->jobSalary = $salary; }
    public function getJobSalary() { return $this->jobSalary; }

    public function setJobFrom($jobfrom) { $this->jobFrom = $jobfrom; }
    public function getJobFrom() { return $this->jobFrom; }





    public function __construct(){
        $database = new Database;
        $this->connection = $database->getConnection();
    }

    public function getAllJob(){
        $query = "SELECT * from jobs";
        $statement = $this->connection->query($query);

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function getAllJobFromOther(){

        

        $query = "SELECT * from jobs where job_from !=:jobfrom";
        $statement = $this->connection->prepare($query);

        $values = [
            ':jobfrom' => $this->getJobFrom()
        ];

        $statement->execute($values);
        return $statement->fetchAll();
    }


    public function getJobByID($id){
        $query = "SELECT * from jobs where job_id =:job_id";

        $statement = $this->connection->prepare($query);

        $values = [
            ':job_id' => $id
        ];
        $statement->execute($values);
        return $statement->fetchAll();
    }



    public function storeJob(){

        $query = "INSERT into jobs(job_title, job_address1, job_address2, qualifications, job_desc, salary, job_from) values(:jobTitle, :jobAddr1, :jobAddr2, :qualifications, :jobDesc, :jobSalary, :jobFrom)";
        
        $statement = $this->connection->prepare($query);

        $values = [

            ':jobTitle' => $this->getJobTitle(),
            ':jobAddr1' => $this->getAddress1(),
            ':jobAddr2' => $this->getAddress2(),
            ':qualifications' => $this->getJobQualifications(),
            ':jobDesc' => $this->getJobDescription(),
            ':jobSalary' => $this->getJobSalary(),
            ':jobFrom' => $this->getJobFrom()
        ];

        $statement->execute($values);

        return true;




    }
}



?>










