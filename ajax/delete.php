<?php
require_once("../includes/config.php");
$id=$_POST["id"];
$query=$con->prepare("DELETE FROM nitians WHERE id=:id");
$query->bindParam(":id", $id);
$query->execute();
?>