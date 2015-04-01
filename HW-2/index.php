<!DOCTYPE HTML> 
<html>
<head>
    <style type ="text/css">
        body{
            //text-align: center;
            //margin-right: 300px;
        }
        .error{
            color:red;
            float: left;
            width:250px;
            text-align: left;
        }
 
        
        .labwrap{
            display:inline-block;
            width: 400px;
            text-align:right;
            float:left;
            margin-right: 5px;
        }
        </style>
</head>
<body> 

<?php
// define variables and set to empty values
 setupSql();
$firstname = $lastname = $nickname = 
        $password = $valpassword = $email = 
        $gender = $website =$newsletter=$updates ="";
$emailerr = $passwordErr = $firstnameErr = $lastnameErr
        =$genderErr= $valErr = $nicknameErr="";
$servername = "localhost";
    $username = "root";
    $sqlpassword = "Mchuckb23";
    $db = "cpts483";
    $sqlcheck =7;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["firstname"])){
        $firstnameErr = " * Please enter a valid first name";
        $sqlcheck--;
    }
   else{
       $firstname = test_input($_POST["firstname"]);
       if(!preg_match("/^[a-zA-Z ]*$/",$firstname)){
            $firstnameErr = " * Please enter a valid first name";
            $sqlcheck--;
        }
   }
   if(empty($_POST["lastname"])){
      $lastnameErr = " * Please enter a valid last name"; 
      $sqlcheck--;
   }
   else{
      $lastname = test_input($_POST["lastname"]);
      if(!preg_match("/^[a-zA-Z ]*$/",$lastname)){
       $lastnameErr = " * Please enter a valid last name";
       $sqlcheck--;
     }
   }
   if(empty($_POST["email"])){
      $emailerr = " * Please enter a valid email";
      $sqlcheck--;
   }
   else{
      $email = test_input($_POST["email"]);
      if(!preg_match("/^.+@[^\.].*\.[a-z]{2,}$/",$email)){
            $emailerr = " * Please enter a valid email address";
            $sqlcheck--;
           }
   }
   
   if(empty($_POST["nickname"])){
       $nicknameErr = "  * Please select a gender";
       $sqlcheck--;
   }
   else{
       $nickname = test_input($_POST["nickname"]);
   }
   if(empty($_POST["gender"])){
       $genderErr = "  * Please select a gender";
       $sqlcheck--;
   }
   else{
       $gender = test_input($_POST["gender"]);
   }
   if(empty($_POST["password"])){
      $passwordErr = " * Please enter a password";
      $sqlcheck--;
   }
   else{
      $password = test_input($_POST["password"]); 
   }
   $valpassword = test_input($_POST["valpassword"]);
   if(strcmp($password, $valpassword)!=0){
       $valErr = " * Passwords must match";
       $sqlcheck--;
   }
   $conn = new mysqli($servername, $username, $sqlpassword,$db);
   if($sqlcheck == 7){
        $sql = "INSERT INTO accounts (email, first_name, last_name,"
             . " nickname, password, gender) VALUES ('".$email."', '".$firstname."', '"
             .$lastname."', '".$nickname."', '".$password."', '".$gender."');";
        $conn->query($sql);
   //echo $sql;
   $id = $conn->insert_id;
    if(!empty($_POST["updates"])){
        $updates = test_input($_POST["updates"]);
        $sql = "INSERT INTO account_preferences (account_id, preference_id) "
        . "VALUES (".$id.", 2);";
        $conn->query($sql);
    }
   if(!empty($_POST["newsletter"])){
        $newsletter = test_input($_POST["newsletter"]);
        $sql = "INSERT INTO account_preferences (account_id, preference_id) "
        . "VALUES (".$id.", 1);";
        $conn->query($sql);
    }
   }
   
   
   
 




   }


        

function setupSql(){
    $servername = "localhost";
    $username = "root";
    $password = "Mchuckb23";
    $location = "cpts483.sql";
    $db = "cpts483";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);

    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    } 
    //echo "Connected successfully";
    $sql = file_get_contents($location);
    $conn->multi_query($sql);
    
    $conn->close();
    

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   
    
    <div class="labwrap">
        <h2>Create Your Account</h2>
        </div>
     <br><br>
     <br><br>
    <div class="labwrap">
    First Name: <input type="text" name="firstname" maxlength="50" value="<?php echo $firstname;?>">
    </div>
     <span class="error"> <?php echo $firstnameErr;?></span>
   <br><br>
    <div class="labwrap">
   Last Name: <input type="text" name="lastname" maxlength = "50" value="<?php echo $lastname;?>">
    </div>
   <span class="error"> <?php echo $lastnameErr;?></span>
   <br><br>
   <div class="labwrap">
   E-mail: <input type="text" name="email" maxlength = "50" value="<?php echo $email;?>">
   </div>
   <span class="error"> <?php echo $emailerr;?></span>
   <br><br>
   <div class="labwrap">
   Nickname: <input type="text" name="nickname" maxlength = "50" value="<?php echo $nickname;?>">
   </div>
   <span class="error"> <?php echo $nicknameErr;?></span>
   <br><br>
   <div class="labwrap">
   Password: <input type="password" name="password" maxlength = "50">
   </div>
   <span class="error"> <?php echo $passwordErr;?></span>
   <br><br>
   <div class="labwrap">
   Retype Password: <input type="password" name="valpassword" maxlength = "50">
   </div>
   <span class="error"> <?php echo $valErr;?></span>
   <br><br>
   <div class="labwrap">
   Gender:
   <input type="radio" name="gender" value="female">Female
   <input type="radio" name="gender" value="male">Male
   <input type="radio" name="gender" value="other">Other
   </div>
   <span class="error"> <?php echo $genderErr;?></span>
   <br><br>
   <div class="labwrap">
   Preferences:
   <input type="checkbox" name="newsletter" value="yes">Newsletter
   <input type="checkbox" name="updates" value="yes">Product Updates
   </div>
   <br><br>
   <input type="submit" name="submit" value="Submit" style="float: left;margin-left:250px">
   
</form>




</body>