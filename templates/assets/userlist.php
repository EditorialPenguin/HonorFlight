<?php
    $path = "../";
	$page = "Honor Flights of Rochester :: Veteran List";
	include $path."assets/inc/header.php";
  session_start();
  if ($_SESSION['role'] != 'IT Administrator' && $_SESSION['role'] != 'Mission Operations' ) {
    // Change to access denied page
    //echo $_SESSION['role'];
    header("Location: denied.php");
  }
?>

<style>
  table { 
    width: 100%; 
    border-collapse: collapse; 
  }
  / Zebra striping */
  tr:nth-of-type(odd) { 
    background: #eee; 
  }
  th { 
    background: #333; 
    color: white !important;
    font-weight: bold; 
  }
  td, th { 
    padding: 6px; 
    border: 1px solid #ccc; 
    text-align: left; 
  }

</style>

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

<section id='tester' class="hero is-small">
<div class="hero-body">
<div>
<div class="modal" id="editor">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
        <p class="modal-card-title">Change Password</p>
        </header>
        <section class="modal-card-body">
        <div class="field">
        <label class="label">User ID No.</label>
        <div>
            <input class="input" type="text" id="uid" disabled>
        </div>
        </div>
        <div class="field">
        <label class="label">Username</label>
        <div>
            <input class="input" type="text" id="user" disabled>
        </div>
        </div>

        <div class="field">
        <label class="label">Role</label>
        <div>
            <input class="input" type="text" id="role" disabled>
        </div>
        </div>

        <div class="field">
        <label class="label">New Password</label>
        <div>
            <input class="input" type="text" id="pass">
        </div>
        </section>
        <footer class="modal-card-foot">
        <button class="button is-success" onclick="closePasswordModal();">Save Changes</button>
        <button class="button" onclick="closing();">Exit</button>
        </footer>
    </div>
    </div>
    </div>
  <table id="users">
    <thead>
      <tr>
        <th><abbr title="username">Username</abbr></th>
        <th><abbr title="role">Role</abbr></th>
        <th><abbr title="pass"></abbr></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
</div>
</section>
<?php
    include $path."assets/inc/footer.php";

?>