<?php
$path = "../";
$page = "Honor Flights of Rochester :: Veteran Information";
include $path . "assets/inc/header.php";

if ($_SESSION['role'] != 'Mission Operations' && $_SESSION['role'] != 'IT Administrator') {
    // Redirect if wrong user
    header("Location: denied.php");
}
?>    
<section id='tester' class="hero has-background-link-dark is-bold">
    <div class="hero-body">
        <div class="container">
        <h1 class="title">
            Create a Mission
        </h1>
        </div>
    </div>
</section>
<?php
  echo '<script type="text/JavaScript">
  window.onload = missionInfo();
  </script>';
?>
<div class="columns is-mobile">
  <div class="column is-full-mobile is-full-tablet is-half-desktop">
  <section class="hero is-white is-small">
      <div class="hero-body">
        <div class="container">
          <div class="columns is-centered">
            <div class="box column is-6-tablet is-6-desktop is-6-widescreen has-background-dark">
              <form id="mission_form" class="box has-background-grey-lighter">
                <div class="field">
                  <label for="" class="label">Mission NO.</label>
                  <div class="control">
                    <input id="mid" name="missionID" type="number" class="input" required>
                  </div>
                </div>
                <div class="field">
                  <label for="" class="label">Start Date</label>
                  <div class="control">
                    <input id="sdate" name="startDate" type="date" class="input" required>
                  </div>
                </div>
                <div class="field">
                  <label for="" class="label">End Date</label>
                  <div class="control">
                    <input id="edate" name="endDate" type="date" class="input" required>
                  </div>
                </div>
                <div class="field has-text-centered">
                  <button class="button is-dark" onclick="missionCreate();">
                    Create
                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="column">
    <br>
    <section id="titled" class="hero is-fullheight">
        <table class="table is-fullwidth" id="missiontable">
        <thead>
        <tr>
            <th><abbr title="title">Mission Name</abbr></th>
            <th><abbr title="startDate">Start Date</abbr></th>
            <th><abbr title="endDate">End Date</abbr></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
    </section>
  </div>
</div>


<?php
    include $path."assets/inc/footer.php";

?>