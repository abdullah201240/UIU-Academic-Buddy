
<?php
extract($_REQUEST);
include('db.php');

$sql=mysqli_query($conn,"select * from upload where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("files/$row[name]");

mysqli_query($conn,"delete from upload where id='$del'");

header("Location:mybook.php");

?>