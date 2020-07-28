<html>
<head>
    <p>Form demo<p>
</head>
<body>
    

<p><span class = "error">* required field.</span></p>
      
      <form method = "POST" action = "user_info.php">
      <?php 
        $nameErr = $emailErr = $genderErr = $hobbieErr = "";
        $name = $email = $gender = $hobbie = $place = $subject = "";

        function text_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
     
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST['name'])){
                $nameErr = "Name is required";
            }
            else{
                $name = text_input($_POST["name"]);
            }

            if(empty($_POST["email"])){
                $emailErr = "Email is required";
            }
            else{
                $email = text_input($_POST["email"]);
                
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailErr = "Inavalid email";
                }
            }  
            
            if(empty($_POST["gender"])){
                $genderErr = "gender is require";
            }
            else{
                $gender = text_input($_POST["gender"]);
            }

            if(empty($_POST["hobbie"])){
                $hobbie = "You must choose at least 1";
            }
            else{
                $hobbie = text_input($_POST["hobbie"]);
            }

            if(empty($_POST["place"])){
                $place = "";
            }
            else{
                $place = text_input($_POST["place"]);
            }
            
            if(empty($_POST["program_language"])){
                $programLan = "You must choose at least 1";
            }
            else{
                $programLan = text_input($_POST["programLan"]);
            }

            $subjects = $_POST['subject'];

            var_dump($subjects);
            var_dump(in_array("C#", $subjects));
            $email = $_POST['email'];
           
            
        }
    ?>
         <table>
            <tr>
               <td>Name:</td>
               <td><input type = "text" name = "name">
                  <span class = "error">* <?php echo $nameErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>E-mail: </td>
               <td><input type = "text" name = "email" value="<?php echo $email; ?>">
                  <span class = "error">* <?php echo $emailErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Place:</td>
               <td> <textarea name="place"></textarea></td>
            </tr>
            
            <tr>
               <td>Gender:</td>
               <td>
                  <input type="radio" name="gender" value="female">Female
                  <input type="radio" nam="gender" value="male">Male
                  <span class="error">* <?php echo $genderErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Programming language:</td>
               <td>
                  <select name="subject[]" class="subject" id="subject" size="6" multiple>
                     <option value = "Android" <?php echo ( in_array("Android", $subjects) ? "selected" : "");?>>Android</option>
                     <option value = "Java">Java</option>
                     <option value = "C#">C#</option>
                     <option value = "SQL">SQL</option>
                     <option value = "Swift">Swift</option>
                     <option value = "PHP">PHP</option>
                  </select>
               </td>
            </tr>

            <tr>
                <td>Hobbie:</td>
                <td>
                    <select name="hobbie[]" id="hobbie">
                        <option value="Sport">Sport</option>
                        <option value="Game">Game</option>
                        <option value="Movie">Movie</option>
                        <option value="Music">Music</option>
                    </select>
                </td>
            </tr>
            
            <tr>    
               <td>Agree</td>
               <td><input type = "checkbox" name = "checked" value = "1"></td>
               <?php if(!isset($_POST['checked'])){ ?>
               <span class = "error">* <?php echo "You must agree to terms";?></span>
               <?php } ?> 
            </tr>
            
            <tr>
               <td>
                  <input type = "submit" name = "submit" value = "Submit"> 
               </td>
            </tr>
            
         </table>
      </form>  
</body>
</html>