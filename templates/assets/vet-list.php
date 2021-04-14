<?php
    $path = "../";
	$page = "Honor Flights of Rochester :: Veteran List";
	include $path."assets/inc/header.php";
  session_start();
  if ($_SESSION['role'] != 'Mission Safety Leader' && $_SESSION['role'] != 'Bus Safety Leader' &&
   $_SESSION['role'] != 'Bus Safety Assistant' &&  $_SESSION['role'] != 'Mission Operations' &&
   $_SESSION['role'] != 'IT Administrator') {
    // Change to access denied page
    //echo $_SESSION['role'];
    header("Location: denied.php");
  }
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
  window.onload = veteranInfo(0);
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
<div class="modal" id="editor">
    <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Add Information to Veteran</p>
        </header>
        <section class="modal-card-body">
          <div class="field">
            <label class="label">Veteran ID No.</label>
            <div>
              <input class="input" type="text" id="vid" disabled>
            </div>
          </div>
          <div class="field">
            <label class="label">Add Comment</label>
            <div>
              <input class="input" type="text" id="comments">
            </div>
          </div>
        </section>
        <footer class="modal-card-foot">
          <button class="button is-success" onclick="closeCommentModal();">Save Comment</button>
          <button class="button is-success" onclick="close();">Exit</button>
        </footer>
      </div>
    </div>
  </div>
  <table class="table is-fullwidth" id="vetTable">
    <thead>
      <tr>
        <th><abbr title="FN">First Name</abbr></th>
        <th><abbr title="LN">Last Name</abbr></th>
        <th><abbr title="Team">Team Color</abbr></th>
        <th><abbr title="Medical"></abbr></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

<?php
    include $path."assets/inc/footer.php";

?>