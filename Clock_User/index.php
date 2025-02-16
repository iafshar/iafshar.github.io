<!-- page that brings all the scripts together -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clock | Create</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <link href="http://localhost:8080/Clock/css/postLanding.css" rel="stylesheet" type="text/css">
  <script src="../functions.js"></script>
  <script>
    var clockID = -1;
    if(window.location.href.indexOf("?") > -1) { // if there is a question mark in the url
      clockID = window.location.search.substring(1);
    }

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
  <script language="javascript" type="text/javascript" src="Buttons.js"></script>
  <script language="javascript" type="text/javascript" src="Circles.js"></script>
  <script language="javascript" type="text/javascript" src="Mouse.js"></script>
  <script language="javascript" type="text/javascript" src="Scrollbar.js"></script>
  <script language="javascript" type="text/javascript" src="Tempo.js"></script>
  <script language="javascript" type="text/javascript" src="collisionDetection.js"></script>
  <script language="javascript" type="text/javascript" src="save.js"></script>
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
    <a class="active" href="http://localhost:8080/Clock/checkClockLimit.php"><img border="0" src="http://localhost:8080/Clock/Icons/music.png" width="30" height="30"></a>
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
  <div id="dialog" title="Name Your Clock"> <!--the actual contents of dialog box-->
    <div id="clock-name-container" >
    <input type="text" name="name" id="clock-name" width='50' height='100' maxlength="40" style="border: solid;" onpaste="clockNamePaste(event)" onblur="setFocus(this)" autocomplete="off" autofocus="autofocus" /><br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!-- non-breaking spaces to make the ok and cancel buttons centered -->
    <input type="button" value="OK" onclick="ok()" />
    <input type="button" value="Cancel" onclick="cancel()" />
    </div>
   </div> 
</body>
<script>
  setUnreadCount();

  $(document).ready(function () // creates the dialog box but doesnt show it
  {   
      $('#dialog').dialog({
          autoOpen: false,
          draggable: false,
          modal : true,
          resizable: false,
      show:"slow"
      });
  });

  function setFocus(elem){
    elem.focus();
  }

</script>
<script>
      // removes all the items stored in localStorage from landing
      deleteLocalStorageLanding();
</script>
</html>
