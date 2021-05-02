<?php
    $path = "../";
	$page = "Honor Flights of Rochester :: Veteran List";
	include $path."assets/inc/header.php";
?>

<style>
  table { 
    width: 100%; 
    border-collapse: collapse; 
  }
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
<section id='tester' class="hero is-small">
<div class="hero-body">
<div>
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
          <button class="button is-alert" onclick="closing();">Exit</button>
        </footer>
      </div>
    </div>
  </div>
  <table id="vetTable">
    <thead>
      <tr>
        <th><abbr title="FN">First Name</abbr></th>
        <th><abbr title="LN">Last Name</abbr></th>
        <th><abbr title="Team">Team Color</abbr></th>
        <th><abbr title="Medical"></abbr></th>
        <th><abbr title="Medical"></abbr></th>
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