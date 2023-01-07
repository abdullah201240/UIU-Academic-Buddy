<?php
include("db.php");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/style.css">
    <title>Video Player</title>
</head>

<body>
    <br>
    <br>
    <form action="upload.php" method="post" enctype="multipart/form-data">

        <input type="file" name="my_image">
        <br>

        <input type="submit" name="submit" value="Upload">

    </form>
    <?php
    $sql = "SELECT * FROM `coursevideo` ORDER BY id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $data = $result->fetch_assoc();
    if ($result) {
        $one = $data['name'];
    }
    ?>
    <h3 class="heading">Video gellary</h3>
    <div class="container">
        <div class="main-video">
            <div class="video">
                <video src="uploads/<?= $one ?>" controls muted autoplay></video>
                <h3 class="title">01.video title</h3>
            </div>
        </div>

        <div class="video-list">
            <div class="vid active">

                <video src="uploads/<?= $one ?>" muted></video>
                <h3 class="title">01.video title</h3>

            </div>
            <?php
            $s = "SELECT * FROM `coursevideo` ORDER BY id";
            $result = mysqli_query($conn, $s);
            while ($row = mysqli_fetch_array($result)) {
                
                $name = $row['name'];
                if($name==$one) {

                }
                else{
                echo " <div class='vid '>

                                <video src='uploads/$name' muted></video>
                                <h3 class='title'>01.video title</h3>
                
                            </div>  ";
                }
            }
            ?>








 <!--


            <div class="vid active">

                <video src="tvideo/1.mp4" muted></video>
                <h3 class="title">01.video title</h3>

            </div>








            <div class="vid">
                <video src="tvideo/2.mp4" muted></video>
                <h3 class="title">02.video title</h3>

            </div>
            <div class="vid">
                <video src="tvideo/3.mp4" muted></video>
                <h3 class="title">03.video title</h3>

            </div>
            <div class="vid">
                <video src="tvideo/4.mp4" muted></video>
                <h3 class="title">04.video title</h3>

            </div>

            <div class="vid">
                <video src="tvideo/5.mp4" muted></video>
                <h3 class="title">05.video title</h3>

            </div>
            <div class="vid">
                <video src="tvideo/6.mp4" muted></video>
                <h3 class="title">06.video title</h3>

            </div>
            <div class="vid">
                <video src="tvideo/7.mp4" muted></video>
                <h3 class="title">07.video title</h3>

            </div>
            <div class="vid">
                <video src="tvideo/8.mp4" muted></video>
                <h3 class="title">08.video title</h3>

            </div>
            <div class="vid">
                <video src="tvideo/9.mp4" muted></video>
                <h3 class="title">09.video title</h3>

            </div>
        </div>


    </div>
-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    <script>
        let listVideo = document.querySelectorAll('.video-list .vid');
        let mainVideo = document.querySelector('.main-video video');
        let title = document.querySelector('.main-video .title');
        listVideo.forEach(video => {
            video.onclick = () => {
                listVideo.forEach(vid => vid.classList.remove('active'));
                video.classList.add('active');
                if (video.classList.contains('active')) {
                    let src = video.children[0].getAttribute('src');
                    mainVideo.src = src;
                    let text = video.children[1].innerHTML;
                    title.innerHTML = text;
                };

            };

        });
    </script>




</body>

</html>