<?php
class ResultProvider {
    private $con;

    public function __construct($con) {
        $this->con=$con;
    }

    public function getCount($phrase) {
        $query = $this->con->prepare("SELECT COUNT(*) as total FROM nitians WHERE name LIKE :phrase OR rollno LIKE :phrase");
        $searchPhrase="%" . $phrase . "%";
        $query->bindParam(":phrase", $searchPhrase);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["total"];
    }

    public function getResults($phrase) {
        $query = $this->con->prepare("SELECT * FROM nitians WHERE name LIKE :phrase OR rollno LIKE :phrase");
        $searchPhrase="%" . $phrase . "%";
        $query->bindParam(":phrase", $searchPhrase);
        $query->execute();
        $html="";
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $name = $row["name"];
            $roll = $row["rollno"];
            $department = $row["department"];
            $degree = $row["degree"];
            $html.="<div class='resultBox'>
                        <span>Name: $name</span>
                        <span>Roll no: $roll</span>
                        <span>Department: $department</span>
                        <span>Degree: $degree</span>
                    </div>
                    <hr>";
        }
        return $html;
    }
}
?>