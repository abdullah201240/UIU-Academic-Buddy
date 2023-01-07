<?php
session_start();
include("db.php");
if (!isset($_SESSION['student_id'])) {
    header("location: ../index.php");
    exit;
}
$time = $_SESSION['times'];
$cur = date("Y-m-d H:i:s");

// if ($cur > $_SESSION['end_time']) {
//   $_SESSION['off']=1;
//   header("location: codeans.php");
// }
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $url = "http://";
} else {
    $url = "http://";
    $url .= $_SERVER['HTTP_HOST'];
    $url .= $_SERVER['REQUEST_URI'];
    $url;
}
$page = $url;
$sec = $time * 60 + 1;
//echo$_SESSION['end_time'];
//echo $sec;
//header("location: mcqans.php");



$sweak = $_SESSION['sweak'];
$scid = $_SESSION['cid'];
//$name = $_GET['name'];
$name = $_SESSION["examname"];
$id = $_GET['id'];
$tid = $_SESSION['student_id'];
$sq = "SELECT * FROM `student` WHERE id='$tid'";
$result = mysqli_query($conn, $sq);
$data = $result->fetch_assoc();
if ($result) {
    $_SESSION['photo'] = $data['image'];
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta http-equiv="refresh" content="<?php echo $sec ?>" URL="<?php echo $page; ?>"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="../uploads/<?= $_SESSION['photo'] ?>">
    <link rel="icon" type="image/png" href="../uploads/<?= $_SESSION['photo'] ?>">

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

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">




</head>


<body class="g-sidenav-show  bg-gray-100">





    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="studentprofile.php" target="_blank">
                <img src="../uploads/<?= $_SESSION['photo'] ?>" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white"><?php echo $_SESSION['student_name']; ?></span>
            </a>
        </div>


        <hr class="horizontal light mt-0 mb-2">

        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">


                <li class="nav-item">
                    <a class="nav-link text-white " href="../studenthome.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>

                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="index.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>

                        <span class="nav-link-text ms-1">All Courses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="mycourse.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>

                        <span class="nav-link-text ms-1">My Courses</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link text-white " href="../counsilling.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>

                        <span class="nav-link-text ms-1">COUNSELLING</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="../Coursemet.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>

                        <span class="nav-link-text ms-1">PARTICIPATIONS</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="../studentlogout.php">

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
                                <input type="text" name="searchteacher" class="form-control pl-3" placeholder="Search">
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

        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="padding-left:440px;">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Videos</a> <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Material</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exam.php">Exam</a>
                    </li>

                </ul>
            </div>
        </nav>


        <div id='response'>


        </div>

        <div id="google_element">

        </div>



        <?php

        $s = 1;
        $sql = "SELECT * FROM `code` WHERE cid='$scid' AND week='$sweak' And ename='$name' And id=$id";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $qus = $row['qus'];
            $mark = $row['mark'];
            $input1 = $row['input1'];
            $output1 = $row['output1'];
            $len = $row['len'];
            $_SESSION['len'] = $len;
            


            echo "
        <div style='text-align:center'>
        <h5> $qus<h5>
        <h5>Language :$len<h5>
          </div>

         <div>
         <h4>Input : </h4>
         <p> $input1 </p>
         <h4>Output : </h4>
         <p> $output1 </p>
         
         </div> 
        <br>";











            $s = $s + 1;
        }
        ?>
        </div>
        </div>
        </div>

        </div>




        <br>
        <br>
        <h3 style='text-align:center'> Write Down Your Code </h3>


     <?php echo"<form action='test.php?id=$id' method='POST'>" ?>


            <p>
                <textarea id='lineCounter' wrap='off' readonly>1.</textarea>
                <textarea id='codeEditor' wrap='off' name="sakib"></textarea>
            </p>


            <div class="form-group" style="text-align:right">
                <button type="submit" name="one" class="btn btn-primary">Run on sample</button>
                <button type="submit"name="two" class="btn btn-success"> Submit</button>
            </div>
        </form>






        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            <h4>© 2022
                                made by
                                Team Echo</h4>

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
    <style>
        #codeEditor,
        #lineCounter {
            font-family: lucida console, courier new, courier, monospace;
            margin: 0;
            padding: 10px 0;
            height: 75vh;
            border-radius: 0;
            resize: none;
            font-size: 16px;
            line-height: 1.2;
            outline: none;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        #lineCounter:focus-visible,
        #codeEditor:focus-visible {
            outline: none;
        }

        #lineCounter {
            display: flex;
            border-color: transparent;
            overflow-y: hidden;
            text-align: right;
            box-shadow: none;
            color: #707070;
            background-color: #d8d8d8;
            position: absolute;
            width: 3.5rem;
            /* Determine appearance of line counter */
            background-color: #3E3D32;
            border-color: #3E3D32;
            color: #928869;
        }

        #codeEditor {
            padding-left: calc(3.5rem + 5px);
            width: 100%;
            /* Determine appearance of code editor */
            background-color: #272822;
            border-color: #272822;
            color: #ffffff;
        }
    </style>

    <!--   Core JS Files   -->
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate">


    </script>

    <script>
        const textarea = document.querySelector('textarea')
        const lineNumbers = document.querySelector('.line-numbers')

        textarea.addEventListener('keyup', event => {
            const numberOfLines = event.target.value.split('\\n').length

            lineNumbers.innerHTML = Array(numberOfLines)
                .fill('<span></span>')
                .join('')
        })

        textarea.addEventListener('keydown', event => {
            if (event.key === 'Tab') {
                const start = textarea.selectionStart
                const end = textarea.selectionEnd

                textarea.value = textarea.value.substring(0, start) + '\\t' + textarea.value.substring(end)

                event.preventDefault()
            }
        })
    </script>
    <script>
        function loadGoogleTranslate() {
            new google.translate.TranslateElement("google_element");
        }
    </script>



    <script type="text/javascript">
        $(document).ready(function() {

            $("#st").click(function() {

                $("#div").html("Loading ......");


            });

        });
    </script>
    <script>
        var codeEditor = document.getElementById('codeEditor');
        var lineCounter = document.getElementById('lineCounter');
        codeEditor.addEventListener('scroll', () => {
            lineCounter.scrollTop = codeEditor.scrollTop;
            lineCounter.scrollLeft = codeEditor.scrollLeft;
        });

        codeEditor.addEventListener('keydown', (e) => {
            let {
                keyCode
            } = e;
            let {
                value,
                selectionStart,
                selectionEnd
            } = codeEditor;
            if (keyCode === 9) { // TAB = 9
                e.preventDefault();
                codeEditor.value = value.slice(0, selectionStart) + '\t' + value.slice(selectionEnd);
                codeEditor.setSelectionRange(selectionStart + 2, selectionStart + 2)
            }
        });

        var lineCountCache = 0;

        function line_counter() {
            var lineCount = codeEditor.value.split('\n').length;
            var outarr = new Array();
            if (lineCountCache != lineCount) {
                for (var x = 0; x < lineCount; x++) {
                    outarr[x] = (x + 1) + '.';
                }
                lineCounter.value = outarr.join('\n');
            }
            lineCountCache = lineCount;
        }
        codeEditor.addEventListener('input', () => {
            line_counter();
        });
    </script>

    <script>
        //wait for page load to initialize script
        $(document).ready(function() {
            //listen for form submission
            $('form').on('submit', function(e) {
                //prevent form from submitting and leaving page
                e.preventDefault();

                // AJAX 
                $.ajax({
                    type: "POST", //type of submit
                    cache: false, //important or else you might get wrong data returned to you
                    url: "compile.php", //destination
                    datatype: "html", //expected data format from process.php
                    data: $('form').serialize(), //target your form's data and serialize for a POST
                    success: function(result) { // data is the var which holds the output of your process.php

                        // locate the div with #result and fill it with returned data from process.php
                        $('#div').html(result);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        setInterval(function() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "response.php", false);
            xmlhttp.send(null);
            document.getElementById("response").innerHTML = xmlhttp.responseText;


        }, 1000);
    </script>
    <!-- <script type="text/javascript">
    
    var str1 = "<?php echo $_SESSION['end_time']; ?>";
    
    //var str1 = "22-10-5 10:20:45",
    var str2 = "2022-12-2 05:10:10";

// if (str1 > str2)
//     alert("Time 1 is later than time 2");
// else
//     alert("Time 2 is later than time 1");
    
    
    
    
    
    
    
    
    
    
    
    
    var currentdate = new Date();

    
    var hour = currentdate.getHours()-5;
    var datetime =
     currentdate.getFullYear() +"-"
     + (currentdate.getMonth()+1)  +"-"+

    currentdate.getDate() + " "
                 
                +hour + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
      
                //alert(datetime+" "+times); 
                


      // if(equal(times,datetime)) {
      //   window.location="mcqans.php";
      // }
  </script> -->

    <script>
        let redioBtns = document.querySelectorAll("input[name='1']");
        let result = document.getElementById("result");
        let findSelected = () => {
            let selected = document.querySelector("input[name='0']:checked").value;
            result.textContent = 'value of selected radio button :${selected}';
        }
        radioBtns.forEach(radioBtn => {
            radioBtn.addEventListener("change", findSelected);
        });
    </script>


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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>