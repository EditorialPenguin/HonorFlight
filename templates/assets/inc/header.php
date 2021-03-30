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
          <a class="navbar-item" href="/">
            Home
          </a>

          <a class="navbar-item" href="<?php echo $path; ?>assets/mission.php">
            Mission
          </a>

          <a class="navbar-item" href="<?php echo $path; ?>assets/vet-list.php">
            Medical
          </a>
          
          <a class="navbar-item" href="<?php echo $path; ?>assets/busbook.php">
            Bus Book
          </a>

          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              Update
            </a>

            <div class="navbar-dropdown">
              <a class="navbar-item" href="<?php echo $path; ?>assets/busbookUpdate.php">
                Bus Book
              </a>
              <a class="navbar-item" href="<?php echo $path; ?>assets/userlist.php">
                User Information
              </a>
              <a class="navbar-item" href="<?php echo $path; ?>assets/vet-up-list.php">
                Veteran Information
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <!--- Menu --->

    
