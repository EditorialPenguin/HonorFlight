<?php
  $path = "../";
	$page = "Honor Flights of Rochester :: Veteran Medical";
	include $path."assets/inc/header.php";
?>

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
      <table id="personal" class="table is-striped is-fullwidth">
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
      <table id="guardian" class="table is-striped is-fullwidth">
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
      <table id="medical" class="table is-striped is-fullwidth">
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