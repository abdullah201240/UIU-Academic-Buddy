<?php
session_start();
include("db.php");
if (!isset($_SESSION['student_id'])) {
    header("location: ../index.php");
    exit;
}
$tid = $_SESSION['student_id'];
$sq = "SELECT * FROM `student` WHERE id='$tid'";
$result = mysqli_query($conn, $sq);
$data = $result->fetch_assoc();
if ($result) {

    $cgpa = $data['cgpa'];
    $website = $data['website'];
    $github = $data['github'];
    $linkedin = $data['linkedin'];
    $phone=$data['number'];
    $address=$data['address'];
    $intro = $data['intro'];
    $about = $data['about'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        echo "sakib";
        header("location:studentprofile.php");

        $cgpa = $_POST["cgpa"];
        $website = $_POST["website"];
        $github = $_POST["github"];
        $linkedin = $_POST["linkedin"];
        $phone= $_POST["phone"];
        $address= $_POST["address"];
        $intro= $_POST["intro"];
        $about= $_POST["about"];
        $sql = "UPDATE `student` SET `cgpa`='$cgpa',`github`='$github',`website`='$website',`linkedin`='$linkedin',number='$phone',address='$address',intro='$intro',about='$about' WHERE id='$tid'";
        mysqli_query($conn, $sql);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="76x76" href="uploads/<?=$_SESSION['photo']?>">
<link rel="icon" type="image/png" href="uploads/<?=$_SESSION['photo']?>">

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
      <img src="uploads/<?=$_SESSION['photo']?>" class="navbar-brand-img h-100" alt="main_logo">
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

      <form action="" method="POST" class="searchform order-lg-last">
        <div class="form-group d-flex">
          <input type="text" name="searchteacher"class="form-control pl-3" placeholder="Search">
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





    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="uploads/<?= $_SESSION['photo'] ?>" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">

                        <h2 class="mt-2 mb-0"><?php echo $_SESSION['student_name']; ?></h2>
                        <form action="upload.php" method="post" enctype="multipart/form-data">

                            <input type="file" name="my_image">
                            <br>

                            <input type="submit" name="submit" value="Upload">

                        </form>
                        <span><?php echo $_SESSION['student_id']; ?></span>
                        <form autocomplete="off" action="" method="post">
                            <div class="px-4 mt-1">
                                <label for="lname">
                                    <h3>CGPA</h3>
                                </label>
                                <br>
                                <input style="width:300px;height:50px; border:3px solid #FFA500;" type="text" id="cgpa" name="cgpa" value="<?php echo $cgpa ?>">
                                <br>
                                <label for="lname">
                                    <h3>Phone Number</h3>
                                </label>
                                <br>
                                <input style="width:300px;height:50px; border:3px solid #FFA500;" type="text" id="phone" name="phone" value="<?php echo $phone ?>">

                                <br>

                                <label for="lname">
                                    <h3>Address</h3>
                                </label>
                                <br>
                                <input style="width:300px;height:50px; border:3px solid #FFA500;" type="text" id="phone" name="address" value="<?php echo $address ?>">

                                <br>

                                <label for="lname">
                                    <h3>Intro</h3>
                                </label>
                                <br>
                                <input style="width:300px;height:50px; border:3px solid #FFA500;" type="text" id="phone" name="intro" value="<?php echo $intro ?>">

                                <br>
                                <label for="lname">
                                    <h3>About</h3>
                                </label>
                                <br>
                                <textarea style="width:300px;height:200px; border:3px solid #FFA500;" type="text" id="phone" name="about" value="<?php echo $about ?>"> </textarea>

                                <br>

                                <label for="lname">
                                    <h3>Website</h3>
                                </label>
                                <br>
                                <input style="width:300px;height:50px; border:3px solid #FFA500;" type="text" id="website" name="website" value="<?php echo $website ?>">
                                <br>


                                <label for="lname">
                                    <h3>Github</h3>
                                </label>
                                <br>
                                <input style="width:300px;height:50px;border:3px solid #FFA500;" type="text" id="github" name="github" value="<?php echo $github ?>">
                                <br>
                                <label for="lname">
                                    <h3>LinkedIn</h3>
                                </label>
                                <br>
                                <input style="width:300px;height:50px;border:3px solid #FFA500;" type="text" id="linkedin" name="linkedin" value="<?php echo $linkedin ?>">
                                <br>



                            </div>
                            <div class="buttons">

                                <button type="submit" name="submit" class="btn btn-outline-primary px-4">Save</button>

                            </div>
                        </form>

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
          made  by
          <a href="" class="font-weight-bold" target="_blank">Team Echo</a></h4>
          
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
<script src="./assets/js/core/popper.min.js" ></script>
<script src="./assets/js/core/bootstrap.min.js" ></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js" ></script>
<script src="./assets/js/plugins/smooth-scrollbar.min.js" ></script>





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


<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>
  </body>

</html>
