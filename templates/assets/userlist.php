<?php
    $path = "../";
	$page = "Honor Flights of Rochester :: Veteran List";
	include $path."assets/inc/header.php";
?>

<style>
  .navbar-link{
    font-weight: bold;
    color: white;
  }

  .navbar-dropdown {
    padding: 0;
  }

  .navbar-menu {
    padding: 0;
  }


</style>

<?php
  echo '<script type="text/JavaScript">
  async function saveName(vetID) {
    localStorage = window.localStorage;
    localStorage.setItem("localStorage", vetID);
  }
  </script>';
?>

<?php
  echo '<script type="text/JavaScript">
  window.onload = userInfo();
  </script>';
?>


<section id='tester' class="hero has-background-link-dark is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        User Information
      </h1>
    </div>
  </div>
</section>
<div class="container">
  <table class="table is-fullwidth" id="users">
    <thead>
      <tr>
        <th><abbr title="id">User ID</abbr></th>
        <th><abbr title="username">Username</abbr></th>
        <th><abbr title="role">Role</abbr></th>
        <th><abbr title="pass"></abbr></th>
        <th><abbr title="edit"></abbr></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

<?php
    include $path."assets/inc/footer.php";

?>