<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if (!isset($_SESSION['teacher_id'])) {
    header("location: ../index.php");
    exit;
}
include("db.php");

$tid = $_SESSION['teacher_id'];
$sq = "SELECT * FROM `teacher` WHERE id='$tid'";
$result = mysqli_query($conn, $sq);
$data = $result->fetch_assoc();
if ($result) {
    $_SESSION['teacher_image'] = $data['image'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $searchstudent = $_POST["student"];

    $_SESSION['searchstudent'] = $searchstudent;

    header("location: searchstudent.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="uploads/<?= $_SESSION['teacher_image'] ?>">
    <link rel="icon" type="image/png" href="uploads/<?= $_SESSION['teacher_image'] ?>">

    <title>

        Teacher





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
            <a class="navbar-brand m-0" href="teacherprofile.php" target="_blank">
                <img src="uploads/<?= $_SESSION['teacher_image'] ?>" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white"><?php echo $_SESSION['teacher_name'] ?></span>
            </a>
        </div>


        <hr class="horizontal light mt-0 mb-2">

        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">


                <li class="nav-item">
                    <a class="nav-link text-white " href="teacherhome.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>

                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="facultyprojetrequest.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>

                        <span class="nav-link-text ms-1">Project</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="shortcourses.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>

                        <span class="nav-link-text ms-1"> Short Courses</span>
                    </a>
                </li>

                <?php
                $sq = "SELECT * FROM `uapermission` WHERE tid='$tid'";
                $result = mysqli_query($conn, $sq);
                while ($row = mysqli_fetch_array($result)) {


                    echo "<li class='nav-item'>
  <a class='nav-link text-white ' href='ua.php'>
    
      <div class='text-white text-center me-2 d-flex align-items-center justify-content-center'>
        <i class='material-icons opacity-10'>table_view</i>
      </div>
    
    <span class='nav-link-text ms-1'> U.A</span>
  </a>
</li>";
                }



                ?>
                <li class="nav-item">
                    <a class="nav-link text-white " href="myua.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>

                        <span class="nav-link-text ms-1">My UA</span>
                    </a>
                </li>





                <li class="nav-item">
                    <a class="nav-link text-white " href="teacherlogout.php">

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

                        <form action="" method="POST" class="searchform order-lg-last">
                            <div class="form-group d-flex">
                                <input type="text" name="student" class="form-control pl-3" placeholder="Search">
                                <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                            </div>
                        </form>







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

        <!-- END nav -->
        <h2 style="text-align:center;">All UA List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Id</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Course ID</th>

                    <th scope="col">Section</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <?php
            $sql = "SELECT * FROM `ta` WHERE tid='$tid'";

            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $sid = $row['sid'];
                $cname = $row['cname'];
                $section = $row['section'];
                $name = $row['sname'];

                $sql1 = "SELECT * FROM `student` WHERE id='$sid'";

                $result1 = mysqli_query($conn, $sql1);
                while ($row1 = mysqli_fetch_array($result1)) {
                    $email = $row1['email'];



            ?>
                    <tbody>
                        <tr>

                            <td><?php echo $row['sname'] ?></td>
                            <td><?php echo $row['sid'] ?></td>
                            <td><?php echo $row['cname'] ?></td>
                            <td><?php echo $row['cid'] ?></td>
                            <td><?php echo $row['section'] ?></td>
                            <td><?php
                                $st = $row['status'];
                                if ($row['status'] == "Accept") {
                                    echo " <h4 style='color:green;'>$st</h4>";
                                } else if ($row['status'] == "Reject") {
                                    echo " <h4 style='color:red;'>$st</h4>";
                                } else {
                                    echo " <h4 style='color:Blue;'>$st</h4>";
                                }

                                ?></td>
                            <td>
                                <div>
                                    <a type='button' class='btn btn-success' href='#popup1'>Accept</a>
                                </div>

                                
                            </td>

                            <td><?php echo " <a href='reject.php?id=$id'><button type='button' class='btn btn-primary'>Reject</button></a> "; ?></td>
                        </tr>


                    </tbody>
                    <div id="popup1" class="overlay">
            <div class="popup">
                <h2>Accept Notification</h2>
                <a class="close" href="#">&times;</a>
                <div class="content">
                Are you sure to Accept?
                <br>
                    <?php echo "<a href='acceptua.php?id=$id&&email=$email&&section=$section&&cname=$cname&&name=$name'><button type='button' class='btn btn-success'>Accept</button></a>
     
    
      
      "; ?>
                </div>
            </div>
        </div>
            <?php }
            } ?>
        </table>








        <br>
        <br>
        <br>
        <br>
        <br>
        <br>











        

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

    <?php
    //  echo "
    // <script type='text/javascript'>

    //     function openForm() {


    // if (window.confirm('Are you sure to Accept?'))
    //     {
    //     window.open('acceptua.php?id=$id','acceptua.php?id=$id');

    //     }
    //     else{
    //         window.open('myua.php','myua.php');
    //     };


    // }</script>";
    ?>

    <style>
        .box {
            width: 40%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            padding: 35px;
            border: 2px solid #fff;
            border-radius: 20px/50px;
            background-clip: padding-box;
            text-align: center;
        }




        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }


        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .popup {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 30%;
            position: relative;
            transition: all 5s ease-in-out;
        }

        .popup h2 {
            margin-top: 0;
            color: #333;
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .popup .close:hover {
            color: #06D85F;
        }

        .popup .content {
            max-height: 30%;
            overflow: auto;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 70%;
            }

            .popup {
                width: 70%;
            }
        }
    </style>
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
</body>

</html>