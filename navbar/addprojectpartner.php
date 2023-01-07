<?php

session_start();
$id = $_GET["id"];
include("db.php");
if (!isset($_SESSION['student_id'])) {
    header("location: ../index.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pro"])) {
        $_SESSION['partner'] = $_POST['addpartner'];

        header("location:projectpartnersearch.php?id=$id");
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nevbar.css">
    <title><?php echo $_SESSION['student_name']; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <form action="#" class="searchform order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search">
                    <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                </div>
            </form>
            <div class="collapse navbar-collapse" id="ftco-nav">

                <ul class="navbar-nav mr-auto">
                    <a href="studentprofile.php"><img class="rounded-circle me-lg-2" src="uploads/<?= $_SESSION['photo'] ?>" alt="" style="width: 80px; height: 80px;"></a>
                    <br>
                    <li class="nav-item "><a href="" class="nav-link"><?php echo $_SESSION['student_name']; ?></a></li>
                    <li class="nav-item active"><a href="studenthome.php" class="nav-link">Home</a></li>


                    <li class="nav-item"><a href="counsilling.php" class="nav-link">Counselling</a></li>
                    <li class="nav-item"><a href="Coursemet.php" class="nav-link">Participants</a></li>
                    <li class="nav-item"><a href="studentlogout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>











    <form method="POST" class="searchform order-lg-last">
        <label for="lname">
            <h3>Add Project Partner</h3>
        </label>
        <div class="form-group d-flex">

            <input style="width:200px;height:50px;text-align:left;border:3px solid #FFA500; position:absolute; left:200px; " type="text" class="form-control pl-3" placeholder="Search By Id" name="addpartner">
            <button type="submit" name="pro" placeholder="" class="form-control search" style="position:absolute; left:150px; "><span class="fa fa-search"></span></button>
        </div>
    </form>
    <br>
    <br>
    <br>
    <label for="lname">
        <h3>Project Partner</h3>
    </label>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Id</th>

            </tr>
        </thead>
        <?php


        $sa = "Select * from project_partner where project_id='$id'";
        $resulta = mysqli_query($conn, $sa);
        while ($row = mysqli_fetch_array($resulta)) {
            $pid = $row["id"];

        ?>
            <tbody>

                <tr>

                    <td><?php echo $row['partnerName']; ?></td>
                    <td><?php echo $row['partnerID']; ?></td>
                    <?php echo "<td><a href='revomeprojectpartner.php?pid=$pid'><button type='button' class='btn btn-danger'>Delete</button></a></td></tr>"; ?>
                </tr>

            </tbody>
        <?php }
        ?>
    </table>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>