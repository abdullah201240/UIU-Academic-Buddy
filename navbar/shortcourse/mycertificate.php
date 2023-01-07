<?php

session_start();



 




?>





<html>

<head>
    <style type='text/css'>
        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            padding-left: 20px;
            color: black;
            display: table;
            font-family: Georgia, serif;
            font-size: 24px;
            text-align: center;
        }

        .container {
            
            border: 20px solid tan;
            width: 1400px;
            height: 563px;
            display: table-cell;
            vertical-align: middle;
        }

        .logo {
            color: tan;
        }

        .marquee {
            color: tan;
            font-size: 48px;
            margin: 20px;
        }

        
        .person {
            border-bottom: 2px solid black;
            font-size: 32px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
        }

        .reason {
            margin: 20px;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="logo">
            <img src="../uploads/Logo_uiu.jpg"></img>
            <br>
            <br>

            United International University

        </div>

        <div class="marquee">
            Certificate of Completion
        </div>

        <div class="assignment">
            This certificate is presented to
        </div>

        <div class="person">
 
           <?php $sname = $_SESSION['sname'];  echo"$sname"?>
        </div>

        <div class="reason">
            For successfully complete <?php $nam= $_SESSION['caname'];
            
             echo"<span style='color:blue'> $nam </span>" ?> course
        </div>
        <br>
        <br>
        <div style="text-align:left; font-size: 15px;padding-left:20px;padding-bottom:5px;">
        <img  src="../uploads/sag-removebg-preview.png" height="60px;" width="160px"></img>
        
        <p>-------------------------------<br>Dr Salekul Islam <br> Professor & Head of the Department <br> Department of Computer Science & Engineering </p>
       
        </div>
        
 
        </div>
  


        
       
    </style>
    
</body>

</html>