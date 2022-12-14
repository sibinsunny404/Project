<!-- Add student-->
<?php
require_once 'loader.html';
require_once 'sessions.php';
require_once 'database/connection.php';
if (isset($_POST['add'])) {
  $name = $_POST["uname"];
  $usn = $_POST["usn"];
  $cls = $_POST["class"];
  $sem = $_POST["sem"];
  $dstr = $_POST["dst"];
  $dob = $_POST["dob"];
  $state = $_POST["state"];
  $mbno = $_POST["mbno"];
  $add = $_POST["add"];
  $password = md5($usn);
  move_uploaded_file($_FILES["image"]["tmp_name"], "student_image/" . $_FILES["image"]["name"]);
  $file = $_FILES["image"]["name"];
  mysqli_query($connect, "insert into students (usn,name,class,sem,dob,mbno,district,state,address,password,image) 
        values ('$usn','$name','$cls','$sem','$dob','$mbno','$dstr','$state','$add','$password','$file')");
  header("location:addstudent.php?sucess=Student Detials Added Succeessfully");

  if (@$_GET['sucess'] == true) {
    require_once 'toast.php';
  }
}
//  $name=$_POST['uname'];
//  echo $name;



?>
<!doctype html>
<html lang="en">

<head>
  <title>Add students</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!-- /<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
  <meta name="viewport" content="width=1024">
  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <style>
    body {
      background-color: #8EC5FC;
      background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);

    }
    [type="file"] {
/* Style the color of the message that says 'No file chosen' */
  color:black;
}
[type="file"]::-webkit-file-upload-button {
  background:aqua;
  border: 2px solid blanchedalmond;
  border-radius: 10px;
  color:black;
  cursor: pointer;
  font-size: 12px;
  outline: none;
  padding: 10px 25px;
  text-transform: uppercase;
  transition: all 1s ease;
}

[type="file"]::-webkit-file-upload-button:hover {
  background: #fff;
  border: 2px solid #535353;
  color: #000;
}

/* GENERAL STYLING OF PAGE ??? NOT APPLICABLE TO EXAMPLE */
body {
  padding: 20px;
}
  </style>

</head>

<body>


  <center>

    <form method="POST" enctype="multipart/form-data">
      <div class="container" style="padding-top: 125px;">
        <div class="card" style="width: 50rem; border-color:crimson;
   background: #BE93C5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #7BC6CC, #BE93C5);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #7BC6CC, #BE93C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
border: radius 10%;
">

          <div class="card-body">

            <h2 style="font-style:italic;">Enter The Student Detials</h2>

            <div class="row g-3">

              <div class="col-md-6">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="uname" required>
              </div>
              <div class="col-md-6">
                <label for="usn" class="form-label">USN</label>
                <input type="text" class="form-control" id="usn" name="usn" required>
                <span id="avl"></span>
              </div>
              <div class="col-md-4">
                <label for="class" class="form-label">CLASS</label>
                <select id="class" class="form-select" name="class" required>
                  <option value="mca">MCA</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="sem" class="form-label">SEM</label>
                <select id="sem" class="form-select" name="sem" required>
                  <option value="2">2</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="dob" class="form-label">DOB</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
              </div>
              <div class="col-md-4">
                <label for="dst" class="form-label">District</label>
                <select id="dst" class="form-select" name="dst" required>
                  <option value="dk">DK</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="state" class="form-label">State</label>
                <select id="state" class="form-select" name="state" required>
                  <option value="karnataka">Karnataka</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="mbno" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mbno" name="mbno" required>
              </div>
              <div class="col-6">
                <label for="add" class="form-label">Address</label>
                <input type="text" class="form-control" id="add" placeholder="Enter The full Address" name="add" required>
              </div>
              <div class="col-6">
                <label for="image" class="form-label">Student Image</label>
                <input type="file" name="image" id="image" value="" accept="image/x-png,image/gif,image/jpeg" required>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary" id="submit" name="submit" onclick="ad()">ADD</button>
              </div>
            </div>
          </div>

        </div>
      </div>

  </center>
  </form>




  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

<script src="jQuery/jquery-3.6.0.min.js"></script>
  
  <script>
    $(document).ready(function(){
     $("#usn").blur(function(){
       var susn=$(this).val();
       $.ajax({
         url:"verify.php",
         method:"POST",
         data:{usn:susn},
         dataType:"text",
         success:function(html){
           $('#avl').html(html);
         }
       })
     })
    })
   </script>

</html>