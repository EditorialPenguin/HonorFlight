<?php
    $path = "../";
	$page = "Honor Flights of Rochester :: Veteran List";
	include $path."assets/inc/header.php";
?>

<style>
h1 {
    color: #ffffff !important;
  }

  #red-team {
    background-color: #ff0000;
  }

  #blue-team {
    background-color: #0000ff;
  }

  #yellow-team {
    background-color: #ffff00;
    
  }

  #green-team {
    background-color: #00ff00;
  }

  #orange-team {
    background-color: #ffa500;
  }

  #purple-team {
    background-color: #800080;
  }

  #gold-team {
    background-color: #daa520;
  }

  #silver-team {
    background-color: #808080;
  }

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

<section class="hero has-background-link-dark is-bold">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            Veteran Medical
          </h1>
        </div>
      </div>
    </section>

    <div class="container">
      <table class="table is-fullwidth">
        <thead>
          <tr>
            <th><abbr title="ID">Veteran ID</abbr></th>
            <th><abbr title="FN">First Name</abbr></th>
            <th><abbr title="LN">Last Name</abbr></th>
            <th><abbr title="Team">Team Color</abbr></th>
            <th><abbr title="Incident"></abbr></th>
            <th><abbr title="Medical"></abbr></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th><abbr title="ID">Veteran ID</abbr></th>
            <th><abbr title="FN">First Name</abbr></th>
            <th><abbr title="LN">Last Name</abbr></th>
            <th><abbr title="Team">Team Color</abbr></th>
            <th><abbr title="Incident"></abbr></th>
            <th><abbr title="Medical"></abbr></th>
          </tr>
        </tfoot>
        <tbody>
          <tr>
            <td>2412</td>
            <td>John</td>
            <td>Smith</td>
            <td>Blue</td>
            <td><a href="#">Incident Report<a></td>
            <td><a href="#">Medical Information<a></td>
          </tr>
          <tr>
            <td>2412</td>
            <td>John</td>
            <td>Smith</td>
            <td>Blue</td>
            <td><a href="#">Incident Report<a></td>
            <td><a href="#">Medical Information<a></td>
          </tr>
          <tr>
            <td>2412</td>
            <td>John</td>
            <td>Smith</td>
            <td>Blue</td>
            <td><a href="#">Incident Report<a></td>
            <td><a href="#">Medical Information<a></td>
          </tr>
          <tr>
            <td>2412</td>
            <td>John</td>
            <td>Smith</td>
            <td>Blue</td>
            <td><a href="#">Incident Report<a></td>
            <td><a href="#">Medical Information<a></td>
          </tr>
          <tr>
            <td>2412</td>
            <td>John</td>
            <td>Smith</td>
            <td>Blue</td>
            <td><a href="#">Incident Report<a></td>
            <td><a href="#">Medical Information<a></td>
          </tr>
          <tr>
            <td>2412</td>
            <td>John</td>
            <td>Smith</td>
            <td>Blue</td>
            <td><a href="#">Incident Report<a></td>
            <td><a href="#">Medical Information<a></td>
          </tr>
          <tr>
            <td>2412</td>
            <td>John</td>
            <td>Smith</td>
            <td>Blue</td>
            <td><a href="#">Incident Report<a></td>
            <td><a href="#">Medical Information<a></td>
          </tr>
          <tr>
            <td>2412</td>
            <td>John</td>
            <td>Smith</td>
            <td>Blue</td>
            <td><a href="#">Incident Report<a></td>
            <td><a href="#">Medical Information<a></td>
          </tr>
          <tr>
            <td>2412</td>
            <td>John</td>
            <td>Smith</td>
            <td>Blue</td>
            <td><a href="#">Incident Report<a></td>
            <td><a href="#">Medical Information<a></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!--<div class="container">
      <nav class="navbar" role="navigation" aria-label="team-navigation">
        <div id="teams" class="navbar-menu is-active">
          <div class="navbar-start">
            <div id="red-team" class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Red Team
              </a>

              <div class="navbar-dropdown">
              </div>
            </div>

            <div id="blue-team" class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Blue Team
              </a>

              <div class="navbar-dropdown">
              </div>
            </div>

            <div id="yellow-team" class="navbar-item has-dropdown is-hoverable">
              <a style="color: black;" class="navbar-link">
                Yellow Team
              </a>

              <div class="navbar-dropdown">
              </div>
            </div>
              
            <div id="green-team" class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Green Team
              </a>

              <div class="navbar-dropdown">
              </div>
            </div>
            
            <div id="orange-team" class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Orange Team
              </a>
              <div class="navbar-dropdown">
              </div>
            </div>

            <div id="purple-team" class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Purple Team
              </a>
              <div class="navbar-dropdown">
              </div>
            </div>

            <div id="gold-team" class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Gold Team
              </a>
              <div class="navbar-dropdown">
              </div>
            </div>

            <div id="silver-team" class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Silver Team
              </a>
              <div class="navbar-dropdown">
                <a href='#' id="silver-team" class="navbar-item">
                  Chris, John <a href="/Vet-med/chris-john">Medical Information </a><a> Incident Report</a>
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>--->

<?php
    include $path."assets/inc/footer.php";

?>