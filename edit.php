<?php
$id=$_GET["id"];
require_once("includes/header.php");
require_once("includes/classes/AddUpdateForm.php");
require_once("includes/classes/Student.php");
if(isset($_POST["saveButton"])) {
    $name=$_POST["name"];
    $roll=$_POST["roll"];
    $degree=$_POST["degree"];
    $department=$_POST["department"];
    if(isAlready($roll, $con, $id)) {
        echo "<div class='failure'><b>ERROR! </b>Roll no already in use</div>";
    }
    else {
        $query=$con->prepare("UPDATE nitians SET name=:name, rollno=:roll, degree=:degree, department=:department WHERE id=:id");
        $query->bindParam(":name", $name);
        $query->bindParam(":roll", $roll);
        $query->bindParam(":degree", $degree);
        $query->bindParam(":department", $department);
        $query->bindParam(":id", $id);
        if(!$query->execute())
            echo "<div class='failure'><b>ERROR! </b>Failed inserting data</div>";
        else
            header("Location: table.php");
    }
}
function isAlready($rollno, $con, $givenId) {
    $query=$con->prepare("SELECT id FROM nitians WHERE rollno = :roll");
    $query->bindParam(":roll", $rollno);
    $query->execute();
    $id=$query->fetchColumn();
    if(($query->rowCount()>0)&&($id!=$givenId))
        return true;        
    else
        return false;
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
$stud = new Student($con, $id);
$form=new AddUpdateForm($con);
echo $form->createEditDetailsForm($stud);
?>
?>