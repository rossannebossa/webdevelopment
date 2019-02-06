<!DOCTYPE html>
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
       
        $horror = array('The Conjuring','The ring');
        $action = array('Die Hard','Die Hard2');
        $comedy = array('Scary Movie 1','Scary Movie 2');
        
        //
        $movies = array('Horror'=>$horror,'Action'=>$action,'Comedy'=>$comedy);
        
        foreach ($movies as $movieCatNum =>$movieType )
        {
            echo "<span style='background-color:black;color:white'>".$movieCatNum.'</span><br />';
            foreach ($movieType as $movieNum => $movie) {
                echo $movie.'<br />'; 
            }
        }
        
        
        ?>
    </body>
</html>
