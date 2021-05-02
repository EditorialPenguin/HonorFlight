<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/styles.css">
    <script src='<?php echo $path; ?>assets/js/main.js'></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page;?></title>
</head>


<?php
if($user && password_verify($password, $user['password'])){
  $_SESSION['id'] = $user['id'];
}
?>


<body onload="incorrect()">
    <nav class="navbar is-dark is-bold" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item">
          <img src="/assets/images/logo.png">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div class="navbar-menu" id="navMenu">
        <div class="navbar-start">
          <a class="navbar-item" href="<?php echo $path; ?>assets/mission.php" id="home">
            Home
          </a>

          <a class="navbar-item" href="<?php echo $path; ?>assets/vet-list.php" id="medNav">
            Medical
         </a>
          
          <a class="navbar-item" href="<?php echo $path; ?>assets/busbook.php" id="busBookNav">
            Bus Book
          </a>
          
          <a class="navbar-item" href="<?php echo $path; ?>assets/buslist.php" id="busListNav">
            Bus List
          </a>

          <div class="navbar-item has-dropdown is-hoverable" id="update">
            <a class="navbar-link">
              Update
            </a>

            <div class="navbar-dropdown">
              <a class="navbar-item" href="<?php echo $path; ?>assets/uploadDoc.php">
                Bus Book
              </a>
              <a class="navbar-item" href="<?php echo $path; ?>assets/userlist.php">
                User Information
              </a>
              <a class="navbar-item" href="<?php echo $path; ?>assets/missionCreate.php">
                Create Mission
              </a>
              
            </div>
          </div>
        </div>    
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <a class="button is-light" href="./logout.php">
                Log Out
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>

<?php
session_start();
$role = $_SESSION['role'];
echo '<script type="text/JavaScript">
function navNoShow(){
  jobTitle = "'. $role .'";
  switch(jobTitle){
    case "Mission Leader":
      document.getElementById("medNav").style.display = "none";
      document.getElementById("update").style.display = "none";
      break;
    case "IT Administrator":
      break;
    case "Mission Operations":
      break;
    case "Mission Safety Leader":
      document.getElementById("update").style.display = "none";
      break;
    case "Bus Leader":
      document.getElementById("medNav").style.display = "none";
      document.getElementById("update").style.display = "none";
      break;
    case "Safety Assistant":
      document.getElementById("update").style.display = "none";
      break;
    case "Bus Safety Leader":
      document.getElementById("update").style.display = "none";
      break;
    case "Mission Assistant":
      document.getElementById("medNav").style.display = "none";
      document.getElementById("update").style.display = "none";
      break;
    case "Advance Team":
      document.getElementById("medNav").style.display = "none";
      document.getElementById("update").style.display = "none";
      break;
    case "Photographer":
      document.getElementById("medNav").style.display = "none";
      document.getElementById("update").style.display = "none";
      break;
  }
}
navNoShow();
</script>';
?>


    <!--- Menu --->

    
