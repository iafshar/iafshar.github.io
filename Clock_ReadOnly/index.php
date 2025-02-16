<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clock</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="http://localhost:8080/Clock/css/postLanding.css" rel="stylesheet" type="text/css">
  <script src="../functions.js"></script>
  <script>
    var clockID = window.location.search.substring(1);
  </script>
  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.15/p5.js'></script> -->
  <!-- <script src=
"https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.11/addons/p5.dom.min.js">
</script> -->
  <script slanguage="javascript" type="text/javascript" src="../libraries/p5.js"></script>
  <!-- <script language="javascript" type="text/javascript" src="libraries/p5.sound.min.js"></script> -->
  <!-- PLEASE NO CHANGES BELOW THIS LINE (UNTIL I SAY SO) -->
  <!-- <script language="javascript" type="text/javascript" src="libraries/p5.min.js"></script> -->
  <script language="javascript" type="text/javascript" src="../libraries/p5.sound.js"></script>
  <script language="javascript" type="text/javascript" src="../libraries/p5.dom.js"></script>
  <script language="javascript" type="text/javascript" src="Circles.js"></script>
  <script language="javascript" type="text/javascript" src="Scrollbar.js"></script>
  <script language="javascript" type="text/javascript" src="collisionDetection.js"></script>
  <script language="javascript" type="text/javascript" src="Clock.js"></script>
  <!-- OK, YOU CAN MAKE CHANGES BELOW THIS LINE AGAIN -->

  <!-- This line removes any default padding and style.
       You might only need one of these values set. -->

  <style> body { padding: 0; margin: 0; } </style>
</head>

<body>
  <div class="topnav">
    <a href="#" id="backBtn" onclick=checkBack()><img border="0" src="http://localhost:8080/Clock/Icons/back.png" width="30" height="30"></a>
    <a href="http://localhost:8080/Clock/feed.php"><img border="0" src="http://localhost:8080/Clock/Icons/house.png" width="30" height="30"></a>
    <a href="http://localhost:8080/Clock/discover.php"><img border="0" src="http://localhost:8080/Clock/Icons/compass.png" width="30" height="30"></a>
    <a href="http://localhost:8080/Clock/checkClockLimit.php"><img border="0" src="http://localhost:8080/Clock/Icons/music.png" width="30" height="30"></a>
    <a href="http://localhost:8080/Clock/myClocks.php"><img border="0" src="http://localhost:8080/Clock/Icons/user.png" width="30" height="30"></a>
    <a href="http://localhost:8080/Clock/inbox.php" id='chats' style='color:black'><img border="0" src="http://localhost:8080/Clock/Icons/inbox.png" width="30" height="30"></a>
    <a href="http://localhost:8080/Clock/search.php"><img border="0" src="http://localhost:8080/Clock/Icons/magnifying-glass.png" width="30" height="30"></a>
    <div class="dropdown">
      <a><?php
            echo $_SESSION["Username"];
        ?></a>
      <div class="dropdown-content">
        <a href="../updateAccount.php">
          <?php // Checks if the user is a basic user and if they are, they will be presented with a button on the menu bar asking them if they want to upgrade to premium
            if($_SESSION["Premium"] == 0){
              echo "Upgrade To Premium";
            } 
            else {
              echo "Downgrade To Basic";
            }?>
          </a>
          <a onclick=deleteAccount()>Deactivate Account</a>
          <a href="../updateEmail.php">Change Email</a>
          <a href="../start.php">Logout</a>
      </div>
    </div>
  </div>
</body>
<script>
  setUnreadCount();


</script>
<script>
      // removes all the items stored in localStorage from landing
      deleteLocalStorageLanding();
</script>
</html>
