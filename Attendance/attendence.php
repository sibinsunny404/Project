<?php
require_once 'sessions.php';
require_once 'database/connection.php';
require_once 'database/data_retrive.php';
$date = date("Y/m/d");
$query = "SELECT * FROM students";
$result = mysqli_query($connect, $query);
//Insert Query Starts From Here
// require_once 'connection.php';
// require_once 'data_retrive.php';
if (isset($_POST['submit'])) {
    foreach ($_POST['attend'] as $ids => $attend) {
        $usn = $_POST["usn"][$ids];
        $sub = $_POST["sub"];
        $sem = $_POST["sem"];
        mysqli_query($connect, "insert into attendence (usn,attend,subject,sem,date) values ('$usn','$attend','$sub','$sem','$date')");
        header("location:admin_dash.php");
    }
    // echo $sub;

    // $sem=$_POST["sem"];

}
mysqli_close($connect);
//Insert Query Ends here
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Attandance</title>
    <link rel="stylesheet" href="css/style.css" />
    <script>
        function done() {
            alert("Attendaance Successfully Taked..");
        }
    </script>
    <style> 
       body {
      background-color: #FFB9AA;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='0' x2='0' y1='0' y2='100%25' gradientTransform='rotate(195,768,361)'%3E%3Cstop offset='0' stop-color='%23FFB9AA'/%3E%3Cstop offset='1' stop-color='%2311FFFC'/%3E%3C/linearGradient%3E%3Cpattern patternUnits='userSpaceOnUse' id='b' width='300' height='250' x='0' y='0' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='0.08'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect x='0' y='0' fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect x='0' y='0' fill='url(%23b)' width='100%25' height='100%25'/%3E%3C/svg%3E");
      background-attachment: fixed;
      background-size: cover;
    }
    .container #p:checked ~ .check {
    background-color: rgb(21, 255, 0);
  }
  .container #a:checked ~ .check {
    background-color: red;
  }
    </style>
</head>

<body>

    <?php
    require_once 'loader.html';
    ?>
    <center>
        <!-- form method -->
        <form method="POST">
            <h1 style="line-height:normal;">Student Attendance</h1>
            <h3>Date:<?php echo date("d/m/y"); ?></h3><br>
            <h3>Time:<?php
                        date_default_timezone_set("Asia/Calcutta");
                        echo date("h:i:a"); ?></h3>
            <!-- select Starts from here -->
            <h2> <label for="dub" style="line-height:normal;">Choose Sub</label></h2><br>
            <select name="sub" style="border-radius: 15px;height: 35px;width: 193px; background:transparent;font-weight:900;border: 2px solid blue;text-align:center">
                <?php
                while ($subdata = mysqli_fetch_array($subresult)) {
                    $subj = $subdata['sub_name'];
                    $sem = $subdata['sem'];
                ?>
                    <option style="border-radius: 15px;height: 35px;width: 193px; background:transparent;font-weight:900;border: 2px solid blue;text-align:center" value="<?php echo $subj; ?>" name="<?php echo $subj; ?>"><?php echo $subj; ?></option>
                <?php } ?>
            </select>
            <!-- Select Tag ends Here -->
            <input type="hidden" name="sem" value="<?php echo $sem; ?>">
            <h2>Sem:<?php echo $sem; ?></h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>SN.no</th>
                            <th>USN</th>
                            <th>Username</th>
                            <th>Attended</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $sn = 1;

                            while ($data = mysqli_fetch_assoc($result)) {
                                $att = 0;
                        ?>
                                <tr>
                                    <td><?php echo $sn ?></td>
                                    <td style="text-transform:uppercase;"><?php echo $data['usn']; ?>
                                        <input type="hidden" value="<?php echo $data['usn']; ?>" name="usn[<?php echo $data['usn']; ?>]">
                                    </td>

                                    <td>
                                        <?php echo $data['name']; ?>

                                    </td>
                                    <td>
                                        <link rel="stylesheet" href="css/radiobutton.css">
                                        <label class="container">P
                                            <input type="radio" id="p" name="attend[<?php echo $data['usn']; ?>]" value="present" checked>
                                            <span class="check"></span>
                                            <label class="container">A
                                                <input type="radio" id="a" name="attend[<?php echo $data['usn']; ?>]" value="absent">
                                                <span class="check"></span>
                                            </label>
                                        </label>
                                    </td>
                                </tr>
                            <?php
                                $sn++;
                                $att++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="3">No data found</td>
                            </tr>
                        <?php }

                        ?>
                    </tbody>
                </table>
            </div>
            <br>

            <!-- Submit Starts From Here -->
            <link rel="stylesheet" href="css/submitbtt.css">
            <div class="container">
                <button class="button button-1" name="submit" onclick="done()">Submit</button>
                <!-- <h3>Total Absent:</h3>
                    <h3 id="abse"></h3>
                    <h3>Total present: </h3>
                </div> -->
                <!-- Submit Button Ends Here -->
            </div>

        </form>




    </center>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</body>

</html>