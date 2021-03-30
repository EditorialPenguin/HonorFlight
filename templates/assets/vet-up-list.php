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
  window.onload = veteranInfo(1);
  </script>';
?>


<section id='tester' class="hero has-background-link-dark is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Veteran Medical
      </h1>
    </div>
  </div>
</section>
<div class="container">
  <table class="table is-fullwidth" id="vetUpdate">
    <thead>
      <tr>
        <th><abbr title="id">Veteran ID</abbr></th>
        <th><abbr title="FN">First Name</abbr></th>
        <th><abbr title="LN">Last Name</abbr></th>
        <th><abbr title="id">Mission ID</abbr></th>
        <th><abbr title="Edit"></abbr></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

<?php
    include $path."assets/inc/footer.php";

?>