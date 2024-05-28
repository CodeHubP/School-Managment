<?php

use LDAP\Result;

include("connection.php");


//accept form data ........................
if(isset($_POST['stuRegisBtn'])){
$StuFullname = $_POST['StuName'];
$StuDOB = $_POST['StuDOB'];
$Stuclass = $_POST['StuClass'];
$StuGuardianName = $_POST['StuGuardianName'];
$StuGender = $_POST['StuGender'];
$StuGuardianTel = $_POST['StuGuardianTel'];
$stuImage =  $_FILES['StuImage'];



//get images
$imageName = $stuImage['name'];
$image_tmp = $stuImage['tmp_name'];


$query = "INSERT INTO Students(Fullname, DOB, Class, Gender, StuImage, GuardianName, GuardianTel) values('$StuFullname', '$StuDOB', '$Stuclass','$StuGender','$imageName', '$StuGuardianName', '$StuGuardianTel')";

}
$result = mysqli_query($connection, $query);
//sending form data to database//////////////////////////////////////
if(!$result){
  echo "<script> alert('An error occured please try again') </script>";
}
else{
  echo "<script> alert('Registration Successful') </script>";
}


















?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>School Mg| Add Student</title>
  </head>
  <body>
    <main class="main-container">
      <header>
        <div class="logoName">
            <img src="images/logos/icons8_star_logo_480px.png" alt="">
            
        </div>
        <div>
            <h2>ABC SCHOOL COMPLEX</h2>
        </div>
        <div class="homeBtn">
            <a href="main.html">
                <img src="images/logos/icons8_home_480px.png" alt="" style="margin-right: 10px;" >
            </a>


        </div>
    </header>

      <section class="content">
        <h1>ADD STUDENT</h1>

        <form method="post" action="AddStudent.php" enctype="multipart/form-data" >
          
            <input type="text" required placeholder="Fullname" name="StuName" />
          
         
            <select name="StuGender" id="" required>
              <option value="none">Select gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          
            <input type="date" class="the-date" style="color: rgba(255, 255, 255, 0.774);" required name="StuDOB"/>
            <input type="text" placeholder="Guardian name" required name="StuGuardianName" />
            <input type="number" placeholder="Guardian tel" required name="StuGuardianTel"/>
            <input type="text" placeholder="class" required  name="StuClass"/>
            <input type="file" accept="image/*" required name="StuImage"  />
    
          
            <button type="submit" name="stuRegisBtn">Add</button>
          
        </form>
      </section>
    </main>
  </body>
</html>
