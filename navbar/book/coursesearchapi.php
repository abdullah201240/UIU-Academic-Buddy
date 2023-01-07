<?php
include("db.php");

if($_POST["query"]){
    $s=$_POST["query"];
    $output = '';
    $sql = "SELECT * FROM `course` where cname LIKE '%'.'$s'.'%'";
    $result = mysqli_query($conn, $sql);
    $output = '<ul class="list-unstyled">';
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $output .= '<li>' . $row["cname"] . '</li>';
        }
    }
    else{
        $output .= '<li> No Course Found</li>';
    }
    $output.= '</ul>';
    echo $output;
}

?>