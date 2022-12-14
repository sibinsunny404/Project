<?php
require_once 'student_session.php';
require_once 'database/connection.php';
require_once 'database/studentview.php';


$usn = $_SESSION['student'];

$sview = "select * from students where usn='$usn'";
$sviewres = mysqli_query($connect, $sview);

$subsel = "SELECT DISTINCT subject FROM `attendence` WHERE usn='$usn'";
$subres = mysqli_query($connect, $subsel);



?>
<!doctype html>
<html lang="en">

<head>
  <title><?php echo $usn ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <style>
    body {
      background-color: #330000;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Cdefs%3E%3CradialGradient id='a' cx='396' cy='281' r='514' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23D18'/%3E%3Cstop offset='1' stop-color='%23330000'/%3E%3C/radialGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='400' y1='148' x2='400' y2='333'%3E%3Cstop offset='0' stop-color='%23FA3' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%23FA3' stop-opacity='0.5'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect fill='url(%23a)' width='800' height='400'/%3E%3Cg fill-opacity='0.5'%3E%3Ccircle fill='url(%23b)' cx='267.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='532.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='400' cy='30' r='300'/%3E%3C/g%3E%3C/svg%3E");
background-attachment: fixed;
background-size: cover;}

    .card-title,
    .card-text {
      text-align: left;
    }

    h2 {
      text-transform: uppercase;
      font-weight: 200;
      text-align: center;
      color: black;
      background-color: aliceblue;
      display: block;
      border-radius: 10px;
      text-decoration-style: wavy;

    }
    #new{
      background-color: #E2E2E2;
    }

    #card {
      background: #C9D6FF;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #E2E2E2, #C9D6FF);
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
    #card:hover{
      box-shadow:0 8px 16px 0 rgba(0,0,0,2);
    }

    progress {
      width: 100%;
      height: 30px;
    }

    h3 {
      text-transform: uppercase;
    }

    .msg {
      background-color: beige;
      display: inline-block;
    }
  </style>

</head>
 
<body>
<!-- <div style="text-align:center;"><a style="color:red;font-size:large;font-weight:400;" href="logout.php?logout"><img style="height:30px;width:30px;" src="assets/images/users/logout.png" alt="">LogOut</a></div> -->
  <?php
  require_once 'loader.html';
  while ($subdata = mysqli_fetch_array($sviewres)) {
    $name = $subdata['name'];
    $cls = $subdata['class'];
    $sem = $subdata['sem'];
    $pic = $subdata['image'];
    $dob = $subdata['dob'];
    $fdate = date('d.m.Y', strtotime($dob));
    $mbno = $subdata['mbno'];
    $district = $subdata['district'];
    $state = $subdata['state'];
    $addres = $subdata['address'];
  }

  ?>
  <center>
    <!-- personal card starts here -->
    <div style="padding-top: 50px;">
      <div class="container">
        <h3><kbd> Personal Detials</kbd></h3>
        <!-- <div class="shadow-lg p-3 mb-5  rounded " style="max-width:50%;"> -->
        <div class="shadow-lg p-3 mb-5  rounded" id="new" class="card mb-3" style="border:1px;border-radius:10px; max-width: 540px; padding-top: 30px;  border:solid black 1px; border-radius:45px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img style="padding: 20px; text-align:center; border:solid white 1px;height:180px;width:200px;border-radius:45px;" class="img-fluid rounded-start" src="student_image/<?php echo $pic; ?>">
            </div>
            <div class="col-md-8">
              <div class="card-body" style="padding-left: 20px;">
              <div style="text-align:right;"><a style="color:red;font-size:large;font-weight:400;" href="logout.php?logout"><img style="height:30px;width:30px;" src="assets/images/users/logout.png" alt="">LogOut</a></div>
              <div class="card-body" style="padding-left: 20px;">
                <h3 class="card-title"><?php echo $name ?></h3>
                <h5 style="text-transform:uppercase;" class="card-text"><code>USN:</code><?php echo $usn ?></h5>
                <h5 style="text-transform:uppercase;" class="card-text"><code>Class:</code><?php echo $cls ?></h5>
                <h5 class="card-text"><code>Sem:</code><?php echo $sem ?></h5>
                <h5 class="card-text"><code>DOB:</code><?php echo $fdate; ?></h5>
                <h5 class="card-text"><code>PhNo:</code><?php echo $mbno; ?></h5>
                <h5 style="text-transform:uppercase;" class="card-text"><code>District:</code><?php echo $district; ?></h5>
                <h5 style="text-transform:capitalize;" class="card-text"><code>State:</code><?php echo $state; ?></h5>
                <h5 style="text-transform:capitalize;" class="card-text"><code>Address:</code><?php echo $addres; ?></h5>
             </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
    </div>
    <!-- personal card ends here -->
    <h2>Attendance Status</h2>
    <div style="padding-bottom: 20px;width:55%;">
      <div class="card">
        <div class="card-body" id="card">
          <?php
          if (mysqli_num_rows($subres) > 0) {
            while ($sbjres = mysqli_fetch_array($subres)) {
              $subject = $sbjres['subject'];
              $atcal = "SELECT count(*) FROM `attendence` WHERE subject='$subject' AND  usn='$usn'";
              $atres = mysqli_query($connect, $atcal);
              while ($attres = mysqli_fetch_array($atres)) {
                $subcount = $attres['count(*)'];
                $atcal = "SELECT count(*) FROM `attendence` WHERE subject='$subject' AND  usn='$usn' and attend='present'";
                $atres = mysqli_query($connect, $atcal);
                while ($attres = mysqli_fetch_array($atres)) {
                  $present = $attres['count(*)'];
                  $perdisplay = ($present / $subcount) * 100;
          ?>
                  <fieldset style="border: solid black 1px;">
                    <h5 class="card-title"><?php echo $subject ?></h5>
                    <?php if ($perdisplay < 75) {
                      echo '<h5 style="color:red;padding: -10px;" class="msg">Attendance Shortage????</h5>';
                    } elseif ($perdisplay < 100) {
                      echo '<h5 style="color:green;"class="msg">Attendance Are Clear????</h5>';
                    } else {
                      echo '<h5 style="color:green;"class="msg">Full Attendance????</h5>';
                    } ?>
                    <p class="card-text"><?php


                                          if ($perdisplay == 0) {
                                            echo '<p style="color:red;">Not Attended For A Class</p>';
                                          } else {
                                            echo round($perdisplay, 2) . '%';
                                          }

                                          ?>
                      <progress value="<?php echo $present ?>" max="<?php echo $subcount ?>"></progress>
                  </fieldset>
              <?php
                }
              }
              ?>
              </p>


          <?php
            }
          } else {
            echo "<h2 style='color:red; background-color:black;padding:20px;'>None Of The Class Attended By Student </h2>";
          }
          ?>

        </div>
      </div>
    </div>
    </div>
  </center>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>