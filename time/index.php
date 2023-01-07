<script>
  openPopup();
  </script>

<!doctype html>
<html lang="en">

<head>
  
 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  
  <link rel="stylesheet" href="./style.css">

  <title>Hello, world!</title>
</head>

<body>
  
  <div class="container">
    <button type="submit" class="btn" onclick="openPopup()">Submit</button>
    <div class="popup" id="popup">
      <img src="./404-tick.png">
      <h2>Thank you for</h2>
      <button type="button"  onclick="closePopup()">ok</button>

    </div>

  </div>
 

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script>
let popup = document.getElementById("popup");
function openPopup(){
 popup.classList.add('open-Popup');

}
function closePopup(){
 popup.classList.remove('open-Popup');

}



  </script>
  
  
  
  
 
 
</body>

</html>