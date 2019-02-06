<?PHP session_start();   ?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style>
            input[type='text']
            {
                border:none;
            }
        </style>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(isset( $_SESSION['nameErr']))
        {
            echo  $_SESSION['nameErr'];
        }
        
       
        
       require './dbConn.php';
                            
                            $conn->displayData();
        ?>
    </body>
</html>
