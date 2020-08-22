<?php
class AddUpdateForm{
    private $con;

    public function __construct($con){
        $this->con=$con;
    }
    public function createAddForm(){
        $name=$this->createNameInput(null);
        $rollno=$this->createRollInput(null);
        $departmentsInput=$this->createDepartmentsInput(null);
        $degreeInput=$this->createDegreeInput(null);
        $addButton=$this->createAddButton();

        return "<div class='column'>
                <h1>NittApi</h1>
                <h5>Add student form</h5>
                <form class='styleForm' method='POST' enctype='multipart/form-data'>
                    $name
                    $rollno
                    $departmentsInput
                    $degreeInput
                    $addButton
                </form></div>";
    }

    public function createEditDetailsForm($stud){
        $name=$this->createNameInput($stud->getName());
        $rollno=$this->createRollInput($stud->getRoll());
        $departmentsInput=$this->createDepartmentsInput($stud->getDepartment());
        $degreeInput=$this->createDegreeInput($stud->getDegree());
        $saveButton=$this->createSaveButton();
        return "<div class='column'>
                <h1>NittApi</h1>
                <h5>Edit student form</h5>
                <form class='styleForm' method='POST'>
                    $name
                    $rollno
                    $departmentsInput
                    $degreeInput
                    $saveButton
                </form></div>";
    }

    private function createNameInput($value){
        if($value==null) $value="";
        return "<div class='form-group'>
                    <input class='form-control' type='text' placeholder='Full Name' name='name' value='$value' required>
                </div>";
    }
    private function createRollInput($value){
        if($value==null) $value="";
        return "<div class='form-group'>
                    <input class='form-control' type='tel' pattern='[1][0][0-9]{7}' placeholder='Roll Number' name='roll' value='$value' required>
                </div>";
    }

    private function createDegreeInput($value){
        if($value==null) $value="";

        $btechSelected=($value==0) ? "selected='selected'" : "";
        $mtechSelected=($value==1) ? "selected='selected'" : "";

        return "<div class='form-group'>
                    <select class='form-control' name='degree'>
                        <option value='0' $btechSelected>Btech</option>
                        <option value='1' $mtechSelected>MTech</option>
                    </select>
                </div>
                ";
        
    }
    
    private function createDepartmentsInput($value) {
        if($value==null) $value="";
        $query=$this->con->prepare("SELECT * FROM departments");
        $query->execute();
        $html="<div class='form-group'>
        <select class='form-control' name='department'>";

        while($row=$query->fetch(PDO::FETCH_ASSOC)){
            $id=$row["id"];
            $name=$row["name"];
            $selected=($id==$value) ? "selected='selected'" : "";

            $html.="<option value='$id' $selected>$name</option>";
        }

        $html.="</select>
            </div>";
        
        return $html;
    }
    private function createAddButton(){
        return "<button type='submit' class='btn' name='addButton'>Add</button>";
    }

    private function createSaveButton(){
        return "<button type='submit' class='btn' name='saveButton'>Save</button>";
    }
}
?>