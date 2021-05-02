<?php
  $path = "../";
	$page = "Honor Flights of Rochester :: Veteran Medical";
  session_start();
	include $path."assets/inc/header.php";
  if ($_SESSION['role'] != 'Mission Safety Leader' && $_SESSION['role'] != 'Bus Safety Leader' &&
   $_SESSION['role'] != 'Safety Assistant' &&  $_SESSION['role'] != 'Mission Operations' &&
   $_SESSION['role'] != 'IT Administrator') {
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
  window.onload = medicalInfo(localStorage.getItem("localStorage"));
  </script>'
?>


<style>
  h2 {
    margin-left: auto;
    margin-right: auto;
    font-weight: bold;
  }
</style>

    <section id='tester' class="hero has-background-link-dark is-bold">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            Veteran Medical
          </h1>
        </div>
      </div>
    </section>
    <br>
    
    <div class="container">
      <h2 class="subtitle has-text-centered has-text-weight-bold">Personal Info</h2>
      <table id="personal">
        <thead>
          <tr>
            <th><abbr title="Field">Field Name</abbr></th>
            <th><abbr title="Data">Data</abbr></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>

    <br>

    <div class="container">
      <h2 class="subtitle has-text-centered has-text-weight-bold">Guardian Info</h2>
      <table id="guardian">
        <thead>
          <tr>
            <th><abbr title="Field">Field Name</abbr></th>
            <th><abbr title="Data">Data</abbr></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>

    <br>

    <div class="container">
      <h2 class="subtitle has-text-centered has-text-weight-bold">Medical Info</h2>
      <table id="medical">
        <thead>
          <tr>
            <th><abbr title="Field">Field Name</abbr></th>
            <th><abbr title="Data">Data</abbr></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>


<?php
    include $path."assets/inc/footer.php";

?>