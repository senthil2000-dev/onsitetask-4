<?php
class CreateTable{

    private $con;

    public function __construct($con) {
        $this->con=$con;
    }
    public function getTable() {
        $html= "<table>
                <tr>
                <th>Name</th>
                <th>Rollno</th>
                <th>Department</th>
                <th>Degree</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>";
        $query=$this->con->prepare("SELECT * FROM nitians");
        $query->execute();
        while($row=$query->fetch(PDO::FETCH_BOTH)){
            $id=$row["id"];
            $stud=new Student($this->con, $id);
            $html.="<tr>";
            $name=$stud->getName();
            $roll=$stud->getRoll();
            $dep=$stud->getFormatDepartment();
            $deg=$stud->getFormatDegree();
            $action2="editFunc($id)";
            $action="deleteFunc(this, $id)";
            $html.="<td>$name</td>
                    <td>$roll</td>
                    <td>$dep</td>
                    <td>$deg</td>
                    <td><button class='btn' onclick='$action2'>EDIT</button>
                    <td><button class='btn' onclick='$action'>DELETE</button>
                    </td>";
            $html.="</tr>";
        }
        $html.="</table>";
        return $html;
    }
}