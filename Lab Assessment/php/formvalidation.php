<?php
$nameErr = $emailErr = $dayErr = $monthErr = $yearErr = "";
$genderErr = $degreeErr = $bloodErr = "";
 
$name = $email = $day = $month = $year = $gender = "";
$degrees = [];
$blood = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])) {
        $nameErr = "Name cannot be empty";
    } else {
        $name = $_POST["name"];
 
        if(!preg_match("/^[a-zA-Z][a-zA-Z.\- ]*$/", $name)) {
            $nameErr = "Must start with a letter & contain only letters, dot, dash";
        }
        else if(str_word_count($name) < 2) {
            $nameErr = "Must contain at least two words";
        }
    }
    if(empty($_POST["email"])) {
        $emailErr = "Email cannot be empty";
    } else {
        $email = $_POST["email"];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if(empty($_POST["day"])) {
        $dayErr = "Day required";
    } else {
        $day = $_POST["day"];
        if($day < 1 || $day > 31) {
            $dayErr = "Day must be 1–31";
        }
    }
 
    if(empty($_POST["month"])) {
        $monthErr = "Month required";
    } else {
        $month = $_POST["month"];
        if($month < 1 || $month > 12) {
            $monthErr = "Month must be 1–12";
        }
    }
 
    if(empty($_POST["year"])) {
        $yearErr = "Year required";
    } else {
        $year = $_POST["year"];
        if($year < 1953 || $year > 1998) {
            $yearErr = "Year must be 1953–1998";
        }
    }
    if(empty($_POST["gender"])) {
        $genderErr = "At least one must be selected";
    } else {
        $gender = $_POST["gender"];
    }
    if(empty($_POST["degree"])) {
        $degreeErr = "At least two must be selected";
    } else {
        $degrees = $_POST["degree"];
        if(count($degrees) < 2) {
            $degreeErr = "Select at least two options";
        }
    }
 
    if(empty($_POST["blood"])) {
        $bloodErr = "Must be selected";
    } else {
        $blood = $_POST["blood"];
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
<title>LAB 4.2 PHP Validation</title>
<style>
    body { font-family: Arial; margin: 30px; }
    .error { color: red; }
</style>
</head>
 
<body>
 
<h2>LAB-4.2 – PHP Form Validation</h2>
 
<form method="post">

<!-- 1. NAME -->
<fieldset>
<legend><b>1. NAME</b></legend>
<input type="text" name="name" value="<?php echo $name; ?>">
<span class="error"> * <?php echo $nameErr; ?></span>
<br><br>
<input type="submit" value="Submit">
</fieldset>
<br>

<!-- 2. EMAIL -->
<fieldset>
<legend><b>2. EMAIL</b></legend>
<input type="text" name="email" value="<?php echo $email; ?>">
<span class="error"> * <?php echo $emailErr; ?></span>
<br><br>
<input type="submit" value="Submit">
</fieldset>
<br>

<!-- 3. DATE OF BIRTH -->
<fieldset>
<legend><b>3. DATE OF BIRTH</b></legend>

Day:
<input type="number" name="day" style="width:60px" value="<?php echo $day; ?>">
<span class="error"><?php echo $dayErr; ?></span>

Month:
<input type="number" name="month" style="width:60px" value="<?php echo $month; ?>">
<span class="error"><?php echo $monthErr; ?></span>

Year:
<input type="number" name="year" style="width:80px" value="<?php echo $year; ?>">
<span class="error"><?php echo $yearErr; ?></span>

<br><br>
<input type="submit" value="Submit">
</fieldset>
<br>

<!-- 4. GENDER -->
<fieldset>
<legend><b>4. GENDER</b></legend>

<input type="radio" name="gender" value="Male"> Male  
<input type="radio" name="gender" value="Female"> Female  
<input type="radio" name="gender" value="Other"> Other  
<br>
<span class="error"><?php echo $genderErr; ?></span>

<br><br>
<input type="submit" value="Submit">
</fieldset>
<br>

<!-- 5. DEGREE -->
<fieldset>
<legend><b>5. DEGREE</b></legend>

<input type="checkbox" name="degree[]" value="SSC"> SSC  
<input type="checkbox" name="degree[]" value="HSC"> HSC  
<input type="checkbox" name="degree[]" value="BSc"> BSc  
<input type="checkbox" name="degree[]" value="MSc"> MSc  
<br>
<span class="error"><?php echo $degreeErr; ?></span>

<br><br>
<input type="submit" value="Submit">
</fieldset>
<br>

<!-- 6. BLOOD GROUP -->
<fieldset>
<legend><b>6. BLOOD GROUP</b></legend>

<select name="blood">
    <option value="">--Select--</option>
    <option>A+</option>
    <option>A-</option>
    <option>B+</option>
    <option>B-</option>
    <option>O+</option>
    <option>O-</option>
    <option>AB+</option>
    <option>AB-</option>
</select>
<br>
<span class="error"><?php echo $bloodErr; ?></span>

<br><br>
<input type="submit" value="Submit">
</fieldset>
<br>

</form>

 
</body>
</html>