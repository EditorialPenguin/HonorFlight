<?php
$path = "../";
$page = "Honor Flights of Rochester :: Veteran Information";
include $path . "assets/inc/header.php";
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
  colorVar = document.getElementById("teamsColor").value;
  console.log(colorVar);
  window.onload = getVetBus(colorVar);
  </script>';

?>


<section id='tester' class="hero has-background-link-dark is-bold">
    <div class="hero-body">
        <div class="container">
        <h1 class="title">
            Bus List
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
        <p class="modal-card-title">Modal title</p>
        </header>
        <section class="modal-card-body">
        <div class="field">
        <label class="label">Veteran ID No.</label>
        <div>
            <input class="input" type="text" id="vid" disabled>
        </div>
        </div>
        <div class="field">
        <label class="label">Veteran First Name</label>
        <div>
            <input class="input" type="text" id="fname" disabled>
        </div>
        </div>

        <div class="field">
        <label class="label">Veteran Last Name</label>
        <div>
            <input class="input" type="text" id="lname" disabled>
        </div>
        </div>

        <div class="field">
        <label class="label">Room Number</label>
        <div>
            <input class="input" type="text" id="room">
        </div>
        </section>
        <footer class="modal-card-foot">
        <button class="button is-success" href="#" onclick="closeRoomModal();">Save Changes</button>
        <button class="button is-alert" onclick="closing();">Exit</button>
        </footer>
    </div>
    </div>
    <div class="field">
        <div class="control">
        <label class="label">Select a Bus to View:</label>
            <div class="select">
                <select id="teamsColor" onchange="getVetBus(this.value)">
                    <option value="none" selected disabled hidden>Select a Team</option>
                    <option value="bus1">Bus #1: Red/Blue/Yellow Teams</option>
                    <option value="bus2">Bus #2: Green/Orange/Purple Teams</option>
                    <option value="bus3">Bus #3: Gold/Silver/Teal Teams</option>
                </select>
            </div>
        </div>
    </div>
    <table class="" id="busList">
        <thead>
            <tr>
                <th><abbr title="FN">First name</abbr></th>
                <th><abbr title="LN">Last name</abbr></th>
                <th><abbr title="Team">Team Color</abbr></th>
                <th><abbr title="roomNum">Room #</abbr></th>
            </tr>
        </thead>
        <tbody id="busVets">
        </tbody>
    </table>
</div>
</div>
</section>
<?php
    include $path."assets/inc/footer.php";

?>