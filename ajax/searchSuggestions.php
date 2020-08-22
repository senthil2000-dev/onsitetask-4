<?php
require_once("../includes/config.php");
$query=$con->prepare("SELECT * FROM nitians");
$query->execute();
$suggested=array();
while($row=$query->fetch(PDO::FETCH_ASSOC)) {
    array_push($suggested, $row["name"]);
    array_push($suggested, $row["rollno"]);
}
$suggested=array_unique($suggested, SORT_REGULAR);
$result=array_values($suggested);
echo json_encode($result);
?>