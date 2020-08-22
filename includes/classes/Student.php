<?php
class Student{

    private $con, $sqlData, $id;

    public function __construct($con, $id) {
        $this->con=$con;

        $query=$this->con->prepare("SELECT * FROM nitians WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $this->sqlData=$query->fetch(PDO::FETCH_ASSOC);
        $this->id=$id;
    }
    public function getName() {
        return $this->sqlData["name"];
    }
    public function getRoll() {
        return $this->sqlData["rollno"];
    }

    public function getDepartment() {
        return $this->sqlData["department"];
    }

    public function getDegree() {
        return $this->sqlData["degree"];
    }
    public function getFormatDepartment() {
        $num = $this->sqlData["department"];
        $query=$this->con->prepare("SELECT name FROM departments WHERE id=:id");
        $query->bindParam(":id", $num);
        $query->execute();
        return $query->fetchColumn();
    }

    public function getFormatDegree() {
        return ($this->sqlData["degree"]==0)?"Btech":"Mtech";
    }
}