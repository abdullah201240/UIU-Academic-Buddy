<?php
session_start();
//include("dp.php");
include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $id = $_POST["id"];
    $department;
    if(!empty($_POST['department'])) {
    $department = $_POST["department"];
    }
    $email = $_POST["email"];
    $number = $_POST["number"];
    $gender;
    if(!empty($_POST['gender'])) {
    $gender=$_POST["gender"];
    }
    $password = $_POST["password"];

    $birthdaytime = $_POST["birthdaytime"];
    $md5pass = md5($password);

    $query = "insert into student (name,id,department,email,number,password,dob,gender) values ('$name','$id','$department','$email','$number','$md5pass','$birthdaytime','$gender')";

    $result = mysqli_query($conn, $query);
    if ($result) {
    }
    //header("Location: index.php");
} else {
    echo "Please Enter Valid Information";
}






?>













<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Students</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

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
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img class="rounded-circle" src="img/Logo_uiu.jpg" alt="" style="width: 40px; height: 40px;"></i> UIU</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/sakib.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Abdullah AL Sakib</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <a href="student.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Students</a>
                    <a href="teacher.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Teacher</a>
                    <a href="Course.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Course</a>
                    <a href="massage.php" class="nav-item nav-link "><i class="fa fa-table me-2"></i>Massage</a>
                    
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
                                <img class="rounded-circle me-lg-2" src="img/sakib.jpg" alt="" style="width: 40px; height: 40px;">
                                <span class="d-none d-lg-inline-flex">Abdullah Al Sakib</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">

                                <a href="adminlogout.php" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    </div>
            </nav>
            <!-- Navbar End -->


            <!-- Widget Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Students</h6>

                            </div>


                            <form action="" method="POST">
                                <label for="fname">Name:</label>
                                <input type="text" id="fname" name="name" required><br><br>
                                <label for="lname">ID:</label>
                                <input type="text" id="lname" name="id" required><br><br>
                                <label for="lname">Department:</label>
                                <select name="department" id="department">
                                <option value="" disabled selected>Choose option</option>
                                    <option value="CSE">CSE</option>
                                    <option value="EEE">EEE</option>
                                    <option value="BBA">BBA</option>

                                    
                                </select>
                                <label for="lname">Email:</label>
                                <input type="text" id="lname" name="email" required><br><br>
                                <label for="lname">Number:</label>

                                <input type="text" id="lname" name="number" required><br><br>
                                <label for="gender">Gender:</label>

                                <select name="gender" id="gender">
                                <option value="" disabled selected>Choose option</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    
                                </select>
                                <label for="lname">Password:</label>
                                <input type="text" id="lname" name="password" required><br><br>
                                <label for="birthdaytime">Birthday:</label>
                                <input type="datetime-local" id="birthdaytime" name="birthdaytime" required><br><br>
                                <button>
                                    Submit
                                </button>
                            </form>

                        </div>
                    </div>




                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>

                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>


























                    <div class="col-sm-12 ">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Students</h6>



                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Number</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Birthday</th>

                                    </tr>
                                </thead>
                                <?php
                                $s="Select * from student LIMIT 20";
                                $result = mysqli_query($conn,$s);
                                while($row = mysqli_fetch_array($result)){
                                ?>
                                <tbody>
                                    <tr>

                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['number']?></td>
                                        <td><?php echo $row['department']?></td>
                                        <td><?php echo $row['dob']?></td>
                                    </tr>
                                    
                                    <?php }?>
                                </tbody>
                            </table>









                        </div>
                    </div>

                </div>
            </div>
            <!-- Widget End -->


            <!-- Footer Start -->
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