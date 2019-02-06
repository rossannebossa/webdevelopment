<?PHP session_start();   ?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       require './dbConn.php';
       $id = $_GET['id'];
       
       if(isset($_GET['DELETE']))
       {
           $conn->delete($id);
       }
       if(isset($_GET['EDIT']))
       {
          $conn->displayDataForOne($id) ;
       }
       if(isset($_GET['cancel']))
       {
           header('location:displayData.php');
       }
       if(isset($_GET['save']))
       {
           //
           $name= trim($_GET['name']);
           $age = $_GET['age'];
           $gender = $_GET['gender'];
           
           
         if(empty($name) ||!ctype_alpha($name))
         {
              $_SESSION['nameErr'] = 'Name value needs to be non-empty, and may not contain numbers!';
              
         }else{
             //We check if a previous unsuccessful attempt existed
             if(isset($_SESSION['nameErr']))
             {
                 unset($_SESSION['nameErr']);
             }
             
              $conn->updateRecord($name,$age,$gender,$id);
              
         }
         
            header('location:displayData.php');
           
           
       }
        ?>
    </body>
</html>
