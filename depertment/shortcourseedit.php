
<?php
session_start();
//include("dp.php");
include("db.php");
$id=$_GET['id'];

$sql = "SELECT * FROM `shortcourse` WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$data = $result->fetch_assoc() ;
$num = mysqli_num_rows($result);
$name;
if ($num == 1){
    $name=$data['name'] ;
    $cid=$data['cid'] ;
    $department=$data['department'] ;
    $length=$data['length'];
    $image=$data['image'];

  
    
}
$cname=$name;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["promax"])) {
    $_SESSION['fname']=$_POST['addteacher'];
    header("location:depertmentSearchteacher.php?id=$id&cname=$cname");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST["pro"])) {
        $name = $_POST['name'];
        $cid = $_POST['cid'];
        $length = $_POST['length'];


        $sql = "UPDATE `shortcourse` SET `name`='$name',`cid`='$cid',`length`='$length' WHERE id=$id";

        mysqli_query($conn, $sql);
        header("location:shortcourseedit.php?id=$id");
    }
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Short course</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img class="rounded-circle" src="img/Logo_uiu.jpg" alt=""
                            style="width: 40px; height: 40px;"></i> UIU</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/sakib.jpg" alt="" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Abdullah AL Sakib</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <a href="shortcourse.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Short Course</a>
                    <a href="teacher.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Teacher</a>
                    <a href="Course.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Course</a>
                    <a href="massage.php" class="nav-item nav-link "><i class="fa fa-table me-2"></i>Massage</a>
                    <a href="depertment.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Depertment</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">






                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img class="rounded-circle me-lg-2" src="img/sakib.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <span class="d-none d-lg-inline-flex">Abdullah Al Sakib</span>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">

                                <a href="adminlogout.php" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    </div>
            </nav>
            <!-- Navbar End -->





            <div class="container mt-5">

<div class="row d-flex justify-content-center">

    <div class="col-md-7">

        <div class="card p-3 py-4">

            

            <div class="text-center mt-3">

                <h2 class="mt-2 mb-0" style="color:blue;"><?php echo $name; ?></h2>
                <span><?php echo $cid; ?></span>







                <br>
                <br>
           
                      

                        <br>
                        <h3  style="color:black;">Add Faculty<h3>

                                <form method="POST" class="searchform order-lg-last" style="text-align: center;">

                                    <div>

                                        <input style=" width:300px; border:3px solid #FFA500; " type="text"  placeholder="Search" name="addteacher">
                                        <button style="width:40px; background-color: #4CAF50;" ;type="submit" name="promax" placeholder="" class=""><span class="fa fa-search"></span></button>
                                    </div>
                                </form>
                                <br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Id</th>

                                        </tr>
                                    </thead>
                                    <?php


                                    $sa = "SELECT * FROM `shortcoursefaculty` WHERE cid='$id'";
                                    $resulta = mysqli_query($conn, $sa);
                                    while ($row = mysqli_fetch_array($resulta)) {
                                        $pid = $row["id"];

                                    ?>
                                        <tbody>

                                            <tr>

                                                <td><?php echo $row['fname']; ?></td>
                                                <td><?php echo $row['fid']; ?></td>
                                                <?php echo "<td><a href='facultyremove.php?pid=$pid&cid=$id'><button type='button' class='btn btn-danger'>Delete</button></a></td>"; ?>
                                            </tr>

                                        </tbody>
                                    <?php }
                                    ?>
                                </table>
                                <br>
                                <form action="<?php echo "supload.php?id=$id" ?>" method="post" enctype="multipart/form-data">

                                    <input type="file" name="my_image" style="color:blue">
                                    <br>
                                    <br>

                                    <input type="submit" name="submit" value="submit">

                                </form>

                                <h3> All Image</h3>

                                


                                
                                    <td><img src="../navbar/uploads/<?= $image ?>" width="200"></td>

                                    
                            


                                <form autocomplete="off" action="" method="post">
                                    <div class="px-4 mt-1">
                                        <label for="lname">
                                            <h3>Course Name</h3>
                                        </label>
                                        <br>
                                        <input style="width:300px;height:50px; border:3px solid #FFA500;" type="text" id="pname" name="name" value="<?php echo $name ?>">

                                        <br>
                                        <label for="lname">
                                            <h3>Course Id</h3>
                                        </label>
                                        <br>
                                        <input style="width:300px;height:50px; border:3px solid #FFA500;" type="text" id="cid" name="cid" value="<?php echo $cid ?>">
                                        <br>


                                        <label for="lname">
                                            <h3>Course Length</h3>
                                        </label>
                                        <br>
                                        <input style="width:300px;height:50px;border:3px solid #FFA500;" type="text" id="pl" name="length" value="<?php echo $length ?>">
                                        <br>



                                    </div>
                                    <div class="buttons">

                                        <button type="submit" name="pro" class="btn btn-outline-primary px-4">Edit</button>

                                    </div>
                                </form>






            </div>




        </div>

    </div>

</div>

</div>




            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">UIU Faculty Members</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="">Team Echo</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>