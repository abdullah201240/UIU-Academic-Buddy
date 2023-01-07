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
    $_SESSION['photo'] = $data['image'];
    $intro=$data['intro'];
    $address = $data['address'];
    $about = $data['about'];
}



?>


<title><?php echo $_SESSION['student_name']; ?></title>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="uploads/<?= $_SESSION['photo'] ?>">
    <link rel="icon" type="image/png" href="uploads/<?= $_SESSION['photo'] ?>">

    <title>

        UIU Activity Tracker





    </title>



    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->



    <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />





</head>


<body class="g-sidenav-show  bg-gray-100">





    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="studentprofile.php" target="_blank">
                <img src="uploads/<?= $_SESSION['photo'] ?>" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white"><?php echo $_SESSION['student_name']; ?></span>
            </a>
        </div>


        <hr class="horizontal light mt-0 mb-2">

        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">









                <li class="nav-item">
                    <a class="nav-link text-white " href="studenthome.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>

                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="counsilling.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>

                        <span class="nav-link-text ms-1">COUNSELLING</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="Coursemet.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>

                        <span class="nav-link-text ms-1">PARTICIPATIONS</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="studentlogout.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>

                        <span class="nav-link-text ms-1">LOGOUT</span>
                    </a>
                </li>





















    </aside>

    <main class="main-content border-radius-lg ">
        <!-- Navbar -->

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">




                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>

                    </div>

                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>






                </div>
        </nav>

        <!-- End Navbar -->
































        <div class="container" style="text-align:left">
            <div class="main-body">

                <!-- Breadcrumb -->

                <!-- /Breadcrumb -->

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="uploads/<?= $image ?>" alt="<?php echo $_SESSION['student_name']; ?>" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4><?php echo $_SESSION['student_name']; ?></h4>
                                        <p class="text-secondary mb-1">Student ID: <?php echo $_SESSION['student_id'] ?></p>
                                        <p class="text-muted font-size-sm">Dath of Both: <?php echo  $dob ?></p>
                                        <p class="text-muted font-size-sm">Email: <?php echo  $email ?></p>
                                        <p class="text-muted font-size-sm">Phone Number: <?php echo $phone ?></p>
                                        <p class="text-muted font-size-sm">Address: <?php echo $address ?></p>
                                        <p class="text-muted font-size-sm">Cgpa: <?php echo  $cgpa ?></p>
                                        <p class="text-muted font-size-sm">Courses: <?php
                                                                                    $sid = $_SESSION['student_id'];

                                                                                    $s = "Select * from take_courses where sid='$sid'";
                                                                                    $result = mysqli_query($conn, $s);
                                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                                        echo $row['cname'];
                                                                                        echo "(" . $row['section'] . ")";
                                                                                        echo ",";
                                                                                    }
                                                                                    ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                        ?>
                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h4 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                        </svg><a href="<?php echo $website ?>">Website</a></h4>
                                    <span class="text-secondary"> </a></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h4 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg> <a href="<?php echo $github ?>">Github</a></h4>
                                    <span class="text-secondary"></span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h4 class="mb-0" style="color:black">
                                        <i class="fa fa-linkedin" aria-hidden="true" style="padding-right:20px"></i><a href="<?php echo $linkedin ?>"> LinkedIn</a>
                                    </h4>
                                    <span class="text-secondary">

                                    </span>
                                </li>
                                <li>
                                    <br>
                                    <div style="text-align: center;">
                                        <a href="studentinfoedit.php"><button type="button" class="btn btn-primary">Edit</button></a>
                                       <?php echo" <a href='cvfromapi.php?id=$tid'><button type='button' class='btn btn-success'>Formet Resume</button></a>" ?>
                                    </div>

                                </li>




                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">

                                    <h3><?php echo $_SESSION['student_name']; ?></h3>


                                    <div class="col-sm-9 text-secondary">
                                        <h4 style="color:cadetblue"> <?php echo $intro ?></h4>

                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-9 text-secondary">
                                        <h6><?php echo $about ?></h6>
                                    </div>
                                </div>
                                <hr>

                                <hr>




                            </div>
                        </div>
                        <h1 style="text-align: center"> Education <a href="addeducation.php"><i style="height:40px;width:40px" class="fa fa-plus"></i></a> </h1>
                        <div>
                            <?php
                            $sida = $_SESSION['student_id'];
                            $sa = "SELECT * FROM `education` WHERE sid='$sida'";
                            $resulta = mysqli_query($conn, $sa);
                            while ($row = mysqli_fetch_array($resulta)) {
                                $id = $row['id'];



                            ?>
                                <div class="card mb-3">


                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Institution Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['name']; ?>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Study Program</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['subject']; ?>
                                            </div>
                                        </div>
                                        <hr>

                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Date</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">

                                                <?php echo $row['start'];
                                                echo "-";
                                                if ($row['end'] == "") {
                                                    echo "Present";
                                                } else {
                                                    echo $row['end'];
                                                }


                                                ?>

                                            </div>

                                        </div>



                                    </div>
                                    <div style="text-align:center">

                                        <?php echo "<a href='deleteeducation.php?id=$id'><button type='button' class='btn btn-danger'>Delete</button></a>"; ?>

                                    </div>
                                    <p>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                                <?php } ?>


                                <br>

                                <h1 style="text-align: center"> All Projects <a href="addproject.php"><i style="height:40px;width:40px" class="fa fa-plus"></i></a> </h1>


                                <div>
                                    <?php
                                    $sida = $_SESSION['student_id'];

                                    $sa = "Select * from project where sid='$sida'";
                                    $resulta = mysqli_query($conn, $sa);
                                    while ($row = mysqli_fetch_array($resulta)) {
                                        $id = $row['project_id'];



                                    ?>
                                        <div class="card mb-3">


                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Project Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php echo $row['project_name']; ?>

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Project Discription</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php echo $row['project_dis']; ?>
                                                    </div>
                                                </div>
                                                <hr>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Project Link</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">

                                                        <a href="<?php echo $row['project_link']; ?>"> <?php echo $row['project_link']; ?></a>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Project Partner</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php
                                                        $total = "";
                                                        $saz = "SELECT * FROM `project_partner` WHERE project_id='$id'";
                                                        $resultaz = mysqli_query($conn, $saz);
                                                        while ($rows = mysqli_fetch_array($resultaz)) {

                                                            $total .= $rows['partnerName'] . ",";
                                                        }
                                                        ?>


                                                        <?php echo $total ?>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Faculty Name</h6>
                                                    </div>


                                                    <div class="col-sm-9 text-secondary">
                                                        <?php
                                                        $totala = "";
                                                        $status = "";
                                                        $saza = "SELECT * FROM `project_faculty` WHERE project_id='$id'";
                                                        $resultaza = mysqli_query($conn, $saza);
                                                        while ($rowsa = mysqli_fetch_array($resultaza)) {
                                                            echo "\n";
                                                            echo $rowsa['name'];
                                                            echo "      ";
                                                            if ($rowsa['status'] == "Verified") {
                                                                echo "<i style='color:green' class='fa fa-check-circle' aria-hidden='true'></i>";
                                                            } elseif ($rowsa['status'] == "Pending") {
                                                                echo "<i style='color:blue'class='fa fa-question-circle'aria-hidden='true'></i>";
                                                            };
                                                        }
                                                        ?>



                                                    </div>
                                                </div>


                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Project Image</h6>
                                                    </div>


                                                    <div class="col-sm-9 text-secondary">
                                                        <?php

                                                        $saza = "SELECT * FROM `project_image` WHERE id='$id'";
                                                        $resultaza = mysqli_query($conn, $saza);
                                                        while ($rowsa = mysqli_fetch_array($resultaza)) {



                                                        ?>
                                                            <a href='uploads/<?= $rowsa['image'] ?>'> <img src="uploads/<?= $rowsa['image'] ?>" width="130"></a>

                                                        <?php } ?>

                                                    </div>
                                                </div>

                                                <hr>
                                                <div style="text-align: center">
                                                    <?php echo "<a href='projectedit.php?id=$id'><button type='button' class='btn btn-primary''>Edit</button></a>" ?>

                                                    <?php echo "<a href='deleteproject.php?id=$id'><button type='button' class='btn btn-danger'>Delete</button></a>" ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>



























                                </div>







                                <br>
                                <h1 style="text-align: center">Experience <a href="addexperience.php"><i style="height:40px;width:40px" class="fa fa-plus"></i></a> </h1>
                                <br>
                                <div><?php
                                        $w = $_SESSION['student_id'];

                                        $saw = "Select * from experience where sid='$w'";
                                        $resultaw = mysqli_query($conn, $saw);
                                        while ($roww = mysqli_fetch_array($resultaw)) {
                                            $idw = $roww['id'];



                                        ?>

                                        <div class="card mb-3">


                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Title</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php echo $roww['title']; ?>


                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Company Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php echo $roww['companyname']; ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"> Discription</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php echo $roww['description']; ?>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"> Warking Date</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php
                                                        if ($roww['end'] == "") {
                                                        } else if ($roww['end'] == "Present") {
                                                            echo $roww['start'] . "  " . "To " . $roww['end'];
                                                            $dateOfBirth = $roww['start'];

                                                            $today = date("Y-m-d");
                                                            $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                                            if ($diff->format('%y') == 0 && $diff->format('%m') == 0) {
                                                                echo '( ' . $diff->format('%d') . ' Days)';
                                                            }
                                                            if ($diff->format('%y') == 0 && $diff->format('%m') != 0) {
                                                                echo '( ' . $diff->format('%m') . ' Months)';
                                                            }

                                                            //echo '(Year : ' . $diff->format('%y').'Month: '.$diff->format('%m').'Day '.$diff->format('%d').')';
                                                        } else {
                                                            echo $roww['start'] . "  " . "To " . $roww['end'] . "";
                                                            $dateOfBirth = $roww['start'];

                                                            $today = $roww['end'];
                                                            $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                                            if ($diff->format('%y') == 0 && $diff->format('%m') == 0) {
                                                                echo '( ' . $diff->format('%d') . ' Days)';
                                                            }
                                                            if ($diff->format('%y') == 0 && $diff->format('%m') != 0) {
                                                                echo '( ' . $diff->format('%m') . ' Months)';
                                                            }
                                                        }


                                                        ?>

                                                    </div>
                                                </div>



                                                <hr>
                                                <div style="text-align:center">
                                                    <?php echo "<a href='studentediteexp.php?id=$idw'><button type='button' class='btn btn-primary'>Edit</button></a>"; ?>
                                                    <?php echo "<a href='studentdeleteexp.php?id=$idw'><button type='button' class='btn btn-danger'>Delete</button></a>"; ?>

                                                </div>
                                            </div>
                                        </div>



                                    <?php } ?>


                                </div>
                                </div>

                        </div>





                        <h1 style="text-align: center"> ACHIEVEMENTS<a href="addachievements.php"><i style="height:40px;width:40px" class="fa fa-plus"></i></a> </h1>
                        <div>
                            <?php
                            $sida = $_SESSION['student_id'];
                            $sa = "SELECT * FROM `achievements` WHERE sid='$sida'";
                            $resulta = mysqli_query($conn, $sa);
                            while ($row = mysqli_fetch_array($resulta)) {
                                $id = $row['id'];



                            ?>
                                <div class="card mb-3">


                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0"> Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['name']; ?>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Discription</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['dis']; ?>
                                            </div>
                                        </div>
                                        <hr>

                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Link</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <a href=" <?php echo $row['link']; ?>">Show credential </a>



                                            </div>

                                        </div>



                                    </div>
                                    <div style="text-align:center">

                                        <?php echo "<a href='deleteachievements.php?id=$id'><button type='button' class='btn btn-danger'>Delete</button></a>"; ?>

                                    </div>
                                    <p>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                                <?php } ?>


                                <br>
                                </div>
                        </div>
                    </div>
                </div>




                <footer class="footer py-4  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    <h4>© 2022
                                        made by
                                        <a href="" class="font-weight-bold" target="_blank">Team Echo</a>
                                    </h4>

                                </div>
                            </div>

                        </div>
                    </div>
                </footer>

            </div>


    </main>



    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">UIU Activity Tracker</h5>

                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->


                <!-- Sidenav Type -->

                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>

                </div>

                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>

                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>


                <!-- Navbar Fixed -->

                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                    </div>
                </div>



                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">









            </div>
        </div>
    </div>
    </div>


















    <!--   Core JS Files   -->
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>









































































    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>








    <style type="text/css">
        body {

            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }


        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>

    <script type="text/javascript">

    </script>
</body>

</html>