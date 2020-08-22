<?php
require_once("includes/header.php");
require_once("includes/classes/Student.php");
require_once("includes/classes/createTable.php");
?>
<div class="flexing">
<h3>Student Database</h3>
<button class="btn" onclick="window.location.href='index.php'">HOME</button>
</div>
<?php
$table=new createTable($con);
echo $table->getTable();
?>
<script src="assets/js/delete.js"></script>