<!DOCTYPE html>
<html>
    <head>
        <style>
            form{
                font-family: Calibri,Helvetica,sans-serif;
                background-color: #A4CFEE;
                width: 49%;
                margin: auto;
                border: 8px solid gray;
                padding: 3px 0px 1% 0px;
            }
            form ul li,form ol li{

            }

            ::-webkit-input-placeholder{


                color: #b24066;
                opacity:1 !important;
            }
            :-moz-placeholder{

                color: #b24066;;
            }
            ::-moz-placeholder{

                color: #b24066;;
            }
            ::-ms-input-placeholder{


                color: #b24066;;
                opacity:1 !important;
            }

            ul,ol{
                list-style: none;
            } 
            ul li input,ul select{
                position: absolute;
                left:40%;
                text-align: center;
            }
            ul li{
                padding: 1%;
                margin: 4px 0px;
            }
            ol>li>input{
                position: absolute;
                left:32%;
            }
            ul>li>input{
                border-top:none;
                border-left: none;
                border-right: none;
                border-bottom: 3px solid #666666;
            }
            input,select{
                width: 200px;
            }
            .errors{
                font-style: italic;
                color: red;
            }
            #heading{
                width: 100%;
                background-color: #b24066;
                padding: 10px 38%;
                color: #A4CFEE;
                border-bottom: 5px solid #666666;
                text-align: center;
                margin: auto;
                font-weight: bold;
            }

            #errors_heading{
                width: 100%;
                background-color: #b24066;
                padding: 10px 32%;
                color: #A4CFEE;
                border-bottom: 5px solid #666666;
                text-align: center;
                margin: 1% auto;
                font-weight: bold;
            }

            legend{
                background-color: #b24066;
                color: whitesmoke;
                width: 200px;
                margin-top: 13px;
                text-align: center;
                box-shadow:0px 0px 13px white;

            }
            fieldset{
                background-color: #666666;
                padding: 2%;
                margin: 0px 4% 0px 0px;
                box-shadow:0px 6px 13px black;
            }
            #errors_container{
                height: inherit;
                width: 50%;
                margin: 2% auto;

                background-color: #bfb7b7;
                text-align: center;
            }
            #greeting_container{
                height: inherit;
                width: 50%;
                margin: 2% auto;

                background-color: #bfb7b7;
                text-align: center;
            }
            #greeting_heading{
                width: 100%;
                background-color: #A4CFEE;
                padding: 10px 32%;
                color: aliceblue;
                border-bottom: 5px solid #666666;
                text-align: center;
                margin: 1% auto;
                font-weight: bold;
            }
            #greeting_container {
                background-color: black;
                
               
                width: 50%;
                margin: 3% auto;
                color: #666666;
                height:150px;
                
                
                padding: 1px;
                color: white;
                
                animation: roll 3s ;
                transform: rotate(360deg);
                border-radius:0px 0px 20px 20px;
                box-shadow: 0px 10px 20px #A4CFEE;;
                
            }
            @keyframes roll {
                0% {
                transform: rotate(0);
            }
            100% {
                transform: rotate(360deg);
            }
            }

        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

        <form method="POST">
            <span id="heading">ITBLP WPR200  DEMO</span>
            <ul>
                <fieldset>
                    <legend>Personal Details</legend>
                    <li>Name:<input type="text" name="txtName" value="<?php
if (isset($_POST['btnSave'])) {
    echo $_POST['txtName'];
}
?>" placeholder="Name e.g. John" /></li>
                    <li>Surname:<input type="text" name="txtSurname" value="<?php
                                    if (isset($_POST['btnSave'])) {
                                        echo $_POST['txtSurname'];
                                    }
?>" placeholder="Surname e.g. Doe"  /></li>
                </fieldset>
                <fieldset>
                    <legend>Membership Details</legend>
                    <li>Group Number:
                        <select name="selGroup">

                            <option>-Select Group-</option>
                            <?php
                            for ($groupNumber = 1; $groupNumber < 31; $groupNumber++) {

                                //As we draw this dropdown, what value was in the dropdown, because we want to the attrib. selected to it

                                if (isset($_POST['btnSave'])) {
                                    if ($_POST['selGroup'] == $groupNumber) {
                                        echo "<option selected>$groupNumber</option>";
                                    } else {
                                        echo "<option>$groupNumber</option>";
                                    }
                                } else {
                                    echo "<option>$groupNumber</option>";
                                }
                            }
                            ?>

                        </select>
                    </li>
                    <li>Availability:
                        <ol>
                            <li>Full time:<input type="radio" <?PHP
                            if (isset($_POST['availability']) && $_POST['availability'] == "full time") {
                                echo "checked";
                            }
                            ?> name="availability" value="full time" /></li>
                            <li>Part time:<input type="radio" <?PHP
                                                 if (isset($_POST['availability']) && $_POST['availability'] == "part time") {
                                                     echo "checked";
                                                 }
                            ?> name="availability" value="part time" /></li>
                        </ol>
                    </li>
                </fieldset>
                <fieldset>
                    <legend>Security Details</legend>
                    <li>Password:<input type="password" name="pass" value=""/></li>
                    <li>Confirm:<input type="password" name="confPass" value=""/></li>
                </fieldset>
                <li><input type="submit" value="SAVE" name="btnSave" /></li>




            </ul>

        </form>


        <?php
        /*
         * STEP 1: we create an if to check if the form has been submitted
         * 
         */
        if (isset($_POST['btnSave'])) {
            /*
             * STEP 2: Collect all the info from the form
             */

            $name = trim($_POST['txtName']);
            $surname = trim($_POST['txtSurname']);
            $groupNum = $_POST['selGroup'];
            //Remember we do not simply access a radio button before checking if it was activated
            if (isset($_POST['availability'])) {
                $availability = $_POST['availability'];
            }

            $pass = $_POST['pass'];
            $confPass = $_POST['confPass'];


            /*
             * STEP 3: Do we have errors?
             * 
             */


            //For this first demo, we will create custom error messages that will be displayed below the form
            //An errors array will be used

            $errors = array();
            //Name validation

            if (empty($name)) {//This is the same as if($name=="")
                $errors[] = 'Name can not be empty';
            } else {
                //No we check for invalid characters
                if (!ctype_alpha($name)) {
                    //This would mean that the name  is  NOT valid
                    $errors[] = "Name must only be letters";
                }
            }

            //And now surname
            if (empty($surname)) {//This is the same as if($name=="")
                $errors[] = 'Surname can not be empty';
            } else {
                //No we check for invalid characters
                if (!ctype_alpha($surname)) {
                    //This would mean that the name  is  NOT valid
                    $errors[] = "Surname must only be letters";
                }
            }

            //Group Number validation
            if ($groupNum == '-Select Group-') {
                $errors[] = "You need to select a valid group number";
            }

            //Gender
            if (!isset($_POST['availability'])) {
                $errors[] = "You need to select your gender";
            }

            //Passwords

            if (empty($pass) || empty($confPass)) {
                $errors[] = "Please make sure you fill in the password, and confirm it";
            } else {
                //So now that we have both the password and confirm strings, we need to check if they match
                if ($pass != $confPass) {
                    $errors[] = "Your passwords do not match";
                }
            }


            /*
             * STEP 4: Lets communicate with the user
             * 
             */


            //If there are no errors, the errors array will not have any members
            //SO to check for errors we will see many members are in the array

            if (count($errors) != 0) {
                echo "<section id='errors_container'>";
                echo "<span id=\"errors_heading\">CORRECT THESE ERRORS:</span><br /><br />";
                //If the count of the array is not 0 then it means there is an error/ errors
                //In this case we print out evrything that is in the array!!
                foreach ($errors as $key => $value) {

                    echo "<span class='errors'>$value</span> <br />";
                }
                echo "</section>";
            } else {
                //If we are here, it means that we do not have errors, so we can welcome the user
                echo "<section id='greeting_container'>";
                echo "<span id=\"greeting_heading\">SUCCESS!!!!:</span><br /><br />";
                echo "Welcome $name $surname. You are in Group $groupNum";
                echo "</section>";
            }
        }
        ?>
    </body>
</html>
