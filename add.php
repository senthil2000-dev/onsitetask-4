<?php 
require_once("includes/header.php");
require_once("includes/classes/AddUpdateForm.php");
if(isset($_POST["addButton"])) {
    $name=$_POST["name"];
    $roll=$_POST["roll"];
    $degree=$_POST["degree"];
    $department=$_POST["department"];
    if(isAlready($roll, $con)>0) {
        echo "<div class='failure'><b>ERROR! </b>Roll no already exists</div>";
    }
    else {
        $query=$con->prepare("INSERT INTO nitians(name, rollno, degree, department) VALUES (:name, :roll, :degree, :department)");
        $query->bindParam(":name", $name);
        $query->bindParam(":roll", $roll);
        $query->bindParam(":degree", $degree);
        $query->bindParam(":department", $department);
        if(!$query->execute())
            echo "<div class='failure'><b>ERROR! </b>Failed inserting data</div>";
        else
            header("Location: table.php");
    }
}
function isAlready($rollno, $con) {
    $query=$con->prepare("SELECT * FROM nitians WHERE rollno = :roll");
    $query->bindParam(":roll", $rollno);
    $query->execute();
    return $query->rowCount();
}
?>
<style>
body {
    display: flex;
    flex-direction: column;
    background-color: rgba(0,0,0,0.2);
}
</style>
<?php
$form=new AddUpdateForm($con);
echo $form->createAddForm();
?>