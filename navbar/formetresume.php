<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("location: ../index.php");
    exit;
}
include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $searchteacher = $_POST["searchteacher"];
    $_SESSION['searchteacher'] = $searchteacher;

    header("location: searchteacher.php");
}




$tid = $_SESSION['student_id'];
$sq = "SELECT * FROM `student` WHERE id='$tid'";
$result = mysqli_query($conn, $sq);
$data = $result->fetch_assoc();
if ($result) {
    $dob = $data['dob'];
    $phone = $data['number'];
    $image = $data['image'];
    $email = $data['email'];
    $cgpa = $data['cgpa'];
    $website = $data['website'];
    $github = $data['github'];
    $linkedin = $data['linkedin'];
    $intro = $data['intro'];
    $about = $data['about'];
    $address = $data['address'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title><?php echo $_SESSION['student_name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nevbar.css">
    <link rel="stylesheet" href="cv.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .container {
            text-align: center;



        }

        #btn {
            font-size: 25px;
        }
    </style>
    <style>
        .oval {
            height: 50px;
            width: 150px;
            /* background-color: #f98113; */
            border: solid 4px #f98113;
            border-radius: 50%;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <form action="" method="post" class="searchform order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search" name="searchteacher">
                    <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                </div>
            </form>
            <div class="collapse navbar-collapse" id="ftco-nav">

                <ul class="navbar-nav mr-auto">

                    <a href="studentprofile.php"><img class="rounded-circle me-lg-2" src="uploads/<?= $image ?>" alt="<?php echo $_SESSION['student_name'] ?>" style="width: 80px; height: 80px;"></a>
                    <br>
                    <li class="nav-item"><a href="studentprofile.php" class="nav-link"><?php echo $_SESSION['student_name']; ?></a></li>
                    <li class="nav-item "><a href="studenthome.php" class="nav-link">Home</a></li>


                    <li class="nav-item"><a href="counsilling.php" class="nav-link">Counselling</a></li>
                    <li class="nav-item"><a href="Coursemet.php" class="nav-link">Participants</a></li>
                    <li class="nav-item"><a href="studentlogout.php" class="nav-link">Logout</a></li>
                    
                    <li class="nav-item">   
                    <a href="print.php" class="nav-link">
                        print
                    </a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <br>




    <div class="row" style=" border-bottom: 2px solid black;">
        <div class="col-6 col-md-4" style="padding-left:50px;">
            <h2><?php echo $_SESSION['student_name']; ?></h2>
            <h5 style="color:cadetblue"> <?php echo $intro ?></h5>
            <p><?php echo $about ?></p>

        </div>
        <div class="col-6 col-md-4" style=" text-align:center;">
            <img src="uploads/<?= $image ?>" alt="<?php echo $_SESSION['student_name']; ?>" class="rounded-circle " width="150" style="border: 5px solid #03c2fc;">


        </div>
        <div class="col-6 col-md-4" style="padding-right:50px; text-align:right; ">
            <p style="color:black"> <a style="color:black" href="mailto:<?php echo $email ?>"> <?php echo $email ?> <i class="fa fa-envelope"></i> </a></p>
            <p style="text-align:right;"> <a style="color:black" href="tel:<?php echo $phone ?>"> <?php echo $phone ?> <i class="fa fa-phone"></i></p>
            <p style="text-align:right;"> <a style="color:black" href="https://www.google.com/maps/place/<?php echo $address ?>"> <?php echo $address ?> <i class="fa fa-address-book"></i></p>
            <p style="text-align:right;"> <a style="color:black" href="<?php echo $github ?>"> Github <i class="fa fa-github"></i></a></p>
            <p style="text-align:right;"> <a style="color:black" href="<?php echo $linkedin ?>"> Linkedin <i class="fa fa-linkedin"></i></a></p>

            <p style="text-align:right;"> <a style="color:black" href="<?php echo $website ?>"> Website <i class="fa fa-external-link"></i></a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-5 col-lg-6" style="padding-left:50px; ">

            <h1>Education</h1>
            
            <?php
            $w = $_SESSION['student_id'];

            $saw = "Select * from education where sid='$w'";
            $resultaw = mysqli_query($conn, $saw);
            while ($roww = mysqli_fetch_array($resultaw)) {
                $idw = $roww['id'];
                $name = $roww['name'];
                $hide = $roww['hide'];
                if ($hide == 0) {
                    echo"<div class='box'>";
                    echo "<h2>$name</h2>";
                    //echo"<br>";
                    echo $roww['subject'] . "<br>";
                    echo $roww['start'] . "-";
                    if ($roww['end'] == "") {
                        echo "Present";
                    } else {
                        echo $roww['end'];
                    }
                    echo "<div class='box-content'><h3> Hide This </h3><h3 class='title'><a href='hideeducation.php?id=$idw'><li class='fa fa-eye-slash'></li></a></h3> </div> ";
                echo"</div>";
                }
                
                   }
                  
   
                   ?>
            
            <h1>Projects</h1>
            
            <?php
            $w = $_SESSION['student_id'];

            $saw = "Select * from project where sid='$w'";
            $resultaw = mysqli_query($conn, $saw);
            while ($roww = mysqli_fetch_array($resultaw)) {
                $idw = $roww['project_id'];
                $name = $roww['project_name'];
                $link = $roww['project_link'];
                $hide = $roww['hide'];
                if ($hide == 0) {
                    echo"<div class='box'>";

                    echo "<h2>$name</h2>";
                    //echo"<br>";
                    echo $roww['project_dis'] . "<br>";
                    echo " <a href='$link'>Show Project </a>";

                    echo "<br> <b>Associate : </b>";
                   
                    $saz = "SELECT * FROM `project_partner` WHERE project_id='$idw'";
                    $resultaz = mysqli_query($conn, $saz);
                    while ($rows = mysqli_fetch_array($resultaz)) {
                        $partner = $rows['partnerID'];
                        $pname = $rows['partnerName'];
                        echo " <a href='studentshowstudentprofile.php?id=$partner'>$pname</a>" . " ";
                    }


                    echo "<br> <b>Certified By : </b>";
                    
                    $status = "";
                    $saza = "SELECT * FROM `project_faculty` WHERE project_id='$idw'";
                    $resultaza = mysqli_query($conn, $saza);
                    while ($rowsa = mysqli_fetch_array($resultaza)) {
                        if ($rowsa['status'] == "Verified") {
                            echo $rowsa['name'];
                            echo " ";

                            echo "<i style='color:green' class='fa fa-check-circle' aria-hidden='true'></i>";
                        } else {
                        }
                    }
                    echo "<div class='box-content'>
                <h3> Hide This </h3>
               
   
                       <h3 class='title'><a href='hideproject.php?id=$idw'><li class='fa fa-eye-slash'></li></a></h3>
                       
   
   
                   </div> </div>";
                }
                
                   }
   
   
                   ?>
            


        </div>
        <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
            <h1>Experience</h1>
            
            <?php
            $w = $_SESSION['student_id'];

            $saw = "Select * from experience where sid='$w'";
            $resultaw = mysqli_query($conn, $saw);
            while ($roww = mysqli_fetch_array($resultaw)) {
                $idw = $roww['id'];
                $cname = $roww['companyname'];
                $start = $roww['start'];
                $end = $roww['end'];
                $hide = $roww['hide'];
                if ($hide == 0) {
                    echo"<div class='box'>";
                    echo " <b style='text-align:center;'>$cname ($start - $end)</b> <br>";
                    echo $roww['title'];
                    echo "<div class='box-content'>
                <h3> Hide This </h3>
                
   
                       <h3 class='title'><a href='hideexprience.php?id=$idw'><li class='fa fa-eye-slash'></li></a></h3>
                       
   
   
                   </div> </div>";
                }
                
                   }
   
   
                   ?>
            

           

































            <h1> Ceertificate</h1>

            
                <?php
                $w = $_SESSION['student_id'];

                $saw = "Select * from achievements where sid='$w'";
                $resultaw = mysqli_query($conn, $saw);
                while ($roww = mysqli_fetch_array($resultaw)) {
                    $idw = $roww['id'];
                    $name = $roww['name'];
                    $dis = $roww['dis'];
                    $link = $roww['link'];
                    $hide = $roww['hide'];
                    if ($hide == 0) {
                        echo"<div class='box'>";
                        echo "<b style='text-align:center;'>$name </b> <br>";
                        echo $dis;
                        echo "<br> <a href='$link'>Show credential</a>";
                        echo "<div class='box-content'>
                        <h3> Hide This </h3>
                        <br>
           
                               <h3 class='title'><a href='hidecertificated.php?id=$idw'><li class='fa fa-eye-slash'></li></a></h3>
                               
           
           
                           </div>";
                    }


                   
                }


                ?>


            </div>
        </div>
    </div>


</body>

</html>