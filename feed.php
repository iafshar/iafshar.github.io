<!-- page for the users feed that displays the clocks of the users that they follow -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clock | Feed</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="css/postLanding.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="functions.js"></script>
    <script>
      
      function displayFeed() {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myRecords = JSON.parse(this.responseText);
                var premium = (myRecords.Premium == 1);
                if(myRecords.success == 1) {
                  var rows = "";
                  for (i=0;i<myRecords.ClocksUnsorted.length;i++) {
                      var myRecord = myRecords.ClocksUnsorted[i];
                      myRecord.Date = new Date(myRecord.Date);
                      myRecord.Date = myRecord.Date.toLocaleDateString('en-us', { weekday:"long", year:"numeric", month:"short", day:"numeric", hour:"numeric", minute:"numeric", second:"numeric"});
                      if (premium) {
                        var newRow = "<tr class='table-row'><td><table><tr><td><b><a href='otherProfile.php?clickedUserID="+myRecord.UserID+"' style='color:black'>"+myRecord.Username+"</a></b></td></tr><tr><td>"+myRecord.Name+"</td></tr><tr><td><iframe src='Clock_ReadOnlySmall/index.html?rowID="+i+"clockID="+myRecord.ClockID+"' loading='lazy' id='miniClock' width=410 height=205 onload=iframeclick(this)></iframe></td></tr><tr><td><i>"+myRecord.Date+"</i></td></tr></table></td><td><table><tr><td><button class='viewClock' onclick=openClock('"+myRecord.ClockID+"')><img border='0' src='Icons/expand.png' width='40' height='40'></button></td><td><button class='changeSound' onclick=changeSound('"+myRecord.ClockID+"',"+i+")><img border='0' src='Icons/mute.png' class='sound-icon' width='40' height='40'></button></td><td><button class='sendClock' onclick=sendClock('"+myRecord.ClockID+"')><img border='0' src='Icons/inbox.png' width='40' height='40'></button></td><td><button class='remixClock' onclick=remixClock('"+myRecord.ClockID+"')><img border='0' src='Icons/music.png' width='40' height='40'></button></td></tr><tr><td height=225></td></tr><tr><td><button class='likeButton' onclick=like("+myRecord.ClockID+",this) style='background-color: "+myRecord.LikeColor+";'><img border='0' src='Icons/like.png' width='40' height='40'></button></td><td><button class='dislikeButton' onclick=dislike("+myRecord.ClockID+",this) style='background-color: "+myRecord.DislikeColor+";'><img border='0' src='Icons/dislike.png' width='40' height='40'></button></td><tr><td id=numLikes-"+myRecord.ClockID+">"+myRecord.NumOfLikes+"</td><td id=numDislikes-"+myRecord.ClockID+">"+myRecord.NumOfDislikes+"</td></tr></table></td><td><table><tr><td height=70></td></tr><tr><td><textarea id=commentBox-"+myRecord.ClockID+" style='height:195px;width:100%;font-size:30px;' name='comment' placeholder='Comment'></textarea></td></tr><tr><td><button type='button' class='viewComments' style='width:50%;height:45px;' onclick=openComments('"+myRecord.ClockID+"')>View All</button><button type='submit' style='width:50%;height:45px;' onclick=addComment('"+myRecord.ClockID+"')>Enter</button></td></tr></table></td></tr>";
                      } else {
                        var newRow = "<tr class='table-row'><td><table><tr><td><b><a href='otherProfile.php?clickedUserID="+myRecord.UserID+"' style='color:black'>"+myRecord.Username+"</a></b></td></tr><tr><td>"+myRecord.Name+"</td></tr><tr><td><iframe src='Clock_ReadOnlySmall/index.html?rowID="+i+"clockID="+myRecord.ClockID+"' loading='lazy' id='miniClock' width=410 height=205 onload=iframeclick(this)></iframe></td></tr><tr><td><i>"+myRecord.Date+"</i></td></tr></table></td><td><table><tr><td><button class='viewClock' onclick=openClock('"+myRecord.ClockID+"')><img border='0' src='Icons/expand.png' width='40' height='40'></button></td><td><button class='changeSound' onclick=changeSound('"+myRecord.ClockID+"',"+i+")><img border='0' src='Icons/mute.png' class='sound-icon' width='40' height='40'></button></td><td><button class='sendClock' onclick=sendClock('"+myRecord.ClockID+"')><img border='0' src='Icons/inbox.png' width='40' height='40'></button></td><td><button class='remixClock' onclick=remixClock('"+myRecord.ClockID+"')><img border='0' src='Icons/music.png' width='40' height='40'></button></td></tr><tr><td height=225></td></tr><tr><td><button class='likeButton' onclick=like("+myRecord.ClockID+",this) style='background-color: "+myRecord.LikeColor+";'><img border='0' src='Icons/like.png' width='40' height='40'></button></td><td><button class='dislikeButton' onclick=dislike("+myRecord.ClockID+",this) style='background-color: "+myRecord.DislikeColor+";'><img border='0' src='Icons/dislike.png' width='40' height='40'></button></td><tr><td id=numLikes-"+myRecord.ClockID+">"+myRecord.NumOfLikes+"</td><td id=numDislikes-"+myRecord.ClockID+">"+myRecord.NumOfDislikes+"</td></tr></table></td><td><table><tr><td height=70></td></tr><tr><td><button type='button' class='viewComments' style='width:100%;height:45px;' onclick=openComments('"+myRecord.ClockID+"')>View Comments</button></td></tr></table></td></tr>";
                      }
                      rows = rows+newRow;
                      localStorage.removeItem("muteRow"+i); // for the sound of the mini clocks
                  }
                  document.getElementById("resultRows").innerHTML = rows;
                }
            }
        };


        xmlhttp.open("GET", "displayFeed.php", true);
        xmlhttp.send();
      }

      displayFeed();

    </script>
    <script>
      // removes all the items stored in localStorage from landing
      deleteLocalStorageLanding();
    </script>
    
  </head>
  <body>
    <div class="topnav">
      <a href="#" id="backBtn" onclick=checkBack()><img border="0" src="Icons/back.png" width="30" height="30"></a>
      <a class="active" href="feed.php"><img border="0" src="Icons/house.png" width="30" height="30"></a>
      <a href="discover.php"><img border="0" src="Icons/compass.png" width="30" height="30"></a>
      <a href="checkClockLimit.php"><img border="0" src="Icons/music.png" width="30" height="30"></a>
      <a href="myClocks.php"><img border="0" src="Icons/user.png" width="30" height="30"></a>
      <a href="inbox.php" id='chats' style='color:black'><img border="0" src="Icons/inbox.png" width="30" height="30"></a>
      <a href="search.php"><img border="0" src="Icons/magnifying-glass.png" width="30" height="30"></a>
      <div class="dropdown">
        <a><?php
            echo $_SESSION["Username"];
        ?></a>
        <div class="dropdown-content">
            <a onclick=updateAccount(this,displayFeed)>
              <?php // Checks if the user is a basic user and if they are, they will be presented with a button on the menu bar asking them if they want to upgrade to premium
              if($_SESSION["Premium"] == 0){
                echo "Upgrade To Premium";
              } 
              else {
                echo "Downgrade To Basic";
              }?>
            </a>
            <a onclick=deleteAccount()>Deactivate Account</a>
            <a href="updateEmail.php">Change Email</a>
            <a href="start.php">Logout</a>
        </div>
      </div>
  </div>
  </body>
  <script>
    setUnreadCount();

  </script>
  <table class="table" id="clockTable">
      <thead class="thead-light">
        <tr>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody id="resultRows">
      </tbody>
    </table>
</html>
