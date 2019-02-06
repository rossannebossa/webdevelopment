<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbConn
 *
 * @author Student
 */
class dbConn {
    
    private $host,$user,$password,$database,$link;
    
    
    function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    
    function connInit()
    {
        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if(!$this->link)
        {
            die('Error:'.mysqli_error($this->link));
        }
    }
    
    function insert($name,$age,$gender)
    {
        $query = "INSERT INTO `my_db`.`info` (`id`, `name`, `age`, `gender`) VALUES (NULL, '$name', '$age', '$gender');";
        
        if(mysqli_query($this->link, $query))
        {
            echo "Record saved";
        }
        else{
            echo 'Problem';
        }
        
        
    }
    
    function displayData()
    {
        $query = "SELECT * FROM `info` ORDER by id DESC ";
        
        $result = mysqli_query($this->link, $query);
        while($row = mysqli_fetch_array($result,1))
        {
            $name = $row['name'];
            $age = $row['age'];
            $gender = $row['gender'];
            $id = $row['id'];
            
            echo "<form action='editDelete.php'>"
            . "<input type = 'hidden' name = 'id' value = '$id'><br />"
                    . "<input readonly type  = 'text' name = 'name' value = '$name'><br />"
                    . "<input readonly type  = 'text' name = 'age' value = '$age'><br />"
                    . "<input readonly type = 'text' name = 'gender' value = '$gender'><br />"
                        . "<input type = 'submit' name = 'DELETE' value = 'DELETE'><br />"
                    ."<input type = 'submit' name = 'EDIT' value = 'EDIT'><br />"
                    . "</form>";
            
        }
        
        
        
        
    }
    
    function delete($id)
    {
        $query = "DELETE FROM `my_db`.`info` WHERE `info`.`id` = $id";
        mysqli_query($this->link, $query);
        header('location:displayData.php');
        
        
    }
    
    function displayDataForOne($id)
    {
        $query = "SELECT * FROM `info` WHERE `info`.`id` = $id";
        
        $result = mysqli_query($this->link, $query);
        while($row = mysqli_fetch_array($result,1))
        {
            $name = $row['name'];
            $age = $row['age'];
            $gender = $row['gender'];
            $id = $row['id'];
            
            echo "<form action='editDelete.php'>"
            . "<input type = 'hidden' name = 'id' value = '$id'><br />"
                    . "Name:<input  type  = 'text' name = 'name' value = '$name'><br />Age:<select name='age'>";
            
            $ageArr = range(10, 100);
                        foreach ($ageArr as $key => $value) {
                            echo "<option ";echo ($value==$age)?'selected':'';  echo ">$value</option>";
                        }
            
            echo         "</select><br />"
                        ."GENDER:<br />"
                        . "<input "; if($gender == 'Male')echo 'checked'; echo"  type = 'radio' name = 'gender' value = 'Male' >Male:<br />"
                        . "<input "; if($gender == 'Female')echo 'checked'; echo"  type = 'radio' name = 'gender' value = 'Fenale' >Female:<br />"
                            . ""
                        . "<input type = 'submit' name = 'save' value = 'SAVE'><br />"
                    ."<input type = 'submit' name = 'cancel' value = 'CANCEL'><br />"
                    . "</form>";
            
        }
        
        
        
        
    }
    
    function updateRecord($name,$age,$gender,$id)
    {
        $query = "UPDATE `my_db`.`info` SET `name` = '$name', `age` = '$age', `gender` = '$gender' WHERE `info`.`id` = $id;";
        if(mysqli_query($this->link, $query))
        {
            $_SESSION['updateSuccess']= "Changes have been saved!";
        }
        else{
            $_SESSION['updateError'] = "Changes unsuccessful:".  mysqli_error($this->link);
        }
        
        
    }
    
}

$conn = new dbConn('localhost', 'user', 1234, 'my_db');

$conn->connInit();


